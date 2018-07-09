<template>
<div class="card">
    <div class="card-header">

    </div>
    <div class="card-body">
       
<table class="table">
    <thead>
        <th>REG NO</th>
        <th>Name</th>
        <th>Department</th>
        <th>View Overall Attendance</th>
    </thead>
    <tbody>
        <tr v-for="stud in Students" v-bind:key="stud.id">
            <td>{{stud.register_no}}</td>
            <td>{{stud.name}}</td>
            <td>{{stud.department}}</td>
            <td><button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target=".bd-example-modal-lg">View</button></td>
        </tr>
    </tbody>
</table>



<!-- Large modal -->
>

<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">gfbgfb
      <!-- <table class="table">
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
        </table> -->
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
            Students:[],

        }
    },
    created(){
        this.fetchStudents();
    },
    methods:{
        //fetch all students
        fetchStudents(){
            fetch('/api/studentProfile')
                .then(res => res.json())
                .then(res => {
                    this.Students = res.data;
                })
                .catch(err => console.log(err));
        }
       //fetch all over all table

       //match


    },
    computed:{
       
    }

}
</script>
