<template>
<div class="staff-atbymonth">

<div class="page-navigation">
  
</div>

<div class="department-filter">
  <div class="col-md-3">
  <label for="staff_filter_department">Department</label>
<select class="form-control" v-model="StaffDepartmentSelected" style="width:120px;">
  <option v-for="StaffDepartment in StaffDepartments" v-bind:value="StaffDepartment.value">
    {{ StaffDepartment.text }}
  </option>
</select>
  </div>
<div class="col-md-4">
  <label for="name">Name</label>
  <input type="text" class="form-control" name="name" id="name" v-model="StaffNameSearch" >
</div>


</div>

    <table class="table">
        <thead>
            <th>Staff EID</th>
            <th>Name</th>
            <th>
View
            </th>
        </thead>
        <tbody>
            <tr v-for="staff in filteredStaffs" v-bind:key="staff.id">
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

            </tr>
        </tbody>
    </table>
    </div>
</template>

<script>
export default {
    data(){
        return {
          StaffNameSearch:'',
            staffs:[],
            staffAttendance:[],
                    StaffDepartmentSelected: 'all',
    StaffDepartments: [
      { text: 'all', value: 'all' },
      { text: 'ECE', value: 'ece' },
        { text: 'EEE', value: 'eee' },
        { text: 'MECH', value: 'mech' },
        { text: 'CSE', value: 'cse' },
        { text: 'IT', value: 'it' },
        { text: 'CIVIL', value: 'civil' },
        { text: 'AUTOMOBILE', value: 'automobile' },
        { text: 'ENGLISH', value: 'english' },
        { text: 'PHYSICS', value: 'physics' },
        { text: 'CHEMISTRY', value: 'chemistry' },
        { text: 'MATHEMATICS', value: 'mathematics' },
        { text: 'ME-SE', value: 'me-se' },
        { text: 'ME-CE&M', value: 'me-ce&m' },
        { text: 'ME-CSE', value: 'me-cse' },
        { text: 'ME-MMT', value: 'me-mmt' },
        { text: 'ME-AE', value: 'me-ae' },
        { text: 'ME-COM-SYS', value: 'me-com-sys' },
        { text: 'ME-VLSI', value: 'me-vlsi' },
        { text: 'ME-EST', value: 'me-est' },
        { text: 'ME-PE&D', value: 'me-pe&d' },
        { text: 'ME-ISE', value: 'me-ise' },
        { text: 'MTECH-IT', value: 'mtech-it' },
        { text: 'MBA', value: 'mba' },
        { text: 'MCA', value: 'mca' }
        
    ]
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
        filteredStaffs: function() {
			let vm = this;
			let department = vm.StaffDepartmentSelected;
      let search = vm.StaffNameSearch;
			if(department === "all" && search === "") {
				//save performance, juste return the default array:
				return vm.staffs;
			} else {
				return vm.staffs.filter(function(staff) {
					//return the array after passimng it through the filter function:
					return  (department === 'all' || staff.department === department) && staff.name.toLowerCase().includes(search.toLowerCase());	 

				});
			}
		}
    }

}
</script>

<style scoped>
.department-filter input
{
  margin-bottom: 20px;
}
</style>

