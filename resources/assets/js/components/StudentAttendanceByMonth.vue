<template>
<div class="card">
    
<div class="card-body">
<div class="input-options" v-if="showStudd === false">
  <form @submit.prevent="getAllAtDatas()">
<div class="filter-options row">
  <div class="form-group col-md-2">
<!-- Degree -->
 <label for="student_degree_filter">Degree</label><br>
<select :required="true" :disabled="userrole > 2" class="form-control" id="student_degree_filter" style="width:120px;display:inline-block;" v-model="degreeSelected">
  <option v-for="degreeOption in degreeOptions" v-bind:value="degreeOption.value">{{ degreeOption.text }}</option>
</select>
</div>

<div class="form-group col-md-2">
<!-- Year -->
 <label for="student_year_filter">Year</label><br>
<select :required="true" class="form-control" id="student_year_filter" v-model="yearSelected" style="width:120px;display:inline-block;">
  <option v-for="yearOption in filteredYears" v-bind:value="yearOption.value">
    {{ yearOption.text }}
  </option>
</select>
</div>

<div class="form-group col-md-2">
    <!-- Deaprtment -->
 <label for="student_filter_department">Department</label><br>
<select :required="true" :disabled="userrole > 2" class="form-control" id="student_filter_department" v-model="departmentSelected" style="width:120px;">
  <option v-for="departmentOption in filteredDepartments" v-bind:value="departmentOption.value">
    {{ departmentOption.text }}
  </option>
</select>
</div>

<div class="form-group col-md-2">
    <!-- Semester -->
<label for="student_filter_semester">Semester</label><br>
<select :required="true" class="form-control" v-model="semesterSelected" id="student_filter_section" style="width:120px;"> 
  <option v-for="semesterOption in filteredSemester" v-bind:value="semesterOption.value">
    {{semesterOption.text}}
  </option>
  </select>
</div>

<div class="form-group col-md-2">
  <!-- Section -->
<label for="student_filter_section">Section</label><br>
<select :required="true" class="form-control" v-model="sectionSelected" id="student_filter_section" style="width:120px;"> 
  <option v-for="sectionOption in sectionOptions" v-bind:value="sectionOption.value">
    {{sectionOption.text}}
  </option>
</select>  
</div>

</div>

<div class="from-to">
  <!-- from date -->
<div class="form-group">
<label for="fromDate">From Date</label>
<input :required="true"  type="date" id="fromDate" v-model="fromDate" name="fromDate" max="3000-12-31" min="1000-01-01" class="form-control" style="width:200px;">
</div>
  <!-- to date -->
<div class="form-group">
<label for="toDate">From Date</label>
<input :required="true"  type="date" id="toDate" v-model="toDate" name="toDate" max="3000-12-31" min="1000-01-01" class="form-control" style="width:200px;">
</div>
<button type="submit" class="btn btn-primary">Submit</button>
</div>
  </form>
     </div>
<div class="showstudd" v-if="showStudd === true">
    <h4>Attendance Record {{fromDate}} to {{toDate}}</h4>
  <div class="name-search">
    <input type="text" v-model="nameSearch" class="form-control mb-2" placeholder="Search by Name" style="width:250px;">
  </div>
<div class="table-responsive student-table">
<table class="table">
    <thead>
        <th>REG NO</th>
        <th>Name</th>
        <th v-for="AtDate in AtDates" v-bind:key="AtDate.id">{{ moment(AtDate.attendancedate).format('Do-MM') }}</th>
    </thead>
    <tbody>
        <tr v-for="stud in filteredStudents" v-bind:key="stud.id">
            <td>{{stud.register_no}}</td>
            <td>{{stud.name}}</td>
            <td class="text-center" v-for="AtDate in AtDates" v-bind:key="AtDate.id" style="transform: rotate(-90deg):">
              <span class="text-danger" v-if="getAtDataByStud(AtDate.attendancedate, stud.id) == 0">
                  A
              </span>
              <span class="text-primary" v-if="getAtDataByStud(AtDate.attendancedate, stud.id) != 0">
                  {{ getAtDataByStud(AtDate.attendancedate, stud.id) }}
              </span>
            </td>
        </tr>
    </tbody>
</table>
</div>
</div>
    </div>
</div>
</template>

<script>
export default {
    data(){
        return{
          nameSearch:'',
             //Degree
             toDate:'',
             fromDate:'',
             showStudd:false,
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
            Students:[],
           AtDates:[],
           AtRecords:[]
           


        }
        
    },
    created(){
        this.fetchStudents();
       
    
    },
     props:['userrole', 'authenticateduser'],
    methods:{
        //fetch all students
        fetchStudents(){
            fetch('/api/studentProfile')
                .then(res => res.json())
                .then(res => {
                    this.Students = res.data;
                })
                .catch(err => console.log(err));
        },
        //getAllAtDatas
        getAllAtDatas(){
          let sendData = {
              fromDate: this.fromDate,
              toDate: this.toDate,
              degree: this.degreeSelected,
              department: this.degreeSelected,
              year: this.yearSelected,
              section: this.sectionSelected,
              semester: this.semesterSelected
            }
          fetch('/api/student/at/month', {
            method: 'post',
            body: JSON.stringify(sendData),
            headers:{
              "content-type": "application/json"
            }
          }).then(res => res.json())
          .then(res => {
            this.AtRecords = res.data;
            
          }).catch(err => console.log(err));
          this.showStudd = true;
          this.getAllAtDates();
        },
        getAllAtDates(){
          let sendData = {
              fromDate: this.fromDate,
              toDate: this.toDate,
              degree: this.degreeSelected,
              department: this.degreeSelected,
              year: this.yearSelected,
              section: this.sectionSelected,
              Semester: this.semesterSelected

            }
          fetch('/api/student/at/dates', {
            method: 'post',
            body: JSON.stringify(sendData),
            headers: {
              "content-type": "application/json",
            }
          }).then(res => res.json())
          .then(res => {
            this.AtDates = res.data;
          }).catch(err => console.log(err));
        },
 getAtDataByStud(AtDate, stud) {
      var status;
      var aData;
      var child;
      aData = this.AtRecords;
      for (var child in aData) {
        if (aData[child].student_id === stud && aData[child].attendancedate === AtDate) {
          status = aData[child].hrspresent;
        }
      }
      if (status) {
        return status;
      } else {
        return 'absent';
      }
    },
    getDegree(department){
        var status;
      var aData;
      var child;
      aData = this.departmentOptions;
      for (var child in aData) {
        if (aData[child].value === department) {
          status = aData[child].degree;
        }
      }
      if (status) {
        return status;
      } else {
        return null;
      }  
}

    },
    computed:{
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


 if(this.userrole > 2){
        this.departmentSelected = this.authenticateduser.department;

        this.degreeSelected = this.getDegree(this.authenticateduser.department);
      }
      let vm = this;
      let filterDepartment = vm.departmentSelected;
      let filterYear = vm.yearSelected;
      let filterSection = vm.sectionSelected;
      let search = vm.nameSearch;

      if (
        filterDepartment === "all" &&
        filterYear === "all" &&
        filterSection === "all"
      ) {
        return vm.Students;
      } else {
        return vm.Students.filter(function(student) {
          return (
            (filterDepartment === "all" ||
              student.department === filterDepartment) &&
            (filterYear === "all" || student.year === filterYear) &&
            (filterSection === "all" || student.section === filterSection) &&
            (student.name.toLowerCase().includes(search.toLowerCase()))
          )
        });
      }
    }
    }

}
</script>


<style scoped>
.student-table
{
    height:600px;
}
</style>
