<template>
<div class="staff-at-bymonth">

<div class="from-to" v-if="showAtTable === false">
  <!-- from date -->
<div class="form-group">
<label for="fromDate">From Date</label>
<input type="date" id="fromDate" v-model="fromDate" name="fromDate" max="3000-12-31" min="1000-01-01" class="form-control" style="width:200px;">
</div>
<!-- to date -->

<button type="submit" class="btn btn-primary" @click="getallDates()">Submit</button>
</div>

<div class="table-responsive staff-table" v-if="showAtTable">

<div class="input-name-search">
    <div class="row">
<div class="col-sm-4">
    <span class="pb-2"> Attendance Record {{fromDate}}  </span> 
    <input v-model="nameSearch" type="text" class="form-control mt-2" placeholder="Search by Name" style="width:200px;">
</div>
<div class="col-sm-8">
    <div class="btngrp-filter mt-3">
        <button class="btn btn-sm btn-outline-primary" @click="ClickPresent()">All</button>
<button class="btn btn-sm btn-outline-primary" @click="ClickAbsents()">Absents</button>
<button class="btn btn-sm btn-outline-primary" @click="ClickCls()">CL and CPL</button>
<button class="btn btn-sm btn-outline-primary" @click="ClickOds()">OD and SOD</button>
<button class="btn btn-sm btn-outline-primary" @click="ClickPl()">Permission and Late</button>

    </div>
</div>
    </div>
</div>

    <table class="table responsive-table">
        <thead>
            <th>#EID Name / Dates</th>
            <th v-for="date in dates">
                {{moment(date.attendanceDate).format('Do-MM')}}
            </th>
        </thead>
        <tbody>
            <tr v-for="staff in filterStaffs" v-bind:key="staff.id" v-if="hideOriginal === false">
                <td>
                    {{staff.eid}} &nbsp&nbsp {{staff.name}}
                </td>
                <td :class="makeStyle(getAtDataByStaff(date.attendanceDate, staff.id))" v-for="date in dates" v-bind:key="date.id">
                   {{getAtDataByStaff(date.attendanceDate, staff.id)}}
                </td>
            </tr>
            <tr v-for="staff in filterStaffs" v-bind:key="staff.id" v-if="getAbsents">
                <td v-if="RemoveElem(getAtDataByStaff(1,staff.id))">
                    {{staff.eid}} &nbsp&nbsp {{staff.name}}
                </td>
                <td v-if="RemoveElem(getAtDataByStaff(1,staff.id))" :class="makeStyle(getAtDataByStaff(date.attendanceDate, staff.id))" v-for="date in dates" v-bind:key="date.id">
                   {{getAtDataByStaff(date.attendanceDate, staff.id)}}
                </td>
            </tr>
            <tr v-for="staff in filterStaffs" v-bind:key="staff.id" v-if="getCls">
                <td v-if="RemoveElem(getAtDataByStaff(1,staff.id))">
                    {{staff.eid}} &nbsp&nbsp {{staff.name}}
                </td>
                <td v-if="RemoveElem(getAtDataByStaff(1,staff.id))" :class="makeStyle(getAtDataByStaff(date.attendanceDate, staff.id))" v-for="date in dates" v-bind:key="date.id">
                   {{getAtDataByStaff(date.attendanceDate, staff.id)}}
                </td>
            </tr>
            <tr v-for="staff in filterStaffs" v-bind:key="staff.id" v-if="getOds">
                <td v-if="RemoveElem(getAtDataByStaff(1,staff.id))">
                    {{staff.eid}} &nbsp&nbsp {{staff.name}}
                </td>
                <td v-if="RemoveElem(getAtDataByStaff(1,staff.id))" :class="makeStyle(getAtDataByStaff(date.attendanceDate, staff.id))" v-for="date in dates" v-bind:key="date.id">
                   {{getAtDataByStaff(date.attendanceDate, staff.id)}}
                </td>
            </tr>
            <tr v-for="staff in filterStaffs" v-bind:key="staff.id" v-if="getPl">
                <td v-if="RemoveElem(getAtDataByStaff(1,staff.id))">
                    {{staff.eid}} &nbsp&nbsp {{staff.name}}
                </td>
                <td v-if="RemoveElem(getAtDataByStaff(1,staff.id))" :class="makeStyle(getAtDataByStaff(date.attendanceDate, staff.id))" v-for="date in dates" v-bind:key="date.id">
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
            hideOriginal:false,
            getAbsents:false,
            getCls:false,
            getOds:false,
            getPl:false,
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
    this.makeStyle();
},

    methods:{
        ClickPresent(){
            this.getAbsents = false;
            this.getCls = false;
            this.getOds = false;
            this.getPl = false;
            this.hideOriginal = false;
        },
        ClickAbsents(){
            this.getAbsents = true;
            this.getCls = false;
            this.getOds = false;
            this.getPl = false;
            this.hideOriginal = true;
        },
        ClickCls(){
            this.getCls = true;
            this.getAbsents = false;
            this.getOds = false;
            this.getPl = false;
            this.hideOriginal = true;
        },
        ClickOds(){
            this.getOds = true;
            this.getCls = false;
            this.getAbsents = false;
            this.getPl = false;
            this.hideOriginal = true;
        },
        ClickPl(){
            this.getPl = true;
            this.getCls = false;
            this.getOds = false;
            this.getAbsents = false;
            this.hideOriginal = true;
        },
        makeStyle(stat){
           if(stat === 'present'){
               return 'disableRow'
           }
        },
        RemoveElem(data){
            if (data === 'absent' && this.getAbsents === true) {
                return true;
            }
            if (data === 'cl' | data === 'cpl' && this.getCls === true) {
                return true;
            }
            if (data === 'od' | data === 'sod' && this.getOds === true) {
                return true;
            }
            if (data === 'present-permission' | data === 'present-late' && this.getPl === true) {
                return true;
            }

        },
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
                toDate: this.fromDate
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
                toDate: this.fromDate
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
     if(AtDate === 1){
         AtDate = this.fromDate;
     }else{
         AtDate = AtDate;
     }
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
        return 'null';
      }
    }



    },
    computed:{
        
        filterStaffs(){
            let staffs = this.Staffs;
            let search = this.nameSearch;

            let from = this.fromDate;

            if(search === ""){
                return staffs;
            }else{
            return staffs.filter(function(staff){
            
                // return staff.name.toLowerCase().includes(search.toLowerCase()) ;

                return staff.name.toLowerCase().includes(search.toLowerCase()) ;

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
.btngrp-filter
{
    float: right;
    margin-right: 30px;
}
.input-name-search
{
    background: #f2f2f2;
    padding: 10px;
}
</style>
