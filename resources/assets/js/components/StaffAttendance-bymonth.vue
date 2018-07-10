<template>
<div class="staff-atbymonth">
    <table class="table">
        <thead>
            <th>Staff EID</th>
            <th>Name</th>
            <th>Present</th>
            <th>Absent</th>
            <th>cpl</th>
            <th>cl</th>
            <th>sod</th>
            <th>od</th>
            <th>pl</th>
            <th>pp</th>
        </thead>
        <tbody>
            <tr v-for="staff in staffs" v-bind:key="staff.id">
                <td>{{staff.eid}}</td>
                <td>{{staff.name}}</td>
                <td>{{getPresent(staff.id)}}</td>
                <td>{{getAbsent(staff.id)}}</td>
                <td>{{getCpl(staff.id)}}</td>
                <td>{{getCl(staff.id)}}</td>
                <td>{{getSod(staff.id)}}</td>
                <td>{{getOd(staff.id)}}</td>
                <td>{{getPl(staff.id)}}</td>
                <td>{{getPp(staff.id)}}</td>
            </tr>
        </tbody>
    </table>
    </div>
</template>

<script>
export default {
    data(){
        return {
            staffs:[],
            staffAttendance:[]
        }
    },
    created(){
        this.fetchUsers();
        this.getoverallStaff();
    },
    methods:{
        //get staffs
        fetchUsers() {
      fetch('/api/staffprofile')
        .then(res => res.json())
        .then(res => {
          this.staffs = res.data;
        })
        .catch(err => console.log(err));
     },
    //get overall attendance
    getoverallStaff(){
        fetch('/api/staffoverall')
        .then(res => res.json())
        .then(res => {
            this.staffAttendance = res.data;
            //console.log(res.data);
        })
    },
    // Get PRESENT
    getPresent(id) {
      var status;
      var aData;
      var child;
      aData = this.staffAttendance;
      for (var child in aData) {
        if (aData[child].staff_id === id) {
          status = aData[child].present;
        }
      }
      if(status){
          return status;
      }
          return 0;
        
    },
    // Get ABSENT
    getAbsent(id) {
      var status;
      var aData;
      var child;
      aData = this.staffAttendance;
      for (var child in aData) {
        if (aData[child].staff_id === id) {
          status = aData[child].absent;
        }
      }
       if(status){
          return status;
      }
          return 0;
    },
    // Get CPL
    getCpl(id) {
      var status;
      var aData;
      var child;
      aData = this.staffAttendance;
      for (var child in aData) {
        if (aData[child].staff_id === id) {
          status = aData[child].cpl;
        }
      }
        if(status){
          return status;
      }
          return 0;
    },
    // Get CL
    getCl(id) {
      var status;
      var aData;
      var child;
      aData = this.staffAttendance;
      for (var child in aData) {
        if (aData[child].staff_id === id) {
          status = aData[child].cl;
        }
      }
       if(status){
          return status;
      }
          return 0;
    },
    // Get PP
    getPp(id) {
      var status;
      var aData;
      var child;
      aData = this.staffAttendance;
      for (var child in aData) {
        if (aData[child].staff_id === id) {
          status = aData[child].pp;
        }
      }
        if(status){
          return status;
      }
          return 0;
    },
    // Get PL
    getPl(id) {
      var status;
      var aData;
      var child;
      aData = this.staffAttendance;
      for (var child in aData) {
        if (aData[child].staff_id === id) {
          status = aData[child].pl;
        }
      }
       if(status){
          return status;
      }
          return 0;
    },
    // Get OD
    getOd(id) {
      var status;
      var aData;
      var child;
      aData = this.staffAttendance;
      for (var child in aData) {
        if (aData[child].staff_id === id) {
          status = aData[child].od;
        }
      }
        if(status){
          return status;
      }
          return 0;
    },
    // Get SOD
    getSod(id) {
      var status;
      var aData;
      var child;
      aData = this.staffAttendance;
      for (var child in aData) {
        if (aData[child].staff_id === id) {
          status = aData[child].sod;
        }
      }
        if(status){
          return status;
      }
          return 0;
      
    }

    },
    computed:{
       
    }

}
</script>


