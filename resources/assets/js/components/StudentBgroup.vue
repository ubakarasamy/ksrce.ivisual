<template>
    <div class="stud bgroup">

                        <div class="form-group">
<select class="form-control" v-model="filterBgroup" id="selectedBloodgroup" style="width:120px;"> 
  <option v-for="bgroup in bgroups" v-bind:key="bgroup.value">
    {{ bgroup.text }}
  </option>
</select>
</div>
    <!-- <div class="form-group">
        <input type="text" v-model="filterBgroup" class="form-control" style="width:250px;" placeholder="Search Blood Group">
    </div> -->
<p class="text-muted">Current Student on college</p>
        <table class="table">
  <thead>
    <tr>
      <th scope="col">#REG NO</th>
      <th scope="col">Name</th>
      <th scope="col">Blood Group</th>
      <th scope="col">Phone</th>
    </tr>
  </thead>
  <tbody>
    <tr v-for="student in filteredStudents" v-bind:key="student.id">
      <th scope="row">{{ student.register_no }}</th>
      <td>{{ student.name }}</td>
      <td>{{ student.bloodGroup }}</td>
      <td>{{ student.phone }}</td>
    </tr>
  </tbody>
</table>
    </div>
</template>


<script>
export default {
    data(){
        return {
            students:[],
            filterBgroup:'',
            bgroups: [
                { text:'O-positive', value:'O-positive' },
                { text:'O-negative', value:'O-negative' },
                { text:'A-positive', value:'A-positive' },
                { text:'A-negative', value:'A-negative' },
                { text:'B-positive', value:'B-positive' },
                { text:'B-negative', value:'B-negative' },
                { text:'AB-positive', value:'AB-positive' },
                { text:'AB-negative', value:'AB-negative' }
            ]
        }
    },
    created(){
        this.fetchStudents();
    },
    methods:{
         fetchStudents(){
            fetch('/api/studentProfile')
                .then(res => res.json())
                .then(res => {
                    this.students = res.data;
                })
                .catch(err => console.log(err));
        },
    },
    computed:{
        filteredStudents(){
        let vm = this;
        let filterBgroup = vm.filterBgroup;
        let students = vm.students;
        if(filterBgroup === ''){
          return vm.students;
        }else{
          return vm.students.filter(function(student){
            
            return student.bloodGroup.toLowerCase().includes(filterBgroup.toLowerCase());

          });

          }
        }
    }
}
</script>

