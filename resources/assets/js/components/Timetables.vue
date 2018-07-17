<template>
    <div class="card">
        <div class="card-header">
            <h1>Time Tables</h1>
        </div>
        <div class="card-body">

<h3 class="mb-2">All Time Tables</h3>
<ul class="list-group view-table-list mt-3">
    <li class="list-group-item" v-for="allTimetable in allTimetables" v-bind:key="allTimetable.id">{{allTimetable.degree}} {{allTimetable.department}} {{allTimetable.year}}year {{allTimetable.semester}}Sem {{allTimetable.section}}
<!-- Button trigger modal -->
<button type="button" class="btn btn-outline-primary" data-toggle="modal" @click="viewTable(allTimetable)" data-target="#exampleModalCenter">
  view
</button>
    </li>
</ul>

<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalCenterTitle">Time table</h5>
        <button type="button" @click="resetFrom()" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <table class="table view-table">
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
                        <td>{{timeTables.mon1}}</td>
                        <td>{{timeTables.mon2}}</td>
                        <td>{{timeTables.mon3}}</td>
                        <td>{{timeTables.mon4}}</td>
                        <td>{{timeTables.mon5}}</td>
                        <td>{{timeTables.mon6}}</td>
                        <td>{{timeTables.mon7}}</td>
                    </tr>
                    <tr>
                        <td><strong>Thu</strong> </td>
                        <td>{{timeTables.tue1}}</td>
                        <td>{{timeTables.tue2}}</td>
                        <td>{{timeTables.tue3}}</td>
                        <td>{{timeTables.tue4}}</td>
                        <td>{{timeTables.tue5}}</td>
                        <td>{{timeTables.tue6}}</td>
                        <td>{{timeTables.tue7}}</td>
                    </tr>
                    <tr>
                        <td><strong>Wed</strong> </td>
                        <td>{{timeTables.wed1}}</td>
                        <td>{{timeTables.wed2}}</td>
                        <td>{{timeTables.wed3}}</td>
                        <td>{{timeTables.wed4}}</td>
                        <td>{{timeTables.wed5}}</td>
                        <td>{{timeTables.wed6}}</td>
                        <td>{{timeTables.wed7}}</td>
                    </tr>
                    <tr>
                        <td><strong>Thu</strong> </td>
                        <td>{{timeTables.thu1}}</td>
                        <td>{{timeTables.thu2}}</td>
                        <td>{{timeTables.thu3}}</td>
                        <td>{{timeTables.thu4}}</td>
                        <td>{{timeTables.thu5}}</td>
                        <td>{{timeTables.thu6}}</td>
                        <td>{{timeTables.thu7}}</td>
                    </tr>
                    <tr>
                        <td><strong>Fri</strong> </td>
                        <td>{{timeTables.fri1}}</td>
                        <td>{{timeTables.fri2}}</td>
                        <td>{{timeTables.fri3}}</td>
                        <td>{{timeTables.fri4}}</td>
                        <td>{{timeTables.fri5}}</td>
                        <td>{{timeTables.fri6}}</td>
                        <td>{{timeTables.fri7}}</td>
                    </tr>
            </tbody>
        </table>
        
      </div>
      
    </div>
  </div>
</div>


<div class="creat-times mt-4">
<h3>Create or Edit Time Table</h3>
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
 </div>

<p class="text-info">Based on this time table Semester Overall Attendance is calculated. <br> So please double check before you submit</p>
<form @submit.prevent="createTimeTable()">
            <table class="table table-responsive input-table" style="text-transform:uppercase;">
                <thead>
                    <th><strong>Day / Hours</strong></th>
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
                        <td><input v-model="timeTables.mon1" type="text" name="mon1" id="mon1" placeholder="Mon 1"></td>
                        <td><input v-model="timeTables.mon2" type="text" name="mon2" id="mon2" placeholder="Mon 2"></td>
                        <td><input v-model="timeTables.mon3" type="text" name="mon3" id="mon3" placeholder="Mon 3"></td>
                        <td><input v-model="timeTables.mon4" type="text" name="mon4" id="mon4" placeholder="Mon 4"></td>
                        <td><input v-model="timeTables.mon5" type="text" name="mon5" id="mon5" placeholder="Mon 5"></td>
                        <td><input v-model="timeTables.mon6" type="text" name="mon6" id="mon6" placeholder="Mon 6"></td>
                        <td><input v-model="timeTables.mon7" type="text" name="mon7" id="mon7" placeholder="Mon 7"></td>
                    </tr>
                    <tr>
                        <td><strong>Thu</strong> </td>
                        <td><input v-model="timeTables.tue1" type="text" name="tue1" id="tue1" placeholder="Thu 1"></td>
                        <td><input v-model="timeTables.tue2" type="text" name="tue2" id="tue2" placeholder="Thu 2"></td>
                        <td><input v-model="timeTables.tue3" type="text" name="tue3" id="tue3" placeholder="Thu 3"></td>
                        <td><input v-model="timeTables.tue4" type="text" name="tue4" id="tue4" placeholder="Thu 4"></td>
                        <td><input v-model="timeTables.tue5" type="text" name="tue5" id="tue5" placeholder="Thu 5"></td>
                        <td><input v-model="timeTables.tue6" type="text" name="tue6" id="tue6" placeholder="Thu 6"></td>
                        <td><input v-model="timeTables.tue7" type="text" name="tue7" id="tue7" placeholder="Thu 7"></td>
                    </tr>
                    <tr>
                        <td><strong>Wed</strong> </td>
                        <td><input v-model="timeTables.wed1" type="text" name="wed1" id="wed1" placeholder="Wed 1"></td>
                        <td><input v-model="timeTables.wed2" type="text" name="wed2" id="wed2" placeholder="Wed 2"></td>
                        <td><input v-model="timeTables.wed3" type="text" name="wed3" id="wed3" placeholder="Wed 3"></td>
                        <td><input v-model="timeTables.wed4" type="text" name="wed4" id="wed4" placeholder="Wed 4"></td>
                        <td><input v-model="timeTables.wed5" type="text" name="wed5" id="wed5" placeholder="Wed 5"></td>
                        <td><input v-model="timeTables.wed6" type="text" name="wed6" id="wed6" placeholder="Wed 6"></td>
                        <td><input v-model="timeTables.wed7" type="text" name="wed7" id="wed7" placeholder="Wed 7"></td>
                    </tr>
                    <tr>
                        <td><strong>Thu</strong> </td>
                        <td><input v-model="timeTables.thu1" type="text" name="thu1" id="thu1" placeholder="Thu 1"></td>
                        <td><input v-model="timeTables.thu2" type="text" name="thu2" id="thu2" placeholder="Thu 2"></td>
                        <td><input v-model="timeTables.thu3" type="text" name="thu3" id="thu3" placeholder="Thu 3"></td>
                        <td><input v-model="timeTables.thu4" type="text" name="thu4" id="thu4" placeholder="Thu 4"></td>
                        <td><input v-model="timeTables.thu5" type="text" name="thu5" id="thu5" placeholder="Thu 5"></td>
                        <td><input v-model="timeTables.thu6" type="text" name="thu6" id="thu6" placeholder="Thu 6"></td>
                        <td><input v-model="timeTables.thu7" type="text" name="thu7" id="thu7" placeholder="Thu 7"></td>
                    </tr>
                    <tr>
                        <td><strong>Fri</strong> </td>
                        <td><input v-model="timeTables.fri1" type="text" name="fri1" id="fri1" placeholder="Fri 1"></td>
                        <td><input v-model="timeTables.fri2" type="text" name="fri2" id="fri2" placeholder="Fri 2"></td>
                        <td><input v-model="timeTables.fri3" type="text" name="fri3" id="fri3" placeholder="Fri 3"></td>
                        <td><input v-model="timeTables.fri4" type="text" name="fri4" id="fri4" placeholder="Fri 4"></td>
                        <td><input v-model="timeTables.fri5" type="text" name="fri5" id="fri5" placeholder="Fri 5"></td>
                        <td><input v-model="timeTables.fri6" type="text" name="fri6" id="fri6" placeholder="Fri 6"></td>
                        <td><input v-model="timeTables.fri7" type="text" name="fri7" id="fri7" placeholder="Fri 7"></td>
                    </tr>
                </tbody>
            </table>
            <button type="submit" class="btn btn-primary">Submit</button>
</form>
        </div>
    </div>
</template>

<script>
export default {
    data(){
        return{
allTimetables:[],
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
timeTables:{
mon1:'',mon2:'',mon3:'',mon4:'',mon5:'',mon6:'',mon7:'',
tue1:'',tue2:'',tue3:'',tue4:'',tue5:'',tue6:'',tue7:'',
wed1:'',wed2:'',wed3:'',wed4:'',wed5:'',wed6:'',wed7:'',
thu1:'',thu2:'',thu3:'',thu4:'',thu5:'',thu6:'',thu7:'',
fri1:'',fri2:'',fri3:'',fri4:'',fri5:'',fri6:'',fri7:''
}

}
    },
    created(){
        this.fetchTimetables();
    },
    methods:{
        //view timetable
        viewTable(tables){
            this.timeTables.mon1 = tables.mon1,this.timeTables.mon2 = tables.mon2,this.timeTables.mon3 = tables.mon3,this.timeTables.mon4 = tables.mon4,this.timeTables.mon5 = tables.mon5,this.timeTables.mon6 = tables.mon6,this.timeTables.mon7 = tables.mon7,
            this.timeTables.tue1 = tables.tue1,this.timeTables.tue2 = tables.tue2,this.timeTables.tue3 = tables.tue3,this.timeTables.tue4 = tables.tue4,this.timeTables.tue5 = tables.tue5,this.timeTables.tue6 = tables.tue6,this.timeTables.tue7 = tables.tue7,
            this.timeTables.wed1 = tables.wed1,this.timeTables.wed2 = tables.wed2,this.timeTables.wed3 = tables.wed3,this.timeTables.wed4 = tables.wed4,this.timeTables.wed5 = tables.wed5,this.timeTables.wed6 = tables.wed6,this.timeTables.wed7 = tables.wed7,
            this.timeTables.thu1 = tables.thu1,this.timeTables.thu2 = tables.thu2,this.timeTables.thu3 = tables.thu3,this.timeTables.thu4 = tables.thu4,this.timeTables.thu5 = tables.thu5,this.timeTables.thu6 = tables.thu6,this.timeTables.thu7 = tables.thu7,
            this.timeTables.fri1 = tables.fri1,this.timeTables.fri2 = tables.fri2,this.timeTables.fri3 = tables.fri3,this.timeTables.fri4 = tables.fri4,this.timeTables.fri5 = tables.fri5,this.timeTables.fri6 = tables.fri6,this.timeTables.fri7 = tables.fri7

        },
        //create or edit timetable
        createTimeTable(){
            const sendData = {
                degree: this.degreeSelected,
                year: this.yearSelected,
                semester: this.semesterSelected,
                section: this.sectionSelected,
                department: this.departmentSelected,
                timetable: this.timeTables
            }
            fetch('/api/academic/timetable', {
                method: "post",
                body: JSON.stringify(sendData),
                headers:{
                    "content-type": "application/json"
                }
            })
            .then(res => res.json())
            .then(res => {
                this.degreeSelected = '',
                this.yearSelected = '',
                this.semesterSelected = '',
                this.sectionSelected = '',
                this.departmentSelected = '',
                this.timeTables = ''
            })
            .catch(err => console.log(err));
            this.fetchTimetables();
        },
        //fetach timetables
        fetchTimetables(){
            fetch('/api/academic/timetable')
            .then(res => res.json())
            .then(res => {
                this.allTimetables = res.data;
            })
            .catch(err => console.log(err));
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
      resetFrom(){
          this.timeTables.mon1 = '',this.timeTables.mon2 = '',this.timeTables.mon3 = '',this.timeTables.mon4 = '',this.timeTables.mon5 = '',this.timeTables.mon6 = '',this.timeTables.mon7 = '',
            this.timeTables.tue1 = '',this.timeTables.tue2 = '',this.timeTables.tue3 = '',this.timeTables.tue4 = '',this.timeTables.tue5 = '',this.timeTables.tue6 = '',this.timeTables.tue7 = '',
            this.timeTables.wed1 = '',this.timeTables.wed2 = '',this.timeTables.wed3 = '',this.timeTables.wed4 = '',this.timeTables.wed5 = '',this.timeTables.wed6 = '',this.timeTables.wed7 = '',
            this.timeTables.thu1 = '',this.timeTables.thu2 = '',this.timeTables.thu3 = '',this.timeTables.thu4 = '',this.timeTables.thu5 = '',this.timeTables.thu6 = '',this.timeTables.thu7 = '',
            this.timeTables.fri1 = '',this.timeTables.fri2 = '',this.timeTables.fri3 = '',this.timeTables.fri4 = '',this.timeTables.fri5 = '',this.timeTables.fri6 = '',this.timeTables.fri7 = ''
      }
    }
}
</script>

<style scoped>
    .input-table input
    {   
        text-transform: uppercase;
        width: 100%;
    }
    .view-table td
    {
        text-transform: uppercase;
    }
    .view-table-list li
    {
        text-transform: uppercase;
    }
</style>
