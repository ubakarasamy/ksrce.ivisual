<template>
    <div class="container">
            <div class="card">
                <div class="card-header">
                    <h1 class="card-title">Staff Profiles</h1>
                    <button type="button" class="btn btn-primary float-right create-staff-btn" data-toggle="modal" data-target="#createStaff">
  Create New Staff
</button>
<br>
<br>

<div class="filter-options">
  <label for="staff_filter_department">Department</label>
<select class="form-control" v-model="selected" style="width:120px;display:inline-block;">
  <option v-for="option in options" v-bind:value="option.value">
    {{ option.text }}
  </option>
</select>

<label for="staff_filter_occupation">Occupation</label>
<select class="form-control" id="staff_filter_occupation" v-model="selectedrole" style="width:120px;display:inline-block;">
  <option v-for="roleoption in roleoptions" v-bind:value="roleoption.value">
    {{ roleoption.text }}
  </option>
</select>
</div>

</div>
<div class="card-body">
<div class="row">
<div class="col-md-12">
<!-- Button trigger modal -->

<!-- Modal View-->
<div class="modal fade" id="viewStaff" tabindex="-1" role="dialog" aria-labelledby="createStaffLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="createStaffLabel">{{staff.name}}</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <img :src="default_pic" alt="staff image" class="mx-auto d-block" style="width: 135px;border-radius: 7%;margin: 10px;">
        <table class="table" style="text-transform:uppercase;">
          <tr><td>Name:</td><td>{{staff.name}}</td></tr>
          <tr><td>Department:</td><td>{{staff.department}}</td></tr>
          <tr><td>Designation:</td><td>{{staff.occupation}}</td></tr>
          <tr><td>Employee ID:</td><td>{{staff.eid}}</td></tr>
          <tr><td>Joined On:</td><td>{{staff.mojoined}}</td></tr>
        </table>
      </div>
    </div>
  </div>
</div>

<!-- Modal -->
<div class="modal fade" id="createStaff" tabindex="-1" role="dialog" aria-labelledby="createStaffLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="createStaffLabel">Create New Staff</h5>
        <button type="button" class="close" v-on:click="closeEditbar" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

         <p v-if="errors.length">
    <ul>
      <li class="text-danger" v-for="error in errors">{{ error }}</li>
    </ul>
  </p>
        <form @submit.prevent="addStaff">
<div class="form-group">
    <label for="Staffnamecreate">Name</label>
    <input type="text" class="form-control" id="Staffnamecreate" aria-describedby="StaffnameHelp" placeholder="Enter Name" v-model="staff.name">
  </div>
  <div class="form-group">
    <label for="Staffemailcreate">Email address</label>
    <input type="email" class="form-control" id="Staffemailcreate" aria-describedby="StaffemailHelp" placeholder="Enter email" v-model="staff.email">
    <small id="StaffemailHelpcreate" class="form-text text-muted">We'll never share your email with anyone else.</small>
  </div>

<div class="form-group">
    <label for="Staffmojoinedcreate">Month and Year of Joined</label>
    <input type="text" class="form-control" id="Staffmojoinedcreate" aria-describedby="StaffnameHelp" placeholder="Enter Month and Year of Joined" v-model="staff.mojoined">
  </div>

  <div class="form-group">
    <label for="Staffeidcreate">Employee Id</label>
    <input type="text" class="form-control" id="Staffeidcreate" aria-describedby="StaffnameHelp" placeholder="Enter Employee Id" v-model="staff.eid">
  </div>


  <div class="form-group">
    <label for="Staffpassword">Password</label>
    <input type="password" class="form-control" id="Staffpasswordcreate" placeholder="Password" v-model="staff.password">
  </div>


  <div class="form-group">
    <label for="staff_role">Dashboard Role</label>
<select class="form-control" v-model="staff.role" id="staff_role" style="width:120px;">
  <option v-for="create_roleoption in create_roleoptions" v-bind:value="create_roleoption.value">
    {{ create_roleoption.text }}
  </option>
</select>
  </div>

  <div class="form-group">
    <label for="staff_department">Studied Department</label>
<select class="form-control" v-model="staff.department" id="staff_department" style="width:120px;">
  <option v-for="create_departmentoption in create_departmentoptions" v-bind:value="create_departmentoption.value">
    {{ create_departmentoption.text }}
  </option>
</select>
  </div>

    <div class="form-group">
    <label for="staff_departmentfor">Working Department</label>
<select class="form-control" v-model="staff.departmentfor" id="staff_departmentfor" style="width:120px;">
  <option v-for="create_departmentoption in create_departmentoptions" v-bind:value="create_departmentoption.value">
    {{ create_departmentoption.text }}
  </option>
</select>
  </div>

<div class="form-group">
    <label for="staff_occupation">Staff Occupation</label>
<select class="form-control" v-model="staff.occupation" id="staff_occupation" style="width:120px;"> 
  <option v-for="occupation_option in occupation_options" v-bind:value="occupation_option.value">
    {{ occupation_option.text }}
  </option>
</select>
</div>




    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal" v-on:click="closeEditbar">Close</button>
        <button type="submit" class="btn btn-primary">Save</button>
      </div>
</form>
      </div>
    </div>
  </div>
</div>


                            <table class="table">
  <thead>
    <tr>
      <th scope="col">#EID</th>
      <th scope="col">Name</th>
      <th scope="col">Email</th>
      <th scope="col">Department</th>
      <th scope="col">Role</th>
      <th scope="col">Edit</th>
    </tr>
  </thead>
  <tbody>
    <tr v-for="staff in filteredItems" v-bind:key="staff.id">
      <th scope="row">{{ staff.eid }}</th>
      <td>{{ staff.name }}</td>
      <td>{{ staff.email }}</td>
      <td style="text-transform:uppercase;">{{ staff.department }}</td>
      <td style="text-transform:uppercase;">{{ staff.occupation }}</td>
      <td><button type="button" class="btn btn-outline-primary btn-sm" data-toggle="modal" @click="editStaff(staff)" data-target="#createStaff">
        
  Edit
</button></td>
<td><button type="button" class="btn btn-outline-primary btn-sm" data-toggle="modal" @click="viewStaff(staff)" data-target="#viewStaff">
        
  View
</button></td>
    </tr>
  </tbody>
</table>
                        </div>
                    </div>
                </div>
            </div>
   
   
    </div>
</template>

<script>
export default {
    //datas declared
    data(){
        return{
          default_pic: '/img/profile_default_pic.png',
        //departments for filter
             selected: 'all',
    options: [
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
        
    ],
    //role
    selectedrole: 'all',
    roleoptions: [
      { text: 'all', value: 'all' },
      { text: 'Hod', value: 'hod' },
        { text: 'Professor', value: 'professor' },
        { text: 'Assoc Professor', value: 'assocprofessor' },
        { text: 'Asst Professor', value: 'asstprofessor' }
    ],
    //create occupation
    occupation_selected: '',
    occupation_options:[
      { text: 'Hod', value: 'hod' },
      { text: 'Professor', value: 'professor'},
      { text: 'Assoc Professor', value: 'assocprofessor' },
      { text: 'Asst Professor', value: 'asstprofessor'}
    ],


create_roleoptions: [
        { text: 'SuperAdmin', value: 'superadmin' },
        { text: 'Admin', value: 'admin' },
        { text: 'Staff', value: 'staff' },
        { text: 'SubStaff', value: 'substaff' }
],
create_departmentoptions: [
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
],

staffs: [],
errors:[],
      staff: {
        id: '',
        name: '',
        email: '',
        password: '',
        role: '',
        occupation: '',
        department: '',
        mojoined: '',
        eid: '',
        departmentfor:''
      },
      user_id: '',
      pagination: {},
       edit: false
        };
    },
    props:{
      userRole: Number,
    },
    //This function runs while loading the page
    created(){
        this.fetchUsers();
    },
    // create methods here
    methods:{
      checkForm:function() {
      if(this.name) return true;
      this.errors = [];
      if(!this.name && !this.email  && !this.password  && !this.role  && !this.occupation  && !this.department && !this.eid) this.errors.push("All Fields Required");
      
    },
         fetchUsers(page_url) {
      let vm = this;
      page_url = page_url || 'api/staffprofile';
      fetch(page_url)
        .then(res => res.json())
        .then(res => {
          this.staffs = res.data;
        })
        .catch(err => console.log(err));
     }
    ,
     addStaff() {
       //this.checkForm();
      if (this.edit === false) {
        // Add
        fetch('api/staffprofile', {
          method: 'post',
          body: JSON.stringify(this.staff),
          headers: {
            'content-type': 'application/json'
          }
        })
          .then(res => res.json())
          .then(data => {
            this.staff.name = '';
            this.staff.email = '';
            this.staff.password = '';
            this.staff.role = '';
            this.staff.occupation = '';
            this.staff.department = '';
            this.staff.mojoined = '';
            this.staff.eid = '';
            this.staff.departmentfor = '';
            alert('Staff Added');
            this.fetchUsers();
          })
          .catch(err => console.log(err));
      } else {
        // Update
        fetch('api/staffprofile', {
          method: 'put',
          body: JSON.stringify(this.staff),
          headers: {
            'content-type': 'application/json'
          }
        })
          .then(res => res.json())
          .then(data => {
            this.staff.name = '';
            this.staff.email = '';
            this.staff.password = '';
            this.staff.role = '';
            this.staff.occupation = '';
            this.staff.department = '';
            this.staff.mojoined = '';
            this.staff.eid = '';
            this.staff.departmentfor = '';
            alert('Staff Updated');
            this.fetchUsers();
          })
          .catch(err => console.log(err));
      }
    },
    editStaff(staff) {
      this.edit = true;
      this.staff.id = staff.id;
      this.staff.user_id = staff.id;
      this.staff.name = staff.name;
      this.staff.email = staff.email;
      this.staff.password = staff.password;
      this.staff.role = staff.role;
      this.staff.occupation = staff.occupation;
      this.staff.department = staff.department;
      this.staff.departmentfor = staff.departmentfor;
      this.staff.mojoined = staff.mojoined;
      this.staff.eid = staff.eid;
    },
    viewStaff(staff) {
      this.staff.id = staff.id;
      this.staff.user_id = staff.id;
      this.staff.name = staff.name;
      this.staff.email = staff.email;
      this.staff.password = staff.password;
      this.staff.role = staff.role;
      this.staff.occupation = staff.occupation;
      this.staff.departmentfor = staff.departmentfor;
      this.staff.department = staff.department;
      this.staff.mojoined = staff.mojoined;
      this.staff.eid = staff.eid;
    },
    closeEditbar(){
     this.staff.name = '';
            this.staff.email = '';
            this.staff.password = '';
            this.staff.role = '';
            this.staff.occupation = '';
            this.staff.department = '';
            this.staff.mojoined = '';
            this.staff.eid = '';
            this.staff.departmentfor = '';
    }
    },
    computed: {
        filteredItems: function() {
			let vm = this;
			let department = vm.selected;
			let occupation = vm.selectedrole;

			if(department === "all" && occupation === "all") {
				//save performance, juste return the default array:
				return vm.staffs;
			} else {
				return vm.staffs.filter(function(staff) {
					//return the array after passimng it through the filter function:
					return  (department === 'all' || staff.department === department) && (occupation === 'all'  || staff.occupation === occupation);	 

				});
			}
		}
    }

   
	
}
</script>


<style scoped>
.create-staff-btn
{
  margin-top: -40px;
}
</style>
