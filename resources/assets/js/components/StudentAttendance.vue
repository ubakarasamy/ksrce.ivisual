<template>
<div class="home">
    <div class="createAttendance-form" v-if="createForm === true">
    <div class="card">
        <div class="card-header">
          <h3>Make Attendance for {{createAttendance.makedate}}</h3>
        </div>
        <div class="card-body">
            <div class="row">
              <div class="form-group col-md-2">
<!-- Degree -->
 <label for="student_degree_filter">Degree</label><br>
<select class="form-control" id="student_degree_filter" style="width:120px;display:inline-block;" v-model="degreeSelected">
  <option v-for="degreeOption in degreeOptions" v-bind:value="degreeOption.value">{{ degreeOption.text }}</option>
</select>
</div>

<div class="form-group col-md-2">
    <!-- Year -->
 <label for="student_year_filter">Year</label><br>
<select class="form-control" id="student_year_filter" v-model="yearSelected" style="width:120px;display:inline-block;">
  <option v-for="yearOption in filteredYears" v-bind:value="yearOption.value">
    {{ yearOption.text }}
  </option>
</select>
</div>

<div class="form-group col-md-2">
    <!-- Deaprtment -->
 <label for="student_filter_department">Department</label><br>
<select :disabled="userrole > 2" class="form-control" id="student_filter_department" v-model="departmentSelected" style="width:120px;">
  <option v-for="departmentOption in filteredDepartments" v-bind:value="departmentOption.value">
    {{ departmentOption.text }}
  </option>
</select>
</div>

<div class="form-group col-md-2">
    <!-- Semester -->
<label for="student_filter_semester">Semester</label><br>
<select class="form-control" v-model="semesterSelected" id="student_filter_section" style="width:120px;"> 
  <option v-for="semesterOption in filteredSemester" v-bind:value="semesterOption.value">
    {{semesterOption.text}}
  </option>
  </select>
</div>

<div class="form-group col-md-2">
  <!-- Section -->
<label for="student_filter_section">Section</label><br>
<select class="form-control" v-model="sectionSelected" id="student_filter_section" style="width:120px;"> 
  <option v-for="sectionOption in sectionOptions" v-bind:value="sectionOption.value">
    {{sectionOption.text}}
  </option>
</select>  
</div>
            </div>
            <!-- Form -->
                            <form @submit.prevent="makeDate">
                               <div class="row">
                                    <div class="form-group col-md-4">
                                            <label for="date">Date </label>
                                            <input type="date" id="date" v-model="createAttendance.makedate" name="date" max="3000-12-31" min="1000-01-01" class="form-control" style="width:200px;">
                                            <p class="text-muted">Please double Check the Date</p>
                                       </div>
                                       <div class="form-group col-md-4">
                                            <label for="eid">Employee ID</label>
                                            <input type="text" id="eid" v-model="createAttendance.staff_eid" name="eid" class="form-control">
                                            <p class="text-muted">Enter Your Employee Id</p>
                                       </div>
                                       <div class="form-group col-md-4">
                                            <label for="eid">Day</label>
                                            <select class="form-control" style="width:100px;" name="day" id="day" v-model="createAttendance.day">
                                              <option value="mon">Monday</option>
                                              <option value="tue">Tuesday</option>
                                              <option value="wed">Wednesday</option>
                                              <option value="thu">Thusday</option>
                                              <option value="fri">Friday</option>
                                            </select>
                                       </div>
                               </div>
                               <button :disabled="validateDepart == 1" type="submit" class="btn btn-primary">Submit</button>
                            </form>
                            
            </div>
        </div>
    </div>

<div class="attendance-table" v-if="createForm === false">
        <div class="card">
            <div class="card-header">
                <h1 class="card-title">Make Attendance for {{createAttendance.makedate}}</h1>
                <a role="button" class="btn btn-primary float-right" href="">Back</a>

</div>

<div class="select-hours ml-5 mt-2" style="display-inline">
    <div class="form-group"><label for="h1">H1</label>&nbsp&nbsp<input type="checkbox" name="h1" id="h1" v-model="selectedH.h1"></div>
    <div class="form-group"><label for="h2">H2</label>&nbsp&nbsp<input type="checkbox" name="h2" id="h2" v-model="selectedH.h2"></div>
    <div class="form-group"><label for="h3">H3</label>&nbsp&nbsp<input type="checkbox" name="h3" id="h3" v-model="selectedH.h3"></div>
    <div class="form-group"><label for="h4">H4</label>&nbsp&nbsp<input type="checkbox" name="h4" id="h4" v-model="selectedH.h4"></div>
    <div class="form-group"><label for="h5">H5</label>&nbsp&nbsp<input type="checkbox" name="h5" id="h5" v-model="selectedH.h5"></div>
    <div class="form-group"><label for="h6">H6</label>&nbsp&nbsp<input type="checkbox" name="h6" id="h6" v-model="selectedH.h6"></div>
    <div class="form-group"><label for="h7">H7</label>&nbsp&nbsp<input type="checkbox" name="h7" id="h7" v-model="selectedH.h7"></div>    
<button class="btn btn-primary" style="width:160px; float:right;margin:10px;" @click="makeallPresent()">Make all present</button>

</div>

<div class="search-input">
  <input type="text" v-model="searchStud" class="form-control ml-4 mb-2" placeholder="Search Name" style="width:200px;">

</div>

         </div>
            <div class="card-body">
                <table class="table">
                    <thead>
                        <th>#REG NO</th>
                        <th>Name</th>
                        <th>Status</th>
                        <th>Change Status</th>
                    </thead>
                    <tbody>
                        <tr v-for="student in filteredStudents" v-bind:key="student.id">
                            <td>{{ student.register_no }}</td>
                            <td>{{ student.name }}</td>
                            <td>
                                <ul class="hours_list">
                                    <li>
                                        1 <br>
                                        <span v-if="getStatusH1(student.id)" style="color:#89729E;">{{getStatusH1(student.id)}}</span>
                                        <span v-if="getStatusH1(student.id) == null" style="color:#F47983;">Null</span>
                                    </li>
                                    <li>
                                        2 <br>
                                       <span v-if="getStatusH2(student.id)" style="color:#89729E;">{{getStatusH2(student.id)}}</span>
                                        <span v-if="getStatusH2(student.id) == null" style="color:#F47983;">Null</span>
                                    </li>
                                    <li>
                                        3 <br>
                                       <span v-if="getStatusH3(student.id)" style="color:#89729E;">{{getStatusH3(student.id)}}</span>
                                        <span v-if="getStatusH3(student.id) == null" style="color:#F47983;">Null</span>
                                    </li>
                                    <li>
                                        4 <br>
                                       <span v-if="getStatusH4(student.id)" style="color:#89729E;">{{getStatusH4(student.id)}}</span>
                                        <span v-if="getStatusH4(student.id) == null" style="color:#F47983;">Null</span>
                                    </li>
                                    <li>
                                        5 <br>
                                       <span v-if="getStatusH5(student.id)" style="color:#89729E;">{{getStatusH5(student.id)}}</span>
                                        <span v-if="getStatusH5(student.id) == null" style="color:#F47983;">Null</span>
                                    </li>
                                    <li>
                                        6 <br>
                                       <span v-if="getStatusH6(student.id)" style="color:#89729E;">{{getStatusH6(student.id)}}</span>
                                        <span v-if="getStatusH6(student.id) == null" style="color:#F47983;">Null</span>
                                    </li>
                                    <li>
                                        7 <br>
                                        <span v-if="getStatusH7(student.id)" style="color:#89729E;">{{getStatusH7(student.id)}}</span>
                                        <span v-if="getStatusH7(student.id) == null" style="color:#F47983;">Null</span>
                                    </li>
                                </ul>
                            </td>
                            <td>
                                <select class="form-control" id="student_section_filter" @change="SetStatus(student)" v-model="setStatusSelected" style="width:120px;display:inline-block;"> 
  <option value="default" disabled selected>select</option>
  <option  v-for="setStatuse in setStatuses" v-bind:value="setStatuse.value">
    {{ setStatuse.text }}
  </option>
</select>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
</div>


</template>

<script>
export default {
  data() {
    return {
      searchStud:'',
      gotData:[],
      semester:'',
      hours:{
        h1:'',
        h2:'',
        h3:'',
        h4:'',
        h5:'',
        h6:'',
        h7:''
      },
      times:[],
      selectedDay:'',
      students: [],
      createAttendance: {
        makedate: "",
        staff_eid: "",
        day:""
      },
      attendanceDatas: [],
      createForm: true,
      //student filter datas start
     //Degree
degreeSelected:'',
degreeOptions:[
          { text:'BE', value: 'be'},
          { text:'ME', value: 'me'}
        ],
//create department
departmentSelected: '',
departmentOptions: [
      { text: 'ECE', value: 'ece', degree: 'be' },
        { text: 'EEE', value: 'eee', degree: 'be'  },
        { text: 'MECH', value: 'mech', degree: 'be'  },
        { text: 'CSE', value: 'cse', degree: 'be'  },
        { text: 'IT', value: 'it', degree: 'be'  },
        { text: 'CIVIL', value: 'civil', degree: 'be'  },
        { text: 'AUTOMOBILE', value: 'automobile', degree: 'be'  },
        { text: 'ME-CSE', value: 'me-cse', degree: 'me'  },
        { text: 'ME-CEM', value: 'me-cem', degree: 'me'  },
        { text: 'ME-EST', value: 'me-est', degree: 'me'  },
        { text: 'ME-ISE', value: 'me-ise', degree: 'me'  },
        { text: 'ME-PED', value: 'me-ped', degree: 'me'  },
        { text: 'ME-SE', value: 'me-se', degree: 'me'  },
        { text: 'ME-VLSI', value: 'me-vlsi', degree: 'me'  },
        { text: 'MTECH-IT', value: 'mtech-it', degree: 'me'  },
        { text: 'MBA', value: 'mba', degree: 'me'  }
],
// Create Year 
yearSelected: '',
yearOptions: [
      { text: '1st Year', value: '1', degree: 'be&me'   },
      { text: '2nd year', value: '2', degree: 'be&me'   },
      { text: '3rd year', value: '3', degree: 'be'   },
      { text: 'Final year', value: '4', degree: 'be'   }
],
// Create Semester 
semesterSelected:'',
semesterOptions:[
            { text:'1', value: '1', degree: 'be&me'  },
            { text:'2', value: '2', degree: 'be&me'  },
            { text:'3', value: '3', degree: 'be&me'  },
            { text:'4', value: '4', degree: 'be&me'  },
            { text:'5', value: '5', degree: 'be'  },
            { text:'6', value: '6', degree: 'be'  },
            { text:'7', value: '7', degree: 'be'  },
            { text:'8', value: '8', degree: 'be'  }
        ],
// Create section 
sectionSelected: '',
sectionOptions: [
      { text: 'A', value: 'a' },
      { text: 'B', value: 'b' },
      { text: 'C', value: 'c' },
      { text: 'D', value: 'd' }
],
      //student filter datas end
      setStatusSelected: 'default',
      setStatuses:[
          {text:'Present', value:'present'},
          {text:'Absent', value:'absent'},
          {text:'Leave', value:'leave'},
          {text:'OD', value:'od'}
      ],
      selectedH:{
          h1:'',
          h2:'',
          h3:'',
          h4:'',
          h5:'',
          h6:'',
          h7:''
      },
      validateDepart: ''
    };
  },
  created(){
    this.fetchTimes();
    this.setuserDepaartment();
  },
  props:['userrole', 'authenticateduser'],
  methods: {
showSet(){
        if(this.userrole < 2){
          return true;
        }
    },
makeallPresent(){
  const PassData = {};
        PassData.students = this.filteredStudents;
        PassData.date = this.createAttendance.makedate;

        if(this.selectedH.h1){ PassData.h1 = 'present'; }
        if(this.selectedH.h2){ PassData.h2 = 'present'; }
        if(this.selectedH.h3){ PassData.h3 = 'present'; }
        if(this.selectedH.h4){ PassData.h4 = 'present'; }
        if(this.selectedH.h5){ PassData.h5 = 'present'; }
        if(this.selectedH.h6){ PassData.h6 = 'present'; }
        if(this.selectedH.h7){ PassData.h7 = 'present'; }

      fetch("/api/studentattendance/setallstatus", {
        method: "post",
        body: JSON.stringify(PassData),
        headers: {
          "content-type": "application/json"
        }
      })
        .then(res => res.json())
        .then(data => {
          
        })
        .catch(err => console.log(err));
        this.fetchAttendanceData(this.createAttendance.makedate);
       this.getAllStudents();
},
    makeDate() {
      let passdata = {
        makedate: this.createAttendance.makedate,
        staff_eid: this.createAttendance.staff_eid,
        day: this.createAttendance.day,
        degree: this.degreeSelected,
        department: this.departmentSelected,
        year: this.yearSelected,
        semester: this.semesterSelected,
        section: this.sectionSelected
      }
      fetch("/api/studentattendance", {
        method: "post",
        body: JSON.stringify(passdata),
        headers: {
          "content-type": "application/json"
        }
      })
        .then(res => res.json())
        .then(res => {
          //console.log(res.data);
        });
      this.createForm = false;
      alert("success");
      this.getAllStudents();
      
    },
    //get all students
    getAllStudents() {
      fetch("/api/studentProfile")
        .then(res => res.json())
        .then(res => {
          this.students = res.data;
        })
        .catch(err => console.log(err));
      this.fetchAttendanceData(this.createAttendance.makedate);
    },
    //Fetch Attendance Data
    fetchAttendanceData(makedate) {
      let vm = this;
      //page_url = '/api/staffattendance/{makedate}';
      fetch("/api/studentattendance/" + makedate + "")
        .then(res => res.json())
        .then(res => {
          this.attendanceDatas = res.data;
        })
        .catch(err => console.log(err));
    },
    // Get status for H1
    getStatusH1(id) {
      var status;
      var aData;
      var child;
      aData = this.attendanceDatas;
      for (var child in aData) {
        if (aData[child].student_id === id) {
          status = aData[child].h1;
        }
      }
      if (status) {
        return status;
      } else {
        return null;
      }
    },
    // Get status for H2
    getStatusH2(id) {
      var status;
      var aData;
      var child;
      aData = this.attendanceDatas;
      for (var child in aData) {
        if (aData[child].student_id === id) {
          status = aData[child].h2;
        }
      }
      if (status) {
        return status;
      } else {
        return null;
      }
    },
    // Get status for H3
    getStatusH3(id) {
      var status;
      var aData;
      var child;
      aData = this.attendanceDatas;
      for (var child in aData) {
        if (aData[child].student_id === id) {
          status = aData[child].h3;
        }
      }
      if (status) {
        return status;
      } else {
        return null;
      }
    },
    // Get status for H4
    getStatusH4(id) {
      var status;
      var aData;
      var child;
      aData = this.attendanceDatas;
      for (var child in aData) {
        if (aData[child].student_id === id) {
          status = aData[child].h4;
        }
      }
      if (status) {
        return status;
      } else {
        return null;
      }
    },
    // Get status for H5
    getStatusH5(id) {
      var status;
      var aData;
      var child;
      aData = this.attendanceDatas;
      for (var child in aData) {
        if (aData[child].student_id === id) {
          status = aData[child].h5;
        }
      }
      if (status) {
        return status;
      } else {
        return null;
      }
    },
    // Get status for H6
    getStatusH6(id) {
      var status;
      var aData;
      var child;
      aData = this.attendanceDatas;
      for (var child in aData) {
        if (aData[child].student_id === id) {
          status = aData[child].h6;
        }
      }
      if (status) {
        return status;
      } else {
        return null;
      }
    },
    // Get status for H7
    getStatusH7(id) {
      var status;
      var aData;
      var child;
      aData = this.attendanceDatas;
      for (var child in aData) {
        if (aData[child].student_id === id) {
          status = aData[child].h7;
        }
      }
      if (status) {
        return status;
      } else {
        return null;
      }
    },
     // set status
    SetStatus(Student) {
        const PassData = {};
        PassData.student_id = Student.id;
        PassData.date = this.createAttendance.makedate;
        if(this.selectedH.h1){ PassData.h1 = this.setStatusSelected }
        if(this.selectedH.h2){ PassData.h2 = this.setStatusSelected }
        if(this.selectedH.h3){ PassData.h3 = this.setStatusSelected }
        if(this.selectedH.h4){ PassData.h4 = this.setStatusSelected }
        if(this.selectedH.h5){ PassData.h5 = this.setStatusSelected }
        if(this.selectedH.h6){ PassData.h6 = this.setStatusSelected }
        if(this.selectedH.h7){ PassData.h7 = this.setStatusSelected }
      fetch("/api/studentattendance/setstatus", {
        method: "post",
        body: JSON.stringify(PassData),
        headers: {
          "content-type": "application/json"
        }
      })
        .then(res => res.json())
        .then(data => {
          (this.Student.selectedStatus = ""), (this.Student.id = "");
        })
        .catch(err => console.log(err));
      this.fetchAttendanceData(this.createAttendance.makedate);
       this.setStatusSelected = 'default';
       this.getAllStudents();
      //console.log(JSON.stringify(PassData));
    },
  //get all Timetables
  fetchTimes(){
    fetch("/api/alltimetables")
    .then(res => res.json())
    .then(res => {
      this.times = res.data;
      //console.log(res.data);
    })
    .catch(err => console.log(err));
  },
  //Fetch sem
        fetchSem(){
            fetch('/api/fetchsemester')
            .then(res => res.json())
            .then(res => {
                this.gotData = res.data;
            })
            .catch(err => console.log(err));
        },
  },
  computed: {
    filteredStudents() {
      let vm = this;

      if(this.userrole > 2){
        this.departmentSelected = this.authenticateduser.department;
        this.validateDepart = 1;
      }
let filterDepartment = vm.departmentSelected;

      let filterYear = vm.yearSelected;
      let filterSection = vm.sectionSelected;
      let search = this.searchStud;
      if (
        filterDepartment === "all" &&
        filterYear === "all" &&
        filterSection === "all" && search === ""
      ) {
        return vm.students;
      } else {
        return vm.students.filter(function(student) {
          return (
            (filterDepartment === "all" ||
              student.department === filterDepartment) &&
            (filterYear === "all" || student.year === filterYear) &&
            (filterSection === "all" || student.section === filterSection) &&
            (student.name.toLowerCase().includes(search.toLowerCase()))
          );
        });
      }
    },
    filteredDepartments(){
        let vm =this;
        let Degree;
        let Departments;
        Degree = vm.degreeSelected;
        Departments = vm.departmentOptions;
        
        return Departments.filter(function(Department){
          return (Department.degree === Degree);
        });
        
      },
        filteredYears(){
         let vm =this;
        let Degree;
        let Years;
        Degree = vm.degreeSelected;
        Years = vm.yearOptions;
        if(Degree === 'be'){
          return Years;
        }else if(Degree === 'me'){
        return Years.filter(function(Year){
          return (Year.degree === 'be&me');
        });
      }else{
          return Years;
      }
      },
      filteredSemester(){
         let vm =this;
        let Degree;
        let Semester;
        Degree = vm.degreeSelected;
        Semester = vm.semesterOptions;
        if(Degree === 'be'){
          return Semester;
        }else if(Degree === 'me'){
        return Semester.filter(function(sem){
          return (sem.degree === 'be&me');
        });
      }else{
          return Semester;
      }
      }
      
  }
};
</script>

<style scoped>
.hours_list li {
  display: inline-block;
  width: 100px;
}
.select-hours
{
    display: inline;
}
.select-hours .form-group
{
    display: inline;
}
</style>
