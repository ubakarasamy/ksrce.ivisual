<template>
<div class="card">
    <div class="card-header">
        <h1>My Approvals</h1>
    </div>
    <div class="card-body">
        <div class="approvals">

        </div>
        <div class="myapprovals-list">
            <!-- <ul>
            <li v-for="option in options">
                {{option.approvalFor}} {{option.reason}}
            </li>
        </ul> -->
        </div>
        <div class="create-approval">
            <h3>You need to contact attendance manager if you have applicable leave balances and forgot to apply before</h3>
            <form>
                <div class="form-group">
                    <select name="approvalfor" id="approvalfor" aria-placeholder="select" v-model="approvalFor">
                        <option value="cpl" v-for="approval in approvals" v-bind:key="approval.value">{{approval.text}}</option>
                    </select>
                </div>
                <div class="form-group">
                    <textarea name="description" v-model="forDescription" id="description" rows="4" placeholder="description"></textarea>
                </div>
                <button type="submit" class="btn btn-primary">submit</button>
            </form>
        </div>
    </div>
</div>
</template>

<script>
export default {
    data(){
        return{
            approvalFor:'',
            forDescription:'',
            approvals:[
                {text:'CPL',value:'cpl'},
                {text:'CL',value:'cl'},
                {text:'OD',value:'od'}
            ]
        }
    }
    ,methods:{
        createApproval(){
            sendData = [this.approvalFor,this.forDescription];
            fetch('staffapprovals/create', {
                method: 'post',
                body: JSON.stringify(sendData),
                headers:  {
                   'content-type': 'application/json'
                }
            })
            .then(res => res.json())
            .then(data => {
                this.approvalFor = '',
                this.forDescription = ''
            })
            .catch(err => console.log(err));
           
    }
}
</script>
