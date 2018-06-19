<template>
    
    <div class="card">
                       <div class="card-header">
                           <h3 class="card-title">
                               Make Attendance
                           </h3>
                       </div>
                       <div class="card-body">
                            <!-- Form  -->
                       <form @submit.prevent="makeDate">
                               <div class="row">
                                    <div class="form-group col-md-4">
                                            <label for="date">Date </label>
                                            <input type="date" id="date" v-model="test.makeDate" name="date" max="3000-12-31" min="1000-01-01" class="form-control" style="width:200px;">
                                            <p class="text-muted">Please double Check the Date</p>
                                       </div>
                                       <div class="form-group col-md-4">
                                            <label for="eid">Employee ID</label>
                                            <input type="text" id="eid" v-model="test.eid" name="eid" class="form-control">
                                            <p class="text-muted">Enter Your Employee Id</p>
                                       </div>
                               </div>
                               <button type="submit" class="btn btn-primary">Submit</button>
                           </form>
                       </div>
                   </div>

</template>

<script>
export default {
    data(){
        return {
            tests:[],
            test:{
                makeDate: '',
                eid: ''
            }
        }
    },
    methods: {
        makeDate(){
            // Add
        fetch('/api/staffattendance', {
          method: 'post',
          body: JSON.stringify(this.test),
          headers: {
            'content-type': 'application/json'
          }
        })
          .then(res => res.json())
          .then(data => {
            this.test.makeDate = '';
            this.test.eid = '';
          })
          .catch(err => console.log(err));
          alert('Attendance Created');
        }
    }
}
</script>
