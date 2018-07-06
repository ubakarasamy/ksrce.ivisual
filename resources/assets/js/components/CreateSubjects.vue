<template>
    <div class="card">
        <div class="card-header">
             <h1>Create Subjects</h1>   
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
        <div class="card-body">

<div class="row">
<div class="col-sm-12">
<form @submit.prevent="createSubjects">
    <p class="text-info">
        Fill having subjects, Leave other fields blank with Acronyms eg: EM-1 Engineering Mathematics - I 
    </p>

<table class="table">
    <thead>
        <th>SL NO</th>
        <th>subject code</th>
        <th>subject acronym</th>
        <th>subject title</th>
        <th>staff name</th>
        <th>staff Id</th>
    </thead>
    <tbody>
        <tr>
            <td>1</td>
            <td>
                 <input v-model="subjectcodes.sub1code" type="text" class="form-control" id="subject1" aria-describedby="emailHelp" >
            </td>
            <td>
                 <input v-model="subjectacronyms.sub1acronym" type="text" class="form-control" id="subject1" aria-describedby="emailHelp" >
            </td>
            <td>
                 <input v-model="subjecttitles.sub1title" type="text" class="form-control" id="subject1" aria-describedby="emailHelp" >
            </td>
            <td>
                 <input v-model="subjectstaffs.sub1staff" type="text" class="form-control" id="subject1" aria-describedby="emailHelp" >
            </td>
            <td>
                 <input v-model="subjectstaffids.sub1staffid" type="text" class="form-control" id="subject1" aria-describedby="emailHelp" >
            </td>
        </tr>
        <tr>
            <td>2</td>
            <td>
                 <input v-model="subjectcodes.sub2code" type="text" class="form-control" id="subject1" aria-describedby="emailHelp" >
            </td>
            <td>
                 <input v-model="subjectacronyms.sub2acronym" type="text" class="form-control" id="subject1" aria-describedby="emailHelp" >
            </td>
            <td>
                 <input v-model="subjecttitles.sub2title" type="text" class="form-control" id="subject1" aria-describedby="emailHelp" >
            </td>
            <td>
                 <input v-model="subjectstaffs.sub2staff" type="text" class="form-control" id="subject1" aria-describedby="emailHelp" >
            </td>
            <td>
                 <input v-model="subjectstaffids.sub2staffid" type="text" class="form-control" id="subject1" aria-describedby="emailHelp" >
            </td>
        </tr>
        <tr>
            <td>3</td>
            <td>
                 <input v-model="subjectcodes.sub3code" type="text" class="form-control" id="subject1" aria-describedby="emailHelp" >
            </td>
            <td>
                 <input v-model="subjectacronyms.sub3acronym" type="text" class="form-control" id="subject1" aria-describedby="emailHelp" >
            </td>
            <td>
                 <input v-model="subjecttitles.sub3title" type="text" class="form-control" id="subject1" aria-describedby="emailHelp" >
            </td>
            <td>
                 <input v-model="subjectstaffs.sub3staff" type="text" class="form-control" id="subject1" aria-describedby="emailHelp" >
            </td>
            <td>
                 <input v-model="subjectstaffids.sub3staffid" type="text" class="form-control" id="subject1" aria-describedby="emailHelp" >
            </td>
        </tr>
        <tr>
            <td>4</td>
            <td>
                 <input v-model="subjectcodes.sub4code" type="text" class="form-control" id="subject1" aria-describedby="emailHelp" >
            </td>
            <td>
                 <input v-model="subjectacronyms.sub4acronym" type="text" class="form-control" id="subject1" aria-describedby="emailHelp" >
            </td>
            <td>
                 <input v-model="subjecttitles.sub4title" type="text" class="form-control" id="subject1" aria-describedby="emailHelp" >
            </td>
            <td>
                 <input v-model="subjectstaffs.sub4staff" type="text" class="form-control" id="subject1" aria-describedby="emailHelp" >
            </td>
            <td>
                 <input v-model="subjectstaffids.sub4staffid" type="text" class="form-control" id="subject1" aria-describedby="emailHelp" >
            </td>
        </tr>
        <tr>
            <td>5</td>
            <td>
                 <input v-model="subjectcodes.sub5code" type="text" class="form-control" id="subject1" aria-describedby="emailHelp" >
            </td>
            <td>
                 <input v-model="subjectacronyms.sub5acronym" type="text" class="form-control" id="subject1" aria-describedby="emailHelp" >
            </td>
            <td>
                 <input v-model="subjecttitles.sub5title" type="text" class="form-control" id="subject1" aria-describedby="emailHelp" >
            </td>
            <td>
                 <input v-model="subjectstaffs.sub5staff" type="text" class="form-control" id="subject1" aria-describedby="emailHelp" >
            </td>
            <td>
                 <input v-model="subjectstaffids.sub5staffid" type="text" class="form-control" id="subject1" aria-describedby="emailHelp" >
            </td>
        </tr>
        <tr>
            <td>6</td>
            <td>
                 <input v-model="subjectcodes.sub6code" type="text" class="form-control" id="subject1" aria-describedby="emailHelp" >
            </td>
            <td>
                 <input v-model="subjectacronyms.sub6acronym" type="text" class="form-control" id="subject1" aria-describedby="emailHelp" >
            </td>
            <td>
                 <input v-model="subjecttitles.sub6title" type="text" class="form-control" id="subject1" aria-describedby="emailHelp" >
            </td>
            <td>
                 <input v-model="subjectstaffs.sub6staff" type="text" class="form-control" id="subject1" aria-describedby="emailHelp" >
            </td>
            <td>
                 <input v-model="subjectstaffids.sub6staffid" type="text" class="form-control" id="subject1" aria-describedby="emailHelp" >
            </td>
        </tr>
        <tr>
            <td>7</td>
            <td>
                 <input v-model="subjectcodes.sub7code" type="text" class="form-control" id="subject1" aria-describedby="emailHelp" >
            </td>
            <td>
                 <input v-model="subjectacronyms.sub7acronym" type="text" class="form-control" id="subject1" aria-describedby="emailHelp" >
            </td>
            <td>
                 <input v-model="subjecttitles.sub7title" type="text" class="form-control" id="subject1" aria-describedby="emailHelp" >
            </td>
            <td>
                 <input v-model="subjectstaffs.sub7staff" type="text" class="form-control" id="subject1" aria-describedby="emailHelp" >
            </td>
            <td>
                 <input v-model="subjectstaffids.sub7staffid" type="text" class="form-control" id="subject1" aria-describedby="emailHelp" >
            </td>
        </tr>
        <tr>
            <td>8</td>
            <td>
                 <input v-model="subjectcodes.sub8code" type="text" class="form-control" id="subject1" aria-describedby="emailHelp" >
            </td>
            <td>
                 <input v-model="subjectacronyms.sub8acronym" type="text" class="form-control" id="subject1" aria-describedby="emailHelp" >
            </td>
            <td>
                 <input v-model="subjecttitles.sub8title" type="text" class="form-control" id="subject1" aria-describedby="emailHelp" >
            </td>
            <td>
                 <input v-model="subjectstaffs.sub8staff" type="text" class="form-control" id="subject1" aria-describedby="emailHelp" >
            </td>
            <td>
                 <input v-model="subjectstaffids.sub8staffid" type="text" class="form-control" id="subject1" aria-describedby="emailHelp" >
            </td>
        </tr>
        <tr>
            <td>9</td>
            <td>
                 <input v-model="subjectcodes.sub9code" type="text" class="form-control" id="subject1" aria-describedby="emailHelp" >
            </td>
            <td>
                 <input v-model="subjectacronyms.sub9acronym" type="text" class="form-control" id="subject1" aria-describedby="emailHelp" >
            </td>
            <td>
                 <input v-model="subjecttitles.sub9title" type="text" class="form-control" id="subject1" aria-describedby="emailHelp" >
            </td>
            <td>
                 <input v-model="subjectstaffs.sub9staff" type="text" class="form-control" id="subject1" aria-describedby="emailHelp" >
            </td>
            <td>
                 <input v-model="subjectstaffids.sub9staffid" type="text" class="form-control" id="subject1" aria-describedby="emailHelp" >
            </td>
        </tr>
        <tr>
            <td>10</td>
            <td>
                 <input v-model="subjectcodes.sub10code" type="text" class="form-control" id="subject1" aria-describedby="emailHelp" >
            </td>
            <td>
                 <input v-model="subjectacronyms.sub10acronym" type="text" class="form-control" id="subject1" aria-describedby="emailHelp" >
            </td>
            <td>
                 <input v-model="subjecttitles.sub10title" type="text" class="form-control" id="subject1" aria-describedby="emailHelp" >
            </td>
            <td>
                 <input v-model="subjectstaffs.sub10staff" type="text" class="form-control" id="subject1" aria-describedby="emailHelp" >
            </td>
            <td>
                 <input v-model="subjectstaffids.sub10staffid" type="text" class="form-control" id="subject1" aria-describedby="emailHelp" >
            </td>
        </tr>
        <tr>
            <td>11</td>
            <td>
                 <input v-model="subjectcodes.sub11code" type="text" class="form-control" id="subject1" aria-describedby="emailHelp" >
            </td>
            <td>
                 <input v-model="subjectacronyms.sub11acronym" type="text" class="form-control" id="subject1" aria-describedby="emailHelp" >
            </td>
            <td>
                 <input v-model="subjecttitles.sub11title" type="text" class="form-control" id="subject1" aria-describedby="emailHelp" >
            </td>
            <td>
                 <input v-model="subjectstaffs.sub11staff" type="text" class="form-control" id="subject1" aria-describedby="emailHelp" >
            </td>
            <td>
                 <input v-model="subjectstaffids.sub11staffid" type="text" class="form-control" id="subject1" aria-describedby="emailHelp" >
            </td>
        </tr>
        <tr>
            <td>12</td>
            <td>
                 <input v-model="subjectcodes.sub12code" type="text" class="form-control" id="subject1" aria-describedby="emailHelp" >
            </td>
            <td>
                 <input v-model="subjectacronyms.sub12acronym" type="text" class="form-control" id="subject1" aria-describedby="emailHelp" >
            </td>
            <td>
                 <input v-model="subjecttitles.sub12title" type="text" class="form-control" id="subject1" aria-describedby="emailHelp" >
            </td>
            <td>
                 <input v-model="subjectstaffs.sub12staff" type="text" class="form-control" id="subject1" aria-describedby="emailHelp" >
            </td>
            <td>
                 <input v-model="subjectstaffids.sub12staffid" type="text" class="form-control" id="subject1" aria-describedby="emailHelp" >
            </td>
        </tr>

    </tbody>
</table>
<button type="submit" class="btn btn-primary">
    submit
</button>
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
            subjectcodes:{
                sub1code:'',
                sub2code:'',
                sub3code:'',
                sub4code:'',
                sub5code:'',
                sub6code:'',
                sub7code:'',
                sub8code:'',
                sub9code:'',
                sub10code:'',
                sub11code:'',
                sub12code:''
            },
            subjectacronyms:{
                sub1acronym:'',
                sub2acronym:'',
                sub3acronym:'',
                sub41acronym:'',
                sub5acronym:'',
                sub6acronym:'',
                sub7acronym:'',
                sub8acronym:'',
                sub9acronym:'',
                sub10acronym:'',
                sub11acronym:'',
                sub12acronym:''
            },
            subjecttitles:{
                sub1title:'',
                sub2title:'',
                sub3title:'',
                sub4title:'',
                sub5title:'',
                sub6title:'',
                sub7title:'',
                sub8title:'',
                sub9title:'',
                sub10title:'',
                sub11title:'',
                sub12title:''
            },
            subjectstaffs:{
                sub1staff:'',
                sub2staff:'',
                sub3staff:'',
                sub4staff:'',
                sub5staff:'',
                sub6staff:'',
                sub7staff:'',
                sub8staff:'',
                sub9staff:'',
                sub10staff:'',
                sub11staff:'',
                sub12staff:''
            },
            subjectstaffids:{
                sub1staffid:'',
                sub2staffid:'',
                sub3staffid:'',
                sub4staffid:'',
                sub5staffid:'',
                sub6staffid:'',
                sub7staffid:'',
                sub8staffid:'',
                sub9staffid:'',
                sub10staffid:'',
                sub12staffid:''
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
                subjectcodes:this.subjectcodes,
                subjectacronyms:this.subjectacronyms,
                subjecttitles:this.subjecttitles,
                subjectstaffs:this.subjectstaffs,
                subjectstaffids:this.subjectstaffids

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
                console.log(res.data);
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

