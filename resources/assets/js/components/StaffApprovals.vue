<template>
<div class="card">
    <div class="card-body">
        <div class="approvals">
             <h3>My Applicables</h3>
            <!-- CPL -->
            <div class="row">
                <div class="col-md-3">
                    <div class="card" style="width: 18rem; margin:10px;">
                        <!-- Over All -->
  <div class="card-body">
    <h5 class="card-title">CL</h5>
    <h6 class="card-subtitle mb-2 text-muted">This year</h6>
    <h1><span class="text-primary"></span>2 / {{gotData.staff_cl}}</h1>
  </div>
</div>
                </div>
                <div class="col-md-3">
                    <div class="card" style="width: 18rem; margin:10px;">
                        <!-- Over All -->
  <div class="card-body">
    <h5 class="card-title">CPL</h5>
    <h6 class="card-subtitle mb-2 text-muted">This year</h6>
    <h1><span class="text-primary">10</span> / 20</h1>
  </div>
</div>
                </div>
                <div class="col-md-3">
                    <div class="card" style="width: 18rem; margin:10px;">
                        <!-- Over All -->
  <div class="card-body">
    <h5 class="card-title">OD</h5>
    <h6 class="card-subtitle mb-2 text-muted">This year</h6>
    <h1><span class="text-primary">10</span> / 10</h1>
  </div>
</div>
                </div>
                <div class="col-md-3">
                    <div class="card" style="width: 18rem; margin:10px;">
                        <!-- Over All -->
  <div class="card-body">
    <h5 class="card-title">SOD</h5>
    <h6 class="card-subtitle mb-2 text-muted">This year</h6>
    <h1><span class="text-primary">10</span> / 10</h1>
  </div>
</div>
                </div>
            </div>
        </div>
<hr>        
<div class="create-approval">
    <h3>Create Approval</h3>
    <p class="text-info">You need to contact attendance manager if you have applicable leave balances and forgot to apply before</p>
            <form @submit.prevent="createApproval">
                <div class="form-group">
                    <label for="date">Approval Date</label>
                    <input type="date" id="date" v-model="sendData.date" name="date" max="3000-12-31" min="1000-01-01" class="form-control" style="width:200px;">
                </div>
                <div class="form-group">
                    <label for="approvalfor">Approval For</label>
                    <select name="approvalfor" class="form-control" style="width:150px;" id="approvalfor" aria-placeholder="select" v-model="sendData.approvalFor">
                        <option v-for="approval in approvals" v-bind="approval.value">{{approval.text}}</option>
                    </select>
                </div>
                <div class="form-group">
                    <label>Alternative staff</label>
                    <span v-if="Alternative">{{Alternative}}</span>
                    <span v-if="Alternative === null">Not Selected</span>
                    <button >Select</button>
                </div>
                <div class="form-group">
                    <textarea name="description" class="form-control" style="width:300px;" v-model="sendData.forDescription" id="description" rows="3" cols="40" placeholder="Description"></textarea>
                </div>
                <button type="submit" class="btn btn-primary">submit</button>
            </form>
</div>
<hr>
<div class="my-approvals">
        <h3>My Approvals</h3>
        <table class="table">
                <thead>
                    <th>Date</th>
                    <th>Approval For</th>
                    <th>Status</th>
                    <th>Cancel</th>
                </thead>
                <tbody>
                    <tr v-for="StaffApproval in StaffApprovals" v-bind:key="StaffApproval.id">
                        <td>{{StaffApproval.date}}</td>
                        <td>{{StaffApproval.approvalfor}}</td>
                        <td>
                            <span class="text-success" v-if="StaffApproval.status == 1">Approved</span>
                            <span class="text-danger" v-if="StaffApproval.status == 0">DisApproved</span>
                            <span  class="text-secondary" v-if="StaffApproval.attempt == 0">Waiting</span>
                        </td>
                        <td><button @click="removeApproval(StaffApproval.id)" class="btn btn-outline-danger">Cancel</button></td>
                    </tr>
                </tbody>
            </table>
    </div>

    </div>
</div>
</template>

<script>
export default {
    data(){
        return{
            Alternative:'',
            StaffApprovals:[],
            sendData:{
                approvalFor:'',
            forDescription:'',
            date: ''
            },
            approvals:[
                {text:'CPL',value:'cpl'},
                {text:'CL',value:'cl'},
                {text:'OD',value:'od'}
            ],
            gotData:[]
        }
    },
    created(){
        this.fetchApprovals();
        this.fetchSem();
    },
    props: {
            userId: Number ,
    },
    methods:{
        SelectAlternative(){
            
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
        fetchApprovals(){
            fetch("/api/staffapprovals/"+this.userId+"")
        .then(res => res.json())
        .then(res => {
          this.StaffApprovals = res.data;
        })
        .catch(err => console.log(err));
        },
        createApproval(){
            const passData = {
                approvalFor: this.sendData.approvalFor,
                forDescription: this.sendData.forDescription,
                date:this.sendData.date,
                userId: this.userId
            }
           // console.log(passData);
            fetch("/api/staffapprovals/create", {
            method: "post",
            body: JSON.stringify(passData),
            headers: {
            "content-type": "application/json"
            }
            })
            .then(res => res.json())
            .then(data => {
                this.sendData.approvalFor = '',
            this.sendData.forDescription = ''
            })
            .catch(err => console.log(err));  
            this.sendData.date = '';
            this.sendData.approvalFor = '';
            this.sendData.forDescription = '';
             this.fetchApprovals();
    },
    removeApproval(id){
        const passData = {
            removeId:id
        }
         fetch("/api/staffapprovals", {
            method: "delete",
            body: JSON.stringify(passData),
            headers: {
            "content-type": "application/json"
            }
            })
            .then(res => res.json())
            .then(data => {
                
            })
            .catch(err => console.log(err));  
            alert('removed');
            this.fetchApprovals();
    }
}
}
</script>
