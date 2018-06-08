<template>
    <div class="container">
            <div class="card">
                <div class="card-header">
                    <h4 class="float-left">Staff Profiles</h4>
                    <button type="button" class="btn btn-primary float-right" data-toggle="modal" data-target="#createStaff">
  Create New Staff
</button>
<select v-model="selected">
  <option v-for="option in options" v-bind:value="option.value">
    {{ option.text }}
  </option>
</select>


<select v-model="selectedrole">
  <option v-for="roleoption in roleoptions" v-bind:value="roleoption.value">
    {{ roleoption.text }}
  </option>
</select>

                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">

                            <!-- Button trigger modal -->

<!-- Modal -->
<div class="modal fade" id="createStaff" tabindex="-1" role="dialog" aria-labelledby="createStaffLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="createStaffLabel">Create New Staff</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
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

<select v-model="staff.role">
  <option v-for="create_roleoption in create_roleoptions" v-bind:value="create_roleoption.value">
    {{ create_roleoption.text }}
  </option>
</select>

<select v-model="staff.department">
  <option v-for="create_departmentoption in create_departmentoptions" v-bind:value="create_departmentoption.value">
    {{ create_departmentoption.text }}
  </option>
</select>


    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
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
      <th scope="col">#ID</th>
      <th scope="col">Name</th>
      <th scope="col">Email</th>
      <th scope="col">Department</th>
      <th scope="col">Role</th>
      <th scope="col">Edit</th>
    </tr>
  </thead>
  <tbody>
    <tr v-for="staff in filteredItems" v-bind:key="staff.id">
      <th scope="row">{{ staff.id }}</th>
      <td>{{ staff.name }}</td>
      <td>{{ staff.email }}</td>
      <td>{{ staff.department }}</td>
      <td>{{ staff.occupation }}</td>
      <td><button type="button" class="btn btn-outline-primary btn-sm" data-toggle="modal" @click="editStaff(staff)" data-target="#createStaff">
  Edit
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
        //department
             selected: 'all',
    options: [
      { text: 'all', value: 'all' },
      { text: 'ECE', value: 'ece' },
        { text: 'EEE', value: 'eee' },
        { text: 'MECH', value: 'mech' },
        { text: 'CSE', value: 'cse' },
        { text: 'IT', value: 'it' },
        { text: 'CIVIL', value: 'civil' }
    ],
    //role
    selectedrole: 'all',
    roleoptions: [
      { text: 'all', value: 'all' },
      { text: 'Hod', value: 'hod' },
        { text: 'Professor', value: 'professor' },
        { text: 'Asst Professor', value: 'asstprofessor' }
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
        { text: 'CIVIL', value: 'civil' }
],

staffs: [],
      staff: {
        id: '',
        name: '',
        email: '',
        password: '',
        role: '',
        occupation: '',
        department: '',
        mojoined: '',
        eid: ''
      },
      user_id: '',
      pagination: {},
       edit: false
        };
    },
    //This function runs while loading the page
    created(){
        this.fetchUsers();
    },
    // create methods here
    methods:{
         fetchUsers(page_url) {
      let vm = this;
      page_url = page_url || '/api/staffprofile';
      fetch(page_url)
        .then(res => res.json())
        .then(res => {
          this.staffs = res.data;
        })
        .catch(err => console.log(err));
     }
    ,
     addStaff() {
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
            this.staff.department = '';
            this.staff.mojoined = '';
            this.staff.eid = '';
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
            this.staff.department = '';
            this.staff.mojoined = '';
            this.staff.eid = '';
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
      this.staff.department = '';
      this.staff.mojoined = '';
      this.staff.eid = '';
    }
    },
    computed: {
        filteredItems: function() {
			var vm = this;
			var department = vm.selected;
			var occupation = vm.selectedrole;

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


