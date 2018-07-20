<template>
<div class="staff-at-bymonth">
    <div class="table-responsive staff-table">
    <table class="table responsive-table">
        <thead>
            <th>#EID Name / Dates</th>
            <th v-for="date in dates">
                {{date.attendanceDate}}
            </th>
        </thead>
        <tbody>
            <tr v-for="staff in Staffs" v-bind:key="staff.id">
                <td>
                    {{staff.eid}} &nbsp&nbsp {{staff.name}}
                </td>
                <th v-for="date in dates" v-bind:key="date.id">
                   {{getAtDataByStaff(date.attendanceDate, staff.id)}}
                </th>
            </tr>
        </tbody>
    </table>
</div>
</div>
</template>
<script>
export default {
    data(){
        return {
            Staffs:[],
            dates:[],
            atDatas:[],
            fromDate:'2018-07-1',
            toDate:'2018-07-31'
        }
    },
created(){
    this.fetchUsers();
    this.getallDates();
    this.getallAttendance();
},

    methods:{
        //get staffs
        fetchUsers() {
      let vm = this;
      fetch('/api/staffprofile')
        .then(res => res.json())
        .then(res => {
          this.Staffs = res.data;
          console.log(res.data);
        })
        .catch(err => console.log(err));
     },
        //get all date
        getallDates(){
            let passdata = {
                fromDate: this.fromDate,
                toDate: this.toDate
            }
            fetch('/api/allstaffdates', {
                method: "post",
                body: JSON.stringify(passdata),
                headers:{
                    "content-type": "application/json"
                }
            })
            .then(res => res.json())
            .then(res => {
                this.dates = res.data;
                 console.log(res.data);
            }).catch(err => console.log(err));
        },
        //get present data
        getallAttendance(){
                let passdata = {
                fromDate: this.fromDate,
                toDate: this.toDate
            }
            fetch('/api/allstaffatdatas', {
                method: "post",
                body: JSON.stringify(passdata),
                headers:{
                    "content-type": "application/json"
                }
            })
            .then(res => res.json())
            .then(res => {
                this.atDatas = res.data;
                 console.log(res.data);
            }).catch(err => console.log(err));
        },
        
        
 getAtDataByStaff(AtDate, staff) {
      var status;
      var aData;
      var child;
      aData = this.atDatas;
      for (var child in aData) {
        if (aData[child].staff_id === staff && aData[child].attendanceDate === AtDate) {
          status = aData[child].status;
        }
      }
      if (status) {
        return status;
      } else {
        return 'absent';
      }
    },
    }

}

</script>


<style scoped>
.staff-table
{
    height:600px;
}
</style>
