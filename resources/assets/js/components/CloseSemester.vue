<template>
<div class="card">
    <div class="card-header">
        <h3>Academic Year, Semester for Staffs and Students</h3> 
    </div>
    <div class="card-body p-4">
   <div class="bgf">
    <div class="btn-grpyearsem mb-5">
    <button class="btn btn-outline-primary" @click="modYearCredentials()">Update Credentials for Year</button>

<button class="btn btn-outline-primary" @click="modSemesterCredentials()">Update Credentials for Semester</button>

    </div>

   <div class="StaffDatass" v-if="YearDatass">
                   <h3>For Staffs Academic Year</h3>
<form @submit.prevent="submitAcademic">
<label class="text-dark pt-3">Academic Year Start</label> 
<input :required="true" type="date" v-model="academic.academicYear" id="date" name="date" class="form-control" style="width:200px;">
<em><strong>Current Year Started</strong> {{gotData.academic_year}}</em>

<br><br>
<h3 class="pt-3 pb-2">Enter Staff Leave Limits</h3>
<div class="form-group" style="width:300px;">
    <label for="cl">CL</label>
    <input :required="true" type="number" v-model="academic.academicCL" class="form-control" placeholder="Casual Leave Limit Eg:10"  name="cl" id="cl" >
</div>
<div class="form-group" style="width:300px;">
    <label for="od">OD</label>
    <input :required="true" type="number" v-model="academic.academicOD" placeholder="OnDuty Count Eg:10" class="form-control"  name="od" id="od">
</div>
<div class="form-group" style="width:300px;">
    <label for="permission">Permissions</label>
    <input :required="true" type="number" placeholder="Permissions limit Eg:2" v-model="academic.academicPermission" class="form-control"  name="permission" id="permission">
</div>
<div class="form-group" style="width:300px;">
    <label for="late">LateRegister</label>
    <input :required="true" type="number" placeholder="Late Register limit Eg:2" v-model="academic.academicLate" class="form-control"  name="late" id="late">
</div>

<p><strong>CPL</strong><span class="text-muted pl-3">Compentation Leave's not Restictable</span></p>
<p><strong>SOD</strong><span class="text-muted pl-3">Special OD's not Restictable</span></p>
<button type="submit" class="btn btn-primary">Submit</button>
</form>
       </div>

       <div class="StudDatas" v-if="SemDatass">
<h3>For Student Academic Semester</h3>
<form @submit="updateSem">
<div class="form-group" style="width:300px;">
    <br>
<label class="text-dark">Academic Semester Start</label> 
    <input :required="true" type="date" v-model="academicStudent.semStart" id="datesem" name="datesem" class="form-control" style="width:200px;">
<em><strong>Current Semester Started</strong> {{gotData.academic_year}} {{gotData.academic_semester}}</em>
    <br>
<br>
<label class="text-dark">Academic Semester End</label> 
    <input :required="true" type="date" v-model="academicStudent.semEnd" id="datesemend" name="datesemend" class="form-control" style="width:200px;">
    <button class="btn btn-primary mt-3" type="submit">Update Semester</button>
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
        return {
            //staff academic
            gotData:[],
            academic:{
                academicYear:'',
            academicCL:'',
            academicOD:'',
            academicPermission:'',
            academicLate:''
            },
            Semester:'',
            //test
            academicStudent:{
            semStart: '',
            semEnd: '',
            close:'closesem'
            },
            //confirm
            confirm: '',
            YearDatass:false,
            SemDatass:false
        }
        
    },
    created(){
        this.fetchSem();
    },
    methods:{
        modYearCredentials(){
            this.YearDatass = true;
            this.SemDatass = false;

        },
        modSemesterCredentials(){
            this.SemDatass = true;
            this.YearDatass = false;
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
        //submitAcademic
        submitAcademic(){
             fetch('api/academicyear', {
          method: 'post',
          body: JSON.stringify(this.academic),
          headers: {
            'content-type': 'application/json'
          }
        })
          .then(res => res.json())
          .then(data => {
              this.student.test = ""
          })
          .catch(err => console.log(err));
        },
        //Update sem
        updateSem(){
            this.confirm = confirm('Are You Sure ?');
            if(this.confirm === true){
             fetch('api/semester', {
          method: 'post',
          body: JSON.stringify(this.academicStudent),
          headers: {
            'content-type': 'application/json'
          }
        })
          .then(res => res.json())
          .then(data => {
              this.student.test = ""
          })
          .catch(err => console.log(err));
          alert('The Semester Status Updated successfully');
        }
        this.fetchSem();
        }
       
    }
}
</script>
