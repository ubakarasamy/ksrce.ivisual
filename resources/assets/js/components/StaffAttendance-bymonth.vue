<template>
<div class="staff-atbymonth">


    <table class="table">
        <thead>
            <th>Staff EID</th>
            <th>Name</th>
            <th>
View
            </th>
        </thead>
        <tbody>
            <tr v-for="staff in staffs" v-bind:key="staff.id">
                <td>{{staff.eid}}</td>
                <td>{{staff.name}}</td>
                <td>
              <!-- Button trigger modal -->
<button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#exampleModalCenter">
  View
</button>
<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalCenterTitle">{{staff.name}}</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <h4 class="text-center mb-3">Over all Status Of Year</h4>
        <table class="table text-center">
          <tr>
            <td><strong>{{getPresent(staff.id)}}</strong> <p class="text-muted">Present</p></td>
            <td><strong>{{getAbsent(staff.id)}}</strong> <p class="text-muted">Absent</p></td>
            <td><strong>{{getCpl(staff.id)}}</strong> <p class="text-muted">CPL</p></td>
            <td><strong>{{getCl(staff.id)}}</strong><p class="text-muted">CL</p></td>
            <td><strong>{{getSod(staff.id)}}</strong> <p class="text-muted">SOD</p></td>
            <td><strong>{{getOd(staff.id)}}</strong> <p class="text-muted">OD</p></td>
            <td><strong>{{getPl(staff.id)}}</strong> <p class="text-muted">Late</p></td>
            <td><strong>{{getPp(staff.id)}}</strong> <p class="text-muted">Permission</p></td>
          </tr>
        </table>
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

                </td>
                <!-- <td>{{getPresent(staff.id)}}</td>
                <td>{{getAbsent(staff.id)}}</td>
                <td>{{getCpl(staff.id)}}</td>
                <td>{{getCl(staff.id)}}</td>
                <td>{{getSod(staff.id)}}</td>
                <td>{{getOd(staff.id)}}</td>
                <td>{{getPl(staff.id)}}</td>
                <td>{{getPp(staff.id)}}</td> -->
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
      
    },

    ViewStaffOveralls(){
      
    }

    },
    computed:{
       
    }

}
</script>


