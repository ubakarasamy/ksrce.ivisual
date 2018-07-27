<template>
<div class="staff-at-bymonth">

<div class="from-to" v-if="showAtTable === false">
  <!-- from date -->
<div class="form-group">
<label for="fromDate">From Date</label>
<input type="date" id="fromDate" v-model="fromDate" name="fromDate" max="3000-12-31" min="1000-01-01" class="form-control" style="width:200px;">
</div>
  <!-- to date -->
<div class="form-group">
<label for="toDate">From Date</label>
<input type="date" id="toDate" v-model="toDate" name="toDate" max="3000-12-31" min="1000-01-01" class="form-control" style="width:200px;">
</div>
<button type="submit" class="btn btn-primary" @click="getallDates()">Submit</button>
</div>

<div class="table-responsive staff-table" v-if="showAtTable">
Attendance Record {{fromDate}} to {{toDate}}
<div class="input-name-search">
    <input v-model="nameSearch" type="text" class="form-control mb-2" placeholder="Search by Name" style="width:200px;">
</div>

    <table class="table responsive-table">
        <thead>
            <th>#EID Name / Dates</th>
            <th v-for="date in dates">
                {{moment(date.attendanceDate).format('Do-MM')}}
            </th>
        </thead>
        <tbody>
            <tr v-for="staff in filterStaffs" v-bind:key="staff.id">
                <td>
                    {{staff.eid}} &nbsp&nbsp {{staff.name}}
                </td>
                <td v-for="date in dates" v-bind:key="date.id">
                   {{getAtDataByStaff(date.attendanceDate, staff.id)}}
                </td>
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
            fromDate:'',
            toDate:'',
            showAtTable:false,
            nameSearch: ''
        }
    },
created(){
    this.fetchUsers();
},

    methods:{
        //get staffs
        fetchUsers() {
      let vm = this;
      fetch('/api/staffprofile')
        .then(res => res.json())
        .then(res => {
          this.Staffs = res.data;
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
            }).catch(err => console.log(err));
            this.showAtTable = true;
            this.getallAttendance();
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
    },
    computed:{
        filterStaffs(){
            let staffs = this.Staffs;
            let search = this.nameSearch;
            if(search === ""){
                return staffs;
            }else{
            return staffs.filter(function(staff){
                return staff.name.toLowerCase().includes(search.toLowerCase());
            });
            }


        }
    }

}

</script>


<style scoped>
.staff-table
{
    height:600px;
}
</style>
