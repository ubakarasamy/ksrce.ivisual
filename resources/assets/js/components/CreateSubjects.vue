<template>
    <div class="card">
        <div class="card-header">
             <h1>Create Subjects</h1>   
             <div class="row">

</div>
        </div>
        <div class="card-body">

<div class="row">
<div class="col-sm-12">
<form @submit.prevent="createSubjects">

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
<div class="form-gtp col-md-6">


    <p class="text-info">
        Fill having subjects, Leave other fields blank 
    </p>
<div class="form-group">
    <label for="subject1">Subject 1</label>
    <input v-model="subjects.sub1" type="text" class="form-control" id="subject1" aria-describedby="emailHelp" >
</div>
<div class="form-group">
    <label for="subject2">Subject 2</label>
    <input v-model="subjects.sub2" type="text" class="form-control" id="subject2" aria-describedby="emailHelp" >
</div>
<div class="form-group">
    <label for="subject3">Subject 3</label>
    <input v-model="subjects.sub3" type="text" class="form-control" id="subject3" aria-describedby="emailHelp" >
</div>
<div class="form-group">
    <label for="subject4">Subject 4</label>
    <input v-model="subjects.sub4" type="text" class="form-control" id="subject4" aria-describedby="emailHelp" >
</div>
<div class="form-group">
    <label for="subject5">Subject 5</label>
    <input v-model="subjects.sub5" type="text" class="form-control" id="subject5" aria-describedby="emailHelp" >
</div>
<div class="form-group">
    <label for="subject6">Subject 6</label>
    <input v-model="subjects.sub6" type="text" class="form-control" id="subject6" aria-describedby="emailHelp" >
</div>
<div class="form-group">
    <label for="subject7">Subject 7</label>
    <input v-model="subjects.sub7" type="text" class="form-control" id="subject7" aria-describedby="emailHelp" >
</div>
<div class="form-group">
    <label for="subject8">Subject 8</label>
    <input v-model="subjects.sub8" type="text" class="form-control" id="subject8" aria-describedby="emailHelp" >
</div>
<div class="form-group">
    <label for="subject9">Subject 9</label>
    <input v-model="subjects.sub9" type="text" class="form-control" id="subject9" aria-describedby="emailHelp" >
</div>
<div class="form-group">
    <label for="subject10">Subject 10</label>
    <input v-model="subjects.sub10" type="text" class="form-control" id="subject10" aria-describedby="emailHelp" >
</div>
<div class="form-group">
    <label for="subject11">Subject 11</label>
    <input v-model="subjects.sub11" type="text" class="form-control" id="subject11" aria-describedby="emailHelp" >
</div>
<div class="form-group">
    <label for="subject12">Subject 12</label>
    <input v-model="subjects.sub12" type="text" class="form-control" id="subject12" aria-describedby="emailHelp" >
</div>
<button type="submit" class="btn btn-primary">
    submit
</button>
</div>
</form>
</div>
</div>            
        </div>
    </div>
</template>

<script>
export default {
    data(){
        return{
            subjects:{
                sub1:'',
                sub2:'',
                sub3:'',
                sub4:'',
                sub5:'',
                sub6:'',
                sub7:'',
                sub8:'',
                sub9:'',
                sub10:'',
                sub11:'',
                sub12:''
            },
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
]
        }
    },
    methods:{
        
        createSubjects(){
            const passData ={
                degree: this.degreeSelected,
                year: this.yearSelected,
                semester: this.semesterSelected,
                section: this.sectionSelected,
                department: this.departmentSelected,
                subjects:this.subjects,

            }
            fetch('/api/createsubjects', {
                method: "post",
                body: JSON.stringify(passData),
                headers:{
                    "content-type": "application/json"
                }
            })
            .then(res => res.json())
            .then(res => {
                //success
            })
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
      }
    }
}
</script>

