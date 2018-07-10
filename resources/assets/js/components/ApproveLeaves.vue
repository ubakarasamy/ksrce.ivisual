<template>
<div class="card">
    <div class="card-header">
        <h2>Staff Approvals</h2>
        <div class="form-group">
            <label for="staff_filter_department">Department</label>
<div class="filter-options">
<select class="form-control" v-model="selectedDepartment" style="width:120px;display:inline-block;">
  <option v-for="departmentOption in departmentOptions" v-bind:value="departmentOption.value">
    {{ departmentOption.text }}
  </option>
</select>
        </div>
    </div>
    <div class="card-body">
    <table class="table text-center">
        <thead>
            <th>Staff EID</th>
            <th>Name</th>
            <th>Request For</th>
            <th>Request On</th>
            <th>Approve / Disapprove</th>
        </thead>
        <tbody>
            <tr v-for="staffApproval in filterapprovals" v-bind:key="staffApproval.id">
                <td>{{StaffEid(staffApproval.staff_id)}}</td>
                <td>{{StaffName(staffApproval.staff_id)}}</td>
                <td>{{staffApproval.approvalfor}}</td>
                <td>{{staffApproval.description}}</td>
                <td>{{staffApproval.date}}</td>
                <td><button @click="acceptApproval(staffApproval.id,1,staffApproval.date,staffApproval.staff_id,staffApproval.approvalfor)" class="btn btn-outline-primary">Approve</button><button @click="acceptApproval(staffApproval.id,0,staffApproval.date,staffApproval.staff_id,staffApproval.approvalfor)" class="ml-3 btn btn-outline-danger">DisApprove</button></td>
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
        return {
            
            Staffs:[],
            StaffApprovals:[],
            selectedDepartment:'all',
            //staff department
             departmentOptions: [
      { text: 'all', value: 'all' },
      { text: 'ECE', value: 'ece' },
        { text: 'EEE', value: 'eee' },
        { text: 'MECH', value: 'mech' },
        { text: 'CSE', value: 'cse' },
        { text: 'IT', value: 'it' },
        { text: 'CIVIL', value: 'civil' },
        { text: 'AUTOMOBILE', value: 'automobile' },
        { text: 'ENGLISH', value: 'english' },
        { text: 'PHYSICS', value: 'physics' },
        { text: 'CHEMISTRY', value: 'chemistry' },
        { text: 'MATHEMATICS', value: 'mathematics' },
        { text: 'ME-SE', value: 'me-se' },
        { text: 'ME-CE&M', value: 'me-ce&m' },
        { text: 'ME-CSE', value: 'me-cse' },
        { text: 'ME-MMT', value: 'me-mmt' },
        { text: 'ME-AE', value: 'me-ae' },
        { text: 'ME-COM-SYS', value: 'me-com-sys' },
        { text: 'ME-VLSI', value: 'me-vlsi' },
        { text: 'ME-EST', value: 'me-est' },
        { text: 'ME-PE&D', value: 'me-pe&d' },
        { text: 'ME-ISE', value: 'me-ise' },
        { text: 'MTECH-IT', value: 'mtech-it' },
        { text: 'MBA', value: 'mba' },
        { text: 'MCA', value: 'mca' }
        
    ],
        }
    },
    created(){
        this.fetchApprovals();
        this.fetchAllstaffs();
        //remove attempted
        this.removeAttempts();
    },
    methods:{
        
    //Featch all Staffs
    fetchAllstaffs() {
      fetch("/api/staffprofile")
        .then(res => res.json())
        .then(res => {
          this.Staffs = res.data;
        })
        .catch(err => console.log(err));
    },
        //fetch approvals
        fetchApprovals(){
            fetch("/api/staffapprovals")
        .then(res => res.json())
        .then(res => {
          this.StaffApprovals = res.data;
        })
        .catch(err => console.log(err));
        },
        //getstaff name
        StaffName(id){
             var name;
      for (var child in this.Staffs) {
        if (this.Staffs[child].id === id) {
          name = this.Staffs[child].name;
        }
      }
      return name;
        },
        StaffEid(id){
             var eid;
      for (var child in this.Staffs) {
        if (this.Staffs[child].id === id) {
          eid = this.Staffs[child].eid;
        }
      }
      return eid;
        },
        
        acceptApproval(Aid,status,date,Sid,approvalfor){
            if(status === 1){
                //approved set attendnace
                this.SetStatus(Sid,approvalfor,date);
            }
            const passData = {
                status:status,
                Aid:Aid,
                Attempt:1
            }
            fetch("/api/staffapprovals/create", {
            method: "put",
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
            this.fetchApprovals();
        
    },
    

    //set attendance status
    SetStatus(id,approvalfor,date) {
      const PassData = {
        staff_id: id,
        staff_status: approvalfor,
        date: date
      };

      fetch("/api/staffattendance/setstatus", {
        method: "post",
        body: JSON.stringify(PassData),
        headers: {
          "content-type": "application/json"
        }
      })
        .then(res => res.json())
        .then(data => {
          (this.Staff.selectedStatus = ""), (this.Staff.id = "");
        })
        .catch(err => console.log(err));
      //console.log(JSON.stringify(PassData));
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
            this.fetchApprovals();
    },
    removeAttempts(){
        for (var child in this.StaffApprovals) {
        if (this.StaffApprovals[child].attempt === 1 && this.StaffApprovals[child].date >= date('Y-m-d', strtotime(Date()))) {
          //remove
            this.removeApproval(this.StaffApprovals[child].id);
        }
        console.log('removed'+this.StaffApprovals[child].id);
      }
    }
    },
    computed:{
        filterapprovals(){
        //filter with department
        var dprtmnt = this.selectedDepartment;
         return this.StaffApprovals.filter(function(StaffApproval){
             if(dprtmnt === 'all'){
                 return (StaffApproval.attempt != 1);
             }else{
                 return (StaffApproval.attempt != 1) && (StaffApproval.department === dprtmnt);
             }
             
         });
        }
    }
}
</script>
