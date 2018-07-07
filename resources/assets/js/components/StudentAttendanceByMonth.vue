<template>
<div class="card">
    <div class="card-header">

    </div>
    <div class="card-body">
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
        {{getStudentAttendanceById(2)}}
    </div>
</div>
    
</template>

<script>
export default {
    data(){
        return{
            fromdate: '2018-06-30',
            attendanceDatas:[]
        }
    },
    created(){
        this.getAttendanceDatas();
        
    },
    methods:{
        //get all attendnace data from date
        getAttendanceDatas(){
            fetch('/api/studentattendance')
            .then(res => res.json())
            .then(res => {
                this.attendanceDatas = res.data;
                console.log(res.data);
                console.log(this.getDatafromdate);
            })
        }


    },
    computed:{
       
    }

}
</script>
