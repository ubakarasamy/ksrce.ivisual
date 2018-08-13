<template>
<div class="my-profile">
<div class="col-md-6">

    <div class="card">
                     <div class="card-header">
                        <h1>My Profile</h1>
                     </div>
                     <div class="card-body">
                    <img :src="default_pic" alt="staff image" class="mx-auto d-block" style="width: 135px;border-radius: 7%;margin: 10px;">
                        <table class="table" style="text-transform:uppercase;">
                          <tr><td>Name:</td><td>{{authenticateduser.name}}</td></tr>
                          <tr><td>Department:</td><td>{{authenticateduser.department}}</td></tr>
                          <tr><td>Designation:</td><td>{{authenticateduser.role}}</td></tr>
                          <tr><td>Employee ID:</td><td>{{authenticateduser.eid}}</td></tr>
                          <tr><td>Joined On:</td><td>{{authenticateduser.mojoined}}</td></tr>
                    </table>
                    <a class="btn btn-primary" :href="authenticateduser.profile_url">View Profile Pdf</a>
                        <button class="btn btn-primary" @click="showPassword()" v-if="showPwd === false" id="change_password">Change Password</button>
                    
                        <div class="change-passwordform" id="passwordform" v-if="showPwd === true">
                                <form @submit.prevent="change_password()">
                                    <input type="password" v-model="staff.password" class="form-control col-md-3" name="new_password" id="new_password" placeholder="new password">
                                    <button type="submit" class="btn btn-primary ml-4">Save</button>
                                </form>
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
            staff:{
                user_id: '',
                password:'',
                change_pwd:true
            },
            default_pic: '/img/profile_default_pic.png',
            showPwd:false
        }
    },
    
    props:['userrole', 'authenticateduser'],
    methods:{
        showPassword(){
             this.showPwd = true;
        },
            change_password(){
                this.staff.user_id = this.authenticateduser.id;
                //save password
                fetch('/api/changepwd', {
          method: 'put',
          body: JSON.stringify(this.staff),
          headers: {
            'content-type': 'application/json'
          }
        })
          .then(res => res.json())
          .then(data => {
            this.staff.password = '';
            alert('Staff Updated');
          })
          .catch(err => console.log(err));
            }
    }
}
</script>

