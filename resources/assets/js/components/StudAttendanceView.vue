<template>
<div class="stud-at-view">
 <div class="day-view">

<div class="filter-options">
<!-- pick date -->
<div class="form-group">
<label for="date">Date</label>
<input type="date" id="date" v-model="makedate" @change="fetchAttendanceData()" name="date" max="3000-12-31" min="1000-01-01" class="form-control" style="width:200px;">
</div>
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
<select class="form-control" id="student_filter_department" v-model="departmentSelected" style="width:120px;">
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




<!-- get data -->

 <table class="table">
                    <thead>
                        <th>#REG NO</th>
                        <th>Name</th>
                        <th>Status</th>
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
                        </tr>
                    </tbody>
                </table>



</div>

</div>

</template>
   
<script>
export default {
    data(){
        return{
            students: [],
            makedate:'',
            attendnaceDatasBydate:[],
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
        }
    },
    created(){
       
    },
    methods:{
        //get all students
    getAllStudents() {
      fetch("/api/studentProfile")
        .then(res => res.json())
        .then(res => {
          this.students = res.data;
        })
        .catch(err => console.log(err));
    },
        //Fetch Attendance Data
    fetchAttendanceData() {
        this.getAllStudents();
      let vm = this;
      fetch("/api/studentattendance/" + vm.makedate + "")
        .then(res => res.json())
        .then(res => {
          this.attendnaceDatasBydate = res.data;
          console.log(res.data);
        })
        .catch(err => console.log(err));
        
    },
    // Get status for H1
    getStatusH1(id) {
      var status;
      var aData;
      var child;
      aData = this.attendnaceDatasBydate;
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
      aData = this.attendnaceDatasBydate;
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
      aData = this.attendnaceDatasBydate;
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
      aData = this.attendnaceDatasBydate;
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
      aData = this.attendnaceDatasBydate;
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
      aData = this.attendnaceDatasBydate;
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
      aData = this.attendnaceDatasBydate;
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
    }
    },
    computed: {
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
      },
    filteredStudents() {
      let vm = this;
      let filterDepartment = vm.departmentSelected;
      let filterYear = vm.yearSelected;
      let filterSection = vm.sectionSelected;

      if (
        filterDepartment === "all" &&
        filterYear === "all" &&
        filterSection === "all"
      ) {
        return vm.students;
      } else {
        return vm.students.filter(function(student) {
          return (
            (filterDepartment === "all" ||
              student.department === filterDepartment) &&
            (filterYear === "all" || student.year === filterYear) &&
            (filterSection === "all" || student.section === filterSection)
          );
        });
      }
    }
  }
}
</script>


<style scoped>
.hours_list li
{
    list-style: none;
    display: inline-block;
}
</style>
