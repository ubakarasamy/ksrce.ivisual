<template>
    <div class="container">
            <div class="card">
                <div class="card-header">
                    <h4 class="float-left card-title">Student Profiles</h4>
                    <button type="button" class="btn btn-primary float-right" data-toggle="modal" data-target="#createStudent">
  Create New Student
</button>
<br>
<br>
<div class="filter-options col-md-12">
   <label for="student_department_filter">Department</label>
<select class="form-control" id="student_department_filter" style="width:120px;display:inline-block;" v-model="student_department_filter_selected">
  <option v-for="student_department_filter_option in student_department_filter_options" v-bind:value="student_department_filter_option.value">{{ student_department_filter_option.text }}</option>
</select>

 <label for="student_year_filter">Year</label>
<select class="form-control" id="student_year_filter" v-model="student_year_filter_selected" style="width:120px;display:inline-block;">
  <option v-for="student_year_filter_option in student_year_filter_options" v-bind:value="student_year_filter_option.value">
    {{ student_year_filter_option.text }}
  </option>
</select>

    <label for="student_section_filter">Section</label>
<select class="form-control" id="student_section_filter" v-model="student_section_filter_selected" style="width:120px;display:inline-block;"> 
  <option  v-for="student_section_filter_option in student_section_filter_options" v-bind:value="student_section_filter_option.value">
    {{ student_section_filter_option.text }}
  </option>
</select>

</div>

</div>
<div class="card-body">
<div class="row">
<div class="col-md-12">
<!-- Button trigger modal -->

<!-- Modal View-->
<div class="modal fade" id="viewStudent" tabindex="-1" role="dialog" aria-labelledby="createStudentLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="createStudentLabel">{{student.name}}</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <img :src="default_pic" alt="student image" class="mx-auto d-block" style="width: 135px;border-radius: 7%;margin: 10px;">
        <table class="table" style="text-transform:uppercase;">
          <tr><td>REG NO:</td><td>{{student.register_no}}</td></tr>
          <tr><td>Name:</td><td>{{student.name}}</td></tr>
          <tr><td>Department:</td><td>{{student.department}}</td></tr>
          <tr><td>Email:</td><td>{{student.email}}</td></tr>
          <tr><td>Phone:</td><td>{{student.phone}}</td></tr>
           <tr><td>Batch:</td><td>{{student.batch}}</td></tr>
        </table>
      </div>
    </div>
  </div>
</div>


<!-- Modal -->
<div class="modal fade" id="createStudent" tabindex="-1" role="dialog" aria-labelledby="createStudentLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="createStudentLabel">Create New Student</h5>
        <button type="button" class="close" @click="closeEdit" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <ul>
      <li class="text-danger" v-for="error in errors">{{ error }}</li>
    </ul>
        <form @submit.prevent="addStudent">
<div class="form-group">
    <label for="Studentnamecreate">Name</label>
    <input type="text" class="form-control" id="Studentnamecreate" v-model="student.name" aria-describedby="StudentnameHelp" placeholder="Enter Name" >
  </div>
  <div class="form-group">
    <label for="Studentemailcreate">Email address</label>
    <input type="email" class="form-control" id="Studentemailcreate" v-model="student.email" aria-describedby="StudentemailHelp" placeholder="Enter email" >
    <small id="StudentemailHelpcreate" class="form-text text-muted">We'll never share your email with anyone else.</small>
  </div>
  <div class="form-group">
    <label for="Studentregister_nocreate">Register No</label>
    <input type="text" class="form-control" id="Studentregister_nocreate" v-model="student.register_no" aria-describedby="Studentregister_noHelp" placeholder="Register No" >
  </div>
  <div class="form-group">
    <label for="Studentbatchcreate">Batch</label>
    <input type="text" class="form-control" id="Studentbatchcreate" v-model="student.batch" aria-describedby="StudentbatchHelp" placeholder="Batch" >
  </div>
<div class="form-group">
    <label for="Studentphonecreate">Phone</label>
    <input type="tel" class="form-control" id="Studentphonecreate" v-model="student.phone" aria-describedby="StudentphoneHelp" placeholder="Phone No" >
  </div>
  <div class="form-group">
    <label for="Studentaddresscreate">Address</label>
    <input type="text" class="form-control" id="Studentaddresscreate" v-model="student.address" aria-describedby="StudentaddressHelp" placeholder="Address" >
  </div>
   <div class="form-group">
    <label for="Studentgurdian_namecreate">Gurdian Name</label>
    <input type="text" class="form-control" id="Studentgurdian_namecreate" v-model="student.gurdian_name" aria-describedby="Studentgurdian_nameHelp" placeholder="Gurdian Name" >
  </div>
  <div class="form-group">
    <label for="student_filter_department">Department</label>
<select class="form-control" id="student_filter_department" v-model="student.department" style="width:120px;">
  <option v-for="student_department_create_option in student_department_create_options" v-bind:value="student_department_create_option.value">
    {{ student_department_create_option.text }}
  </option>
</select>
  </div>

  <div class="form-group">
    <label for="student_filter_year">Year</label>
<select class="form-control" id="student_filter_year" v-model="student.year" style="width:120px;">
  <option v-for="student_year_create_option in student_year_create_options" v-bind:value="student_year_create_option.value">
    {{student_year_create_option.text}}
  </option>
</select>
  </div>

<div class="form-group">
    <label for="student_filter_section">Section</label>
<select class="form-control" v-model="student.section" id="student_filter_section" style="width:120px;"> 
  <option v-for="student_section_create_option in student_section_create_options" v-bind:value="student_section_create_option.value">
    {{student_section_create_option.text}}
  </option>
</select>
</div>

    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" @click="closeEdit" data-dismiss="modal">Close</button>
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
      <th scope="col">#REG NO</th>
      <th scope="col">Name</th>
      <th scope="col">Email</th>
      <th scope="col">Department</th>
      <th scope="col">Year / Section</th>
      <th scope="col">Edit</th>
    </tr>
  </thead>
  <tbody>
    <tr v-for="student in filteredStudents" v-bind:key="student.id">
      <th scope="row">{{ student.register_no }}</th>
      <td>{{ student.name }}</td>
      <td>{{ student.email }}</td>
      <td>{{ student.department }}</td>
      <td>{{ student.year }} / {{ student.section }}</td>
       <td><button type="button" class="btn btn-outline-primary btn-sm" data-toggle="modal" @click="editStudent(student)" data-target="#createStudent">
        
  Edit
</button></td>
<td><button type="button" class="btn btn-outline-primary btn-sm" data-toggle="modal" @click="viewStudent(student)" data-target="#viewStudent">
        
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
    data(){
        return {
           default_pic: '/img/profile_default_pic.png',
            students:[],
            errors:[],
        student:{
            id: '',
            name: '',
            email: '',
            department: '',
            year: '',
            section: '',
            register_no: '',
            batch: '',
            phone: '',
            address: '',
            gurdian_name: ''
            // semester: ''
        },
        edit: false,
        student_id: '',
// student department filter
student_department_filter_selected: 'all',
student_department_filter_options: [
  { text: 'all', value: 'all' },
      { text: 'ECE', value: 'ece' },
        { text: 'EEE', value: 'eee' },
        { text: 'MECH', value: 'mech' },
        { text: 'CSE', value: 'cse' },
        { text: 'IT', value: 'it' },
        { text: 'CIVIL', value: 'civil' }
],
// student Year filter
student_year_filter_selected: 'all',
student_year_filter_options: [
      { text: 'all', value: 'all' },
      { text: '1st Year', value: '1' },
      { text: '2nd year', value: '2' },
      { text: '3rd year', value: '3' },
      { text: 'Final year', value: '4' }
],
// student section filter
student_section_filter_selected: 'all',
student_section_filter_options: [
      { text: 'all', value: 'all' },
      { text: 'A', value: 'a' },
      { text: 'B', value: 'b' },
      { text: 'C', value: 'c' },
      { text: 'D', value: 'd' }
],
// student department filter
student_department_create_selected: 'all',
student_department_create_options: [
  { text: 'all', value: 'all' },
      { text: 'ECE', value: 'ece' },
        { text: 'EEE', value: 'eee' },
        { text: 'MECH', value: 'mech' },
        { text: 'CSE', value: 'cse' },
        { text: 'IT', value: 'it' },
        { text: 'CIVIL', value: 'civil' }
],
// student Year filter
student_year_create_selected: 'all',
student_year_create_options: [
      { text: 'all', value: 'all' },
      { text: '1st Year', value: '1' },
      { text: '2nd year', value: '2' },
      { text: '3rd year', value: '3' },
      { text: 'Final year', value: '4' }
],
// student section filter
student_section_create_selected: 'all',
student_section_create_options: [
      { text: 'all', value: 'all' },
      { text: 'A', value: 'a' },
      { text: 'B', value: 'b' },
      { text: 'C', value: 'c' },
      { text: 'D', value: 'd' }
]

    }
    },
    created(){
        this.fetchStudents();
    },
    methods: {
      checkForm:function() {
      if(this.name) return true;
      this.errors = [];
      if(!this.name && !this.email && !this.register_no && !this.batch && !this.phone && !this.address && !this.gurdian_name && !this.department  && !this.year  && !this.section) this.errors.push("All Fields Required");
    },
        fetchStudents(){
            fetch('api/studentProfile')
                .then(res => res.json())
                .then(res => {
                    this.students = res.data;
                })
        },
        addStudent() {
          //this.checkForm();
      if (this.edit === false) {
        // Add
        fetch('api/studentProfile', {
          method: 'post',
          body: JSON.stringify(this.student),
          headers: {
            'content-type': 'application/json'
          }
        })
          .then(res => res.json())
          .then(data => {
            this.student.name = '',
            this.student.email = '',
            this.student.department = '',
            this.student.year = '',
            this.student.section = '',
            this.student.register_no = '',
            this.student.batch = '',
            this.student.phone = '',
            this.student.address = '',
            this.student.gurdian_name = ''
            // this.student.semester = ''
            alert('Student Added');
            this.fetchStudents();
          })
          .catch(err => console.log(err));
      } else {
        // Update
        fetch('api/studentProfile', {
          method: 'put',
          body: JSON.stringify(this.student),
          headers: {
            'content-type': 'application/json'
          }
        })
          .then(res => res.json())
          .then(data => {
            this.student.name = '',
            this.student.email = '',
            this.student.department = '',
            this.student.year = '',
            this.student.section = '',
            this.student.register_no = '',
            this.student.batch = '',
            this.student.phone = '',
            this.student.address = '',
            this.student.gurdian_name = ''
            // this.student.semester = ''
            alert('Student Updated');
            this.fetchStudents();
          })
          .catch(err => console.log(err));
      }
    },
    editStudent(student) {
      this.edit = true;
      this.student.id = student.id;
      this.student.student_id = student.id;
      this.student.name = student.name;
      this.student.email = student.email;
      this.student.department = student.department;
      this.student.year = student.year;
      this.student.section = student.section;
      this.student.register_no = student.register_no;
      this.student.batch = student.batch;
      this.student.phone = student.phone;
      this.student.address = student.address;
      this.student.gurdian_name = student.gurdian_name;
      // this.student.semester = student.semester;
    },viewStudent(student){
      this.student.id = student.id;
      this.student.student_id = student.id;
      this.student.name = student.name;
      this.student.email = student.email;
      this.student.department = student.department;
      this.student.year = student.year;
      this.student.section = student.section;
      this.student.register_no = student.register_no;
      this.student.batch = student.batch;
      this.student.phone = student.phone;
      this.student.address = student.address;
      this.student.gurdian_name = student.gurdian_name;
    }
    ,closeEdit(){
      this.student.name = '',
            this.student.email = '',
            this.student.department = '',
            this.student.year = '',
            this.student.section = '',
            this.student.register_no = '',
            this.student.batch = '',
            this.student.phone = '',
            this.student.address = '',
            this.student.gurdian_name = ''
    }
    },
    computed: {
      filteredStudents(){
        let vm = this;
        let filterDepartment = vm.student_department_filter_selected;
        let filterYear = vm.student_year_filter_selected;
        let filterSection = vm.student_section_filter_selected;


        if(filterDepartment === 'all' && filterYear === 'all' && filterSection === 'all'){
          return vm.students;
        }else{
          return vm.students.filter(function(student){
            
            return (filterDepartment === 'all' || student.department === filterDepartment) && (filterYear === 'all' || student.year === filterYear) && (filterSection === 'all' || student.section === filterSection);

          });

          }
        }
      }
    
}
</script>
