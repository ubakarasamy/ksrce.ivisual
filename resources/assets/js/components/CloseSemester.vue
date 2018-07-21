<template>
<div class="card">
    <div class="card-header">
        <h3>Academic Year, Semester for Staffs and Students</h3> 
    </div>
    <div class="card-body p-4">
   <div class="row">
       <div class="col-md-6">
                   <h3>For Staffs Academic Year</h3>
<form @submit.prevent="submitAcademic">
<label class="text-dark pt-3">Academic Year Start</label> 
<input type="date" v-model="academic.academicYear" id="date" name="date" class="form-control" style="width:200px;">
<em><strong>Current Year Started</strong> {{gotData.academic_year}}</em>

<br><br>
<h3 class="pt-3 pb-2">Enter Staff Leave Limits</h3>
<div class="form-group" style="width:300px;">
    <label for="cl">CL</label><span class="text-muted pl-3">Casual Leaves + Medical Leaves</span><br>
    <input type="number" v-model="academic.academicCL" class="form-control"  name="cl" id="cl" >
</div>
<div class="form-group" style="width:300px;">
    <label for="od">OD</label><span class="text-muted pl-3">On Duty</span><br>
    <input type="number" v-model="academic.academicOD" class="form-control"  name="od" id="od">
</div>
<div class="form-group" style="width:300px;">
    <label for="permission">Permissions</label><span class="text-muted pl-3">Present + Permission</span><br>
    <input type="number" v-model="academic.academicPermission" class="form-control"  name="permission" id="permission">
</div>
<div class="form-group" style="width:300px;">
    <label for="late">LateRegister</label><span class="text-muted pl-3">Present + Late</span><br>
    <input type="number" v-model="academic.academicLate" class="form-control"  name="late" id="late">
</div>

<p><strong>CPL</strong><span class="text-muted pl-3">Compentation Leave's not Restictable</span></p>
<p><strong>SOD</strong><span class="text-muted pl-3">Special OD's not Restictable</span></p>
<button type="submit" class="btn btn-primary">Submit</button>
</form>
       </div>
       <div class="col-md-6">
            <h3>For Student Academic Semester</h3>
            <div class="form-group" style="width:300px;">
    <br>
<label class="text-dark">Academic Semester Start</label> 
    <input type="date" v-model="academicStudent.semStart" id="datesem" name="datesem" class="form-control" style="width:200px;">
<em><strong>Current Semester Started</strong> {{gotData.academic_year}} {{gotData.academic_semester}}</em>
    <br>
    <button class="btn btn-primary mt-3" v-on:click="updateSem">Update Semester</button>
    
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
            close:'closesem'
            },
            //confirm
            confirm: ''
        }
    },
    created(){
        this.fetchSem();
    },
    methods:{
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
