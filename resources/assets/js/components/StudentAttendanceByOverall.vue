<template>
<div class="card">
    
    <div class="card-body">
       <div class="filter-options">
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
<table class="table">
    <thead>
        <th>REG NO</th>
        <th>Name</th>
        <th>Department</th>
        <th>View Overall Attendance</th>
    </thead>
    <tbody>
        <tr v-for="stud in filteredStudents" v-bind:key="stud.id">
            <td>{{stud.register_no}}</td>
            <td>{{stud.name}}</td>
            <td>{{stud.department}}</td>
            <td><button type="button" class="btn btn-outline-primary" @click="GetOverallByStudId(stud)" data-toggle="modal" data-target=".bd-example-modal-lg">View</button></td>
        </tr>
    </tbody>
</table>



<!-- Large modal -->


<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <table class="table text-center overall-table">
            <thead>
                <th>Day / Hours</th>
                <th>1</th>
                 <th>2</th>
                  <th>3</th>
                   <th>4</th>
                    <th>5</th>
                     <th>6</th>
                      <th>7</th>
            </thead>
            <tbody>
                <tr>
                        <td><strong>Mon</strong> </td>
                        <td><strong>{{timeTables.mon1}}</strong><span class="text-muted d-block">{{timeTableSubs.mon1}}</span></td>
                        <td><strong>{{timeTables.mon2}}</strong><span class="text-muted d-block">{{timeTableSubs.mon2}}</span></td>
                        <td><strong>{{timeTables.mon3}}</strong><span class="text-muted d-block">{{timeTableSubs.mon3}}</span></td>
                        <td><strong>{{timeTables.mon4}}</strong><span class="text-muted d-block">{{timeTableSubs.mon4}}</span></td>
                        <td><strong>{{timeTables.mon5}}</strong><span class="text-muted d-block">{{timeTableSubs.mon5}}</span></td>
                        <td><strong>{{timeTables.mon6}}</strong><span class="text-muted d-block">{{timeTableSubs.mon6}}</span></td>
                        <td><strong>{{timeTables.mon7}}</strong><span class="text-muted d-block">{{timeTableSubs.mon7}}</span></td>
                    </tr>
                    <tr>
                        <td><strong>Thu</strong> </td>
                        <td><strong>{{timeTables.tue1}}</strong><span class="text-muted d-block">{{timeTableSubs.tue1}}</span></td>
                        <td><strong>{{timeTables.tue2}}</strong><span class="text-muted d-block">{{timeTableSubs.tue2}}</span></td>
                        <td><strong>{{timeTables.tue3}}</strong><span class="text-muted d-block">{{timeTableSubs.tue3}}</span></td>
                        <td><strong>{{timeTables.tue4}}</strong><span class="text-muted d-block">{{timeTableSubs.tue4}}</span></td>
                        <td><strong>{{timeTables.tue5}}</strong><span class="text-muted d-block">{{timeTableSubs.tue5}}</span></td>
                        <td><strong>{{timeTables.tue6}}</strong><span class="text-muted d-block">{{timeTableSubs.tue6}}</span></td>
                        <td><strong>{{timeTables.tue7}}</strong><span class="text-muted d-block">{{timeTableSubs.tue7}}</span></td>
                    </tr>
                    <tr>
                        <td><strong>Wed</strong> </td>
                        <td><strong>{{timeTables.wed1}}</strong><span class="text-muted d-block">{{timeTableSubs.wed1}}</span></td>
                        <td><strong>{{timeTables.wed2}}</strong><span class="text-muted d-block">{{timeTableSubs.wed2}}</span></td>
                        <td><strong>{{timeTables.wed3}}</strong><span class="text-muted d-block">{{timeTableSubs.wed3}}</span></td>
                        <td><strong>{{timeTables.wed4}}</strong><span class="text-muted d-block">{{timeTableSubs.wed4}}</span></td>
                        <td><strong>{{timeTables.wed5}}</strong><span class="text-muted d-block">{{timeTableSubs.wed5}}</span></td>
                        <td><strong>{{timeTables.wed6}}</strong><span class="text-muted d-block">{{timeTableSubs.wed6}}</span></td>
                        <td><strong>{{timeTables.wed7}}</strong><span class="text-muted d-block">{{timeTableSubs.wed7}}</span></td>
                    </tr>
                    <tr>
                        <td><strong>Thu</strong> </td>
                        <td><strong>{{timeTables.thu1}}</strong><span class="text-muted d-block">{{timeTableSubs.thu1}}</span></td>
                        <td><strong>{{timeTables.thu2}}</strong><span class="text-muted d-block">{{timeTableSubs.thu2}}</span></td>
                        <td><strong>{{timeTables.thu3}}</strong><span class="text-muted d-block">{{timeTableSubs.thu3}}</span></td>
                        <td><strong>{{timeTables.thu4}}</strong><span class="text-muted d-block">{{timeTableSubs.thu4}}</span></td>
                        <td><strong>{{timeTables.thu5}}</strong><span class="text-muted d-block">{{timeTableSubs.thu5}}</span></td>
                        <td><strong>{{timeTables.thu6}}</strong><span class="text-muted d-block">{{timeTableSubs.thu6}}</span></td>
                        <td><strong>{{timeTables.thu7}}</strong><span class="text-muted d-block">{{timeTableSubs.thu7}}</span></td>
                    </tr>
                    <tr>
                        <td><strong>Fri</strong> </td>
                        <td><strong>{{timeTables.fri1}}</strong><span class="text-muted d-block">{{timeTableSubs.fri1}}</span></td>
                        <td><strong>{{timeTables.fri2}}</strong><span class="text-muted d-block">{{timeTableSubs.fri2}}</span></td>
                        <td><strong>{{timeTables.fri3}}</strong><span class="text-muted d-block">{{timeTableSubs.fri3}}</span></td>
                        <td><strong>{{timeTables.fri4}}</strong><span class="text-muted d-block">{{timeTableSubs.fri4}}</span></td>
                        <td><strong>{{timeTables.fri5}}</strong><span class="text-muted d-block">{{timeTableSubs.fri5}}</span></td>
                        <td><strong>{{timeTables.fri6}}</strong><span class="text-muted d-block">{{timeTableSubs.fri6}}</span></td>
                        <td><strong>{{timeTables.fri7}}</strong><span class="text-muted d-block">{{timeTableSubs.fri7}}</span></td>
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
        return{
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
            Students:[],
            StudOveralls:[],
            timeTables:{
                mon1:'',mon2:'',mon3:'',mon4:'',mon5:'',mon6:'',mon7:'',
                tue1:'',tue2:'',tue3:'',tue4:'',tue5:'',tue6:'',tue7:'',
                wed1:'',wed2:'',wed3:'',wed4:'',wed5:'',wed6:'',wed7:'',
                thu1:'',thu2:'',thu3:'',thu4:'',thu5:'',thu6:'',thu7:'',
                fri1:'',fri2:'',fri3:'',fri4:'',fri5:'',fri6:'',fri7:'',
            },
            timeTableSubs:{
                mon1:'',mon2:'',mon3:'',mon4:'',mon5:'',mon6:'',mon7:'',
                tue1:'',tue2:'',tue3:'',tue4:'',tue5:'',tue6:'',tue7:'',
                wed1:'',wed2:'',wed3:'',wed4:'',wed5:'',wed6:'',wed7:'',
                thu1:'',thu2:'',thu3:'',thu4:'',thu5:'',thu6:'',thu7:'',
                fri1:'',fri2:'',fri3:'',fri4:'',fri5:'',fri6:'',fri7:'',
            },
            allTimetables:[]


        }
    },
    created(){
        this.fetchStudents();
        this.fetchStudOverall();
        this.fetchTimetables();
    
    },
    methods:{
        //get all timetables
        //fetach timetables
        fetchTimetables(){
            fetch('/api/academic/timetable')
            .then(res => res.json())
            .then(res => {
                this.allTimetables = res.data;
            })
            .catch(err => console.log(err));
        }, 

        //fetch all students
        fetchStudents(){
            fetch('/api/studentProfile')
                .then(res => res.json())
                .then(res => {
                    this.Students = res.data;
                })
                .catch(err => console.log(err));
        },
       //fetch all over all table
       fetchStudOverall(){
           fetch('/api/student/overall')
           .then(res => res.json())
           .then(res => {
               this.StudOveralls = res.data;
              
           })
           .catch(err => console.log(err));
       },

       //match
       GetOverallByStudId(stud){
           var status;
           
      var aData;
      var child;
      
      aData = this.StudOveralls;
      for (var child in aData) {
        if (aData[child].student_id === stud.id) {
          status = aData[child];
        }
      }
this.timeTables.mon1 = status.mon1;this.timeTables.mon2 = status.mon2;this.timeTables.mon3 = status.mon3;this.timeTables.mon4 = status.mon4;this.timeTables.mon5 = status.mon5;this.timeTables.mon6 = status.mon6;this.timeTables.mon7 = status.mon7;
this.timeTables.tue1 = status.tue1;this.timeTables.tue2 = status.tue2;this.timeTables.tue3 = status.tue3;this.timeTables.tue4 = status.tue4;this.timeTables.tue5 = status.tue5;this.timeTables.tue6 = status.tue6;this.timeTables.tue7 = status.tue7;
this.timeTables.wed1 = status.wed1;this.timeTables.wed2 = status.wed2;this.timeTables.wed3 = status.wed3;this.timeTables.wed4 = status.wed4;this.timeTables.wed5 = status.wed5;this.timeTables.wed6 = status.wed6;this.timeTables.wed7 = status.wed7;
this.timeTables.thu1 = status.thu1;this.timeTables.thu2 = status.thu2;this.timeTables.thu3 = status.thu3;this.timeTables.thu4 = status.thu4;this.timeTables.thu5 = status.thu5;this.timeTables.thu6 = status.thu6;this.timeTables.thu7 = status.thu7;
this.timeTables.fri1 = status.fri1;this.timeTables.fri2 = status.fri2;this.timeTables.fri3 = status.fri3;this.timeTables.fri4 = status.fri4;this.timeTables.fri5 = status.fri5;this.timeTables.fri6 = status.fri6;this.timeTables.fri7 = status.fri7;

//console.log(status2);
      this.getSubsByStudid(stud);
       },
getSubsByStudid(stud){
    var aData2;
var child2;
var status2;
aData2 = this.allTimetables;
//console.log(aData2);
      for (var child2 in aData2) {
        if (aData2[child2].year === stud.year && aData2[child2].department === stud.department && aData2[child2].section === stud.section && aData2[child2].semester === stud.semester) {
          status2 = aData2[child2];
        }
      }
this.timeTableSubs.mon1 = status2.mon1;this.timeTableSubs.mon2 = status2.mon2;this.timeTableSubs.mon3 = status2.mon3;this.timeTableSubs.mon4 = status2.mon4;this.timeTableSubs.mon5 = status2.mon5;this.timeTableSubs.mon6 = status2.mon6;this.timeTableSubs.mon7 = status2.mon7;
this.timeTableSubs.tue1 = status2.tue1;this.timeTableSubs.tue2 = status2.tue2;this.timeTableSubs.tue3 = status2.tue3;this.timeTableSubs.tue4 = status2.tue4;this.timeTableSubs.tue5 = status2.tue5;this.timeTableSubs.tue6 = status2.tue6;this.timeTableSubs.tue7 = status2.tue7;
this.timeTableSubs.wed1 = status2.wed1;this.timeTableSubs.wed2 = status2.wed2;this.timeTableSubs.wed3 = status2.wed3;this.timeTableSubs.wed4 = status2.wed4;this.timeTableSubs.wed5 = status2.wed5;this.timeTableSubs.wed6 = status2.wed6;this.timeTableSubs.wed7 = status2.wed7;
this.timeTableSubs.thu1 = status2.thu1;this.timeTableSubs.thu2 = status2.thu2;this.timeTableSubs.thu3 = status2.thu3;this.timeTableSubs.thu4 = status2.thu4;this.timeTableSubs.thu5 = status2.thu5;this.timeTableSubs.thu6 = status2.thu6;this.timeTableSubs.thu7 = status2.thu7;
this.timeTableSubs.fri1 = status2.fri1;this.timeTableSubs.fri2 = status2.fri2;this.timeTableSubs.fri3 = status2.fri3;this.timeTableSubs.fri4 = status2.fri4;this.timeTableSubs.fri5 = status2.fri5;this.timeTableSubs.fri6 = status2.fri6;this.timeTableSubs.fri7 = status2.fri7;


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
      let vm = this;
      let filterDepartment = vm.departmentSelected;
      let filterYear = vm.yearSelected;
      let filterSection = vm.sectionSelected;

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
            (filterSection === "all" || student.section === filterSection)
          );
        });
      }
    }
    }

}
</script>


<style scoped>
.overall-table td
{
    width: 100px;
}
</style>
