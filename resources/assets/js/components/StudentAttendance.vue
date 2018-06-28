<template>
<div class="home">
    <div class="createAttendance-form" v-if="createForm === true">
    <div class="card">
        <div class="card-header">

        </div>
        <div class="card-body">
            
            <!-- Form  -->
                            <form @submit.prevent="makeDate">
                               <div class="row">
                                    <div class="form-group col-md-4">
                                            <label for="date">Date </label>
                                            <input type="date" id="date" v-model="createAttendance.makedate" name="date" max="3000-12-31" min="1000-01-01" class="form-control" style="width:200px;">
                                            <p class="text-muted">Please double Check the Date</p>
                                       </div>
                                       <div class="form-group col-md-4">
                                            <label for="eid">Employee ID</label>
                                            <input type="text" id="eid" v-model="createAttendance.staff_eid" name="eid" class="form-control">
                                            <p class="text-muted">Enter Your Employee Id</p>
                                       </div>
                               </div>
                               <button type="submit" class="btn btn-primary">Submit</button>
                            </form>
            </div>
        </div>
    </div>

<div class="attendance-table" v-if="createForm === false">
        <div class="card">
            <div class="card-header">
                <p class="card-title">Make Attendance </p>
                <div class="filter-options col-md-12">
   <label for="student_department_filter">Department</label>
<select class="form-control" id="student_department_filter" style="width:120px;display:inline-block;" v-model="student_department_filter_selected">
  <option v-for="student_department_filter_option in student_department_filter_options" v-bind:value="student_department_filter_option.value">{{ student_department_filter_option.text }}</option>
</select>

 <label for="student_year_filter">Year</label>
<select class="form-control" id="student_year_filter" v-model="student_year_filter_selected" style="width:120px;display:inline-block;">
  <option v-for="student_year_filter_option in student_year_filter_options" v-bind:value="student_year_filter_option.value">
    {{ student_year_filter_option.text }}
  </option>
</select>

    <label for="student_section_filter">Section</label>
<select class="form-control" id="student_section_filter" v-model="student_section_filter_selected" style="width:120px;display:inline-block;"> 
  <option  v-for="student_section_filter_option in student_section_filter_options" v-bind:value="student_section_filter_option.value">
    {{ student_section_filter_option.text }}
  </option>
</select>

<div class="select-hours" style="display-inline">
    <div class="form-group"><label for="h1">H1</label>&nbsp&nbsp<input type="checkbox" name="h1" id="h1" v-model="selectedH.h1"></div>
    <div class="form-group"><label for="h2">H2</label>&nbsp&nbsp<input type="checkbox" name="h2" id="h2" v-model="selectedH.h2"></div>
    <div class="form-group"><label for="h3">H3</label>&nbsp&nbsp<input type="checkbox" name="h3" id="h3" v-model="selectedH.h3"></div>
    <div class="form-group"><label for="h4">H4</label>&nbsp&nbsp<input type="checkbox" name="h4" id="h4" v-model="selectedH.h4"></div>
    <div class="form-group"><label for="h5">H5</label>&nbsp&nbsp<input type="checkbox" name="h5" id="h5" v-model="selectedH.h5"></div>
    <div class="form-group"><label for="h6">H6</label>&nbsp&nbsp<input type="checkbox" name="h6" id="h6" v-model="selectedH.h6"></div>
    <div class="form-group"><label for="h7">H7</label>&nbsp&nbsp<input type="checkbox" name="h7" id="h7" v-model="selectedH.h7"></div>    
</div>

</div>
            </div>
            <div class="card-body">
                <table class="table">
                    <thead>
                        <th>#REG NO</th>
                        <th>Name</th>
                        <th>Status</th>
                        <th>Change Status</th>
                    </thead>
                    <tbody>
                        <tr v-for="student in filteredStudents" v-bind:key="student.id">
                            <td>{{ student.register_no }}</td>
                            <td>{{ student.name }}</td>
                            <td>
                                <ul class="hours_list">
                                    <li>
                                        1 <br>
                                        <span v-if="getStatusH1(student.id)" style="color:#89729E;">{{getStatusH1(student.id)}}</span>
                                        <span v-if="getStatusH1(student.id) == null" style="color:#F47983;">Null</span>
                                    </li>
                                    <li>
                                        2 <br>
                                       <span v-if="getStatusH2(student.id)" style="color:#89729E;">{{getStatusH2(student.id)}}</span>
                                        <span v-if="getStatusH2(student.id) == null" style="color:#F47983;">Null</span>
                                    </li>
                                    <li>
                                        3 <br>
                                       <span v-if="getStatusH3(student.id)" style="color:#89729E;">{{getStatusH3(student.id)}}</span>
                                        <span v-if="getStatusH3(student.id) == null" style="color:#F47983;">Null</span>
                                    </li>
                                    <li>
                                        4 <br>
                                       <span v-if="getStatusH4(student.id)" style="color:#89729E;">{{getStatusH4(student.id)}}</span>
                                        <span v-if="getStatusH4(student.id) == null" style="color:#F47983;">Null</span>
                                    </li>
                                    <li>
                                        5 <br>
                                       <span v-if="getStatusH5(student.id)" style="color:#89729E;">{{getStatusH5(student.id)}}</span>
                                        <span v-if="getStatusH5(student.id) == null" style="color:#F47983;">Null</span>
                                    </li>
                                    <li>
                                        6 <br>
                                       <span v-if="getStatusH6(student.id)" style="color:#89729E;">{{getStatusH6(student.id)}}</span>
                                        <span v-if="getStatusH6(student.id) == null" style="color:#F47983;">Null</span>
                                    </li>
                                    <li>
                                        7 <br>
                                        <span v-if="getStatusH7(student.id)" style="color:#89729E;">{{getStatusH7(student.id)}}</span>
                                        <span v-if="getStatusH7(student.id) == null" style="color:#F47983;">Null</span>
                                    </li>
                                </ul>
                            </td>
                            <td>
                                <select class="form-control" id="student_section_filter" @change="SetStatus(student)" v-model="setStatusSelected" style="width:120px;display:inline-block;"> 
  <option value="default" disabled selected>select</option>
  <option  v-for="setStatuse in setStatuses" v-bind:value="setStatuse.value">
    {{ setStatuse.text }}
  </option>
</select>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
</div>


</div>





</template>

<script>
export default {
  data() {
    return {
      students: [],
      createAttendance: {
        makedate: "",
        staff_eid: ""
      },
      attendanceDatas: [],
      createForm: true,
      //student filter datas start
      //department filter
      student_department_filter_selected: "all",
      student_department_filter_options: [
        { text: "all", value: "all" },
        { text: "ECE", value: "ece" },
        { text: "EEE", value: "eee" },
        { text: "MECH", value: "mech" },
        { text: "CSE", value: "cse" },
        { text: "IT", value: "it" },
        { text: "CIVIL", value: "civil" }
      ],
      //Year filter
      student_year_filter_selected: "all",
      student_year_filter_options: [
        { text: "all", value: "all" },
        { text: "1st Year", value: "1" },
        { text: "2nd year", value: "2" },
        { text: "3rd year", value: "3" },
        { text: "Final year", value: "4" }
      ],
      //section filter
      student_section_filter_selected: "all",
      student_section_filter_options: [
        { text: "all", value: "all" },
        { text: "A", value: "a" },
        { text: "B", value: "b" },
        { text: "C", value: "c" },
        { text: "D", value: "d" }
      ],
      //student filter datas end
      setStatusSelected: 'default',
      setStatuses:[
          {text:'Present', value:'present'},
          {text:'Absent', value:'absent'},
          {text:'Leave', value:'leave'},
          {text:'OD', value:'od'}
      ],
      selectedH:{
          h1:'',
          h2:'',
          h3:'',
          h4:'',
          h5:'',
          h6:'',
          h7:''
      }
    };
  },
  methods: {
    makeDate() {
      fetch("/api/studentattendance", {
        method: "post",
        body: JSON.stringify(this.createAttendance),
        headers: {
          "content-type": "application/json"
        }
      })
        .then(res => res.json())
        .then(res => {
          console.log(res.data);
        });
      this.createForm = false;
      alert("success");
      this.getAllStudents();
    },
    //get all students
    getAllStudents() {
      fetch("/api/studentProfile")
        .then(res => res.json())
        .then(res => {
          this.students = res.data;
        })
        .catch(err => console.log(err));
      this.fetchAttendanceData(this.createAttendance.makedate);
    },
    //Fetch Attendance Data
    fetchAttendanceData(makedate) {
      let vm = this;
      //page_url = '/api/staffattendance/{makedate}';
      fetch("/api/studentattendance/" + makedate + "")
        .then(res => res.json())
        .then(res => {
          this.attendanceDatas = res.data;
        })
        .catch(err => console.log(err));
    },
    // Get status for H1
    getStatusH1(id) {
      var status;
      var aData;
      var child;
      aData = this.attendanceDatas;
      for (var child in aData) {
        if (aData[child].student_id === id) {
          status = aData[child].h1;
        }
      }
      if (status) {
        return status;
      } else {
        return null;
      }
    },
    // Get status for H2
    getStatusH2(id) {
      var status;
      var aData;
      var child;
      aData = this.attendanceDatas;
      for (var child in aData) {
        if (aData[child].student_id === id) {
          status = aData[child].h2;
        }
      }
      if (status) {
        return status;
      } else {
        return null;
      }
    },
    // Get status for H3
    getStatusH3(id) {
      var status;
      var aData;
      var child;
      aData = this.attendanceDatas;
      for (var child in aData) {
        if (aData[child].student_id === id) {
          status = aData[child].h3;
        }
      }
      if (status) {
        return status;
      } else {
        return null;
      }
    },
    // Get status for H4
    getStatusH4(id) {
      var status;
      var aData;
      var child;
      aData = this.attendanceDatas;
      for (var child in aData) {
        if (aData[child].student_id === id) {
          status = aData[child].h4;
        }
      }
      if (status) {
        return status;
      } else {
        return null;
      }
    },
    // Get status for H5
    getStatusH5(id) {
      var status;
      var aData;
      var child;
      aData = this.attendanceDatas;
      for (var child in aData) {
        if (aData[child].student_id === id) {
          status = aData[child].h5;
        }
      }
      if (status) {
        return status;
      } else {
        return null;
      }
    },
    // Get status for H6
    getStatusH6(id) {
      var status;
      var aData;
      var child;
      aData = this.attendanceDatas;
      for (var child in aData) {
        if (aData[child].student_id === id) {
          status = aData[child].h6;
        }
      }
      if (status) {
        return status;
      } else {
        return null;
      }
    },
    // Get status for H7
    getStatusH7(id) {
      var status;
      var aData;
      var child;
      aData = this.attendanceDatas;
      for (var child in aData) {
        if (aData[child].student_id === id) {
          status = aData[child].h7;
        }
      }
      if (status) {
        return status;
      } else {
        return null;
      }
    },
     // set status
    SetStatus(Student) {
        const PassData = {};
        PassData.student_id = Student.id;
        PassData.date = this.createAttendance.makedate;
        if(this.selectedH.h1){ PassData.h1 = this.setStatusSelected }
        if(this.selectedH.h2){ PassData.h2 = this.setStatusSelected }
        if(this.selectedH.h3){ PassData.h3 = this.setStatusSelected }
        if(this.selectedH.h4){ PassData.h4 = this.setStatusSelected }
        if(this.selectedH.h5){ PassData.h5 = this.setStatusSelected }
        if(this.selectedH.h6){ PassData.h6 = this.setStatusSelected }
        if(this.selectedH.h7){ PassData.h7 = this.setStatusSelected }
      fetch("/api/studentattendance/setstatus", {
        method: "post",
        body: JSON.stringify(PassData),
        headers: {
          "content-type": "application/json"
        }
      })
        .then(res => res.json())
        .then(data => {
          (this.Student.selectedStatus = ""), (this.Student.id = "");
        })
        .catch(err => console.log(err));
      this.fetchAttendanceData(this.createAttendance.makedate);
       this.setStatusSelected = 'default';
       this.getAllStudents();
      //console.log(JSON.stringify(PassData));
    }
  },
  computed: {
    filteredStudents() {
      let vm = this;
      let filterDepartment = vm.student_department_filter_selected;
      let filterYear = vm.student_year_filter_selected;
      let filterSection = vm.student_section_filter_selected;

      if (
        filterDepartment === "all" &&
        filterYear === "all" &&
        filterSection === "all"
      ) {
        return vm.students;
      } else {
        return vm.students.filter(function(student) {
          return (
            (filterDepartment === "all" ||
              student.department === filterDepartment) &&
            (filterYear === "all" || student.year === filterYear) &&
            (filterSection === "all" || student.section === filterSection)
          );
        });
      }
    }
  }
};
</script>

<style scoped>
.hours_list li {
  display: inline-block;
  width: 100px;
}
.select-hours
{
    display: inline;
}
.select-hours .form-group
{
    display: inline;
}
</style>
