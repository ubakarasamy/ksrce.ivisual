<template>
    
    <div class="dashboard" style="margin:30px;">
                    <div class="container">
                        <div class="row">
                            <div class="close-sem">
                                <p>
                                    By Clicking Update Semester The current Semester Status will be Updated
                                </p>
                                <button class="btn btn-primary" v-on:click="updateSem" >Update Semester</button>    
                            </div>                           
                        </div>
                    </div>
            </div>

</template>


<script>
export default {
    data(){
        return {
            test: {
                test: 'closesem'
            },
            confirm: ''
        }
    },
    methods:{
        // Update
        updateSem(){
            this.confirm = confirm('Are You Sure ?');
            if(this.confirm === true){
             fetch('api/semester', {
          method: 'post',
          body: JSON.stringify(this.test),
          headers: {
            'content-type': 'application/json'
          }
        })
          .then(res => res.json())
          .then(data => {
            alert('Success');
          })
          .catch(err => console.log(err));
        }
        }
       
    }
}
</script>
