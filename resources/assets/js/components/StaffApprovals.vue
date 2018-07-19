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
    <h5 class="card-title">OD</h5>
    <h6 class="card-subtitle mb-2 text-muted">This year</h6>
    <h1><span class="text-primary"></span><span class="text-primary">{{myLimits[0].od}}</span> / {{gotData.staff_od}}</h1>
  </div>
</div>
                </div>
                <div class="col-md-3">
                    <div class="card" style="width: 18rem; margin:10px;">
                        <!-- Over All -->
  <div class="card-body">
    <h5 class="card-title">Permission</h5>
    <h6 class="card-subtitle mb-2 text-muted">This year</h6>
    <h1><span class="text-primary">{{myLimits[0].pp}}</span> /  {{gotData.staff_permission}}</h1>
  </div>
</div>
                </div>
                <div class="col-md-3">
                    <div class="card" style="width: 18rem; margin:10px;">
                        <!-- Over All -->
  <div class="card-body">
    <h5 class="card-title">Late Register</h5>
    <h6 class="card-subtitle mb-2 text-muted">This year</h6>
    <h1><span class="text-primary">{{myLimits[0].pl}}</span> /  {{gotData.staff_late_register}}</h1>
  </div>
</div>
                </div>
                <div class="col-md-3">
                    <div class="card" style="width: 18rem; margin:10px;">
                        <!-- Over All -->
  <div class="card-body">
    <h5 class="card-title">CL</h5>
    <h6 class="card-subtitle mb-2 text-muted">This year</h6>
    <h1><span class="text-primary">{{myLimits[0].cl}}</span> / {{gotData.staff_cl}}</h1>
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
                        <option v-for="approval in approvals" v-bind:key="approval.value">{{approval.text}}</option>
                    </select>
                </div>
                <div class="form-group">
                    <label>Alternative staff</label> <strong  class="text-primary" v-if="sendData.AlternativeStaffName">{{sendData.AlternativeStaffName}}</strong>
                    <br>
                    
 <!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
  Select Staff
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Alternative Staff <strong class="text-primary" v-if="sendData.AlternativeStaffName">{{sendData.AlternativeStaffName}}</strong></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <div class="modal-body">
            <input type="text" v-model="SearchStaff" placeholder="Search By Name" name="search" id="search" class="form-control mb-1 mt-1" style="width:250px;">
          <div class="inner-box scrollTable">
        <table class="table ">
        <tbody>
            <tr v-for="Staff in filteredStaffs" v-bind:key="Staff.id">
                <td>#{{Staff.eid}}</td>
                <td>{{Staff.name}}</td>
                <td>
                    <button type="button"@click="SelectAlternative(Staff.id,Staff.name)" class="btn btn-outline-primary">Select</button>
                </td>
            </tr>
        </tbody>
        </table>

      </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>                   
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
                    <th>Alternative</th>
                    <th>Status</th>
                    <th>Cancel</th>
                </thead>
                <tbody>
                    <tr v-for="StaffApproval in StaffApprovals" v-bind:key="StaffApproval.id">
                        <td>{{StaffApproval.date}}</td>
                        <td>{{StaffApproval.approvalfor}}</td>
                        <td>{{StaffApproval.alterStaff}}</td>
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
            SearchStaff:'',
            StaffApprovals:[],
            sendData:{
                approvalFor:'',
            forDescription:'',
            date: '',
            AlternativeStaffName:'',
            AlternativeStaffId:''
            },
            approvals:[
                {text:'CPL',value:'cpl'},
                {text:'CL',value:'cl'},
                {text:'OD',value:'od'}
            ],
            gotData:[],
            Allstaffs:'',
            myLimits:[]
        }
    },
    created(){
        this.fetchUsers();
        this.fetchApprovals();
        this.fetchSem();
        this.fetchMyLimits();
    },
    props: {
            userId: Number ,
    },
    methods:{
        SelectAlternative(id,name){
            this.sendData.AlternativeStaffId = id;
            this.sendData.AlternativeStaffName = name;
        },
        fetchMyLimits(){
            fetch("/api/mystafflimits/"+this.userId+"")
        .then(res => res.json())
        .then(res => {
          this.myLimits = res.data;
        })
        .catch(err => console.log(err));
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
                approvalFor: this.sendData.approvalFor.toLowerCase(),
                forDescription: this.sendData.forDescription,
                date: this.sendData.date,
                AlternativeStaffName: this.sendData.AlternativeStaffName,
                AlternativeStaffId: this.sendData.AlternativeStaffId,
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
            })
            .catch(err => console.log(err));  
             this.fetchApprovals();

            this.sendData.approvalFor = '';
            this.sendData.forDescription = ''
            this.sendData.AlternativeStaffName = '';
            this.sendData.AlternativeStaffId = '';
            this.sendData.date = '';
            
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
    },
    fetchUsers() {
      fetch('/api/staffprofile')
        .then(res => res.json())
        .then(res => {
          this.Allstaffs = res.data;
          
        })
        .catch(err => console.log(err));
    }
    },
     computed:{
        filteredStaffs: function() {
			let vm = this;
      let search = vm.SearchStaff;
			if(search === "") {
				//save performance, juste return the default array:
				return vm.Allstaffs;
			} else {
				return vm.Allstaffs.filter(function(staff) {
					//return the array after passimng it through the filter function:
					return  staff.name.toLowerCase().includes(search.toLowerCase());	 

				});
			}
		}
    }
}
</script>


<style scoped>
    .scrollTable
    {
        height: 400px;
        overflow-x: scroll;
    }
</style>
