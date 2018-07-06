<template>
<div class="stud-at-view">
<ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
  <li class="nav-item">
    <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">Day</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">overall</a>
  </li>
</ul>
<div class="tab-content" id="pills-tabContent">
  <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
    <div class="day-view">

<div class="filter-options col-md-12 m-5">
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
</div>


<!-- pick date -->
<div class="form-group">
<label for="date">Date</label>
<input type="date" id="date" v-model="makedate" @change="fetchAttendanceData()" name="date" max="3000-12-31" min="1000-01-01" class="form-control" style="width:200px;">
</div>
<!-- get data -->

 <table class="table">
                    <thead>
                        <th>#REG NO</th>
                        <th>Name</th>
                        <th>Status</th>
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
                        </tr>
                    </tbody>
                </table>

</div>
  </div>
  <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
    Over all
  </div>

</div>

</div>

</template>
   
<script>
export default {
    data(){
        return{
            students: [],
            makedate:'',
            attendnaceDatasBydate:[],
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
        }
    },
    created(){
       
    },
    methods:{
        //get all students
    getAllStudents() {
      fetch("/api/studentProfile")
        .then(res => res.json())
        .then(res => {
          this.students = res.data;
        })
        .catch(err => console.log(err));
    },
        //Fetch Attendance Data
    fetchAttendanceData() {
        this.getAllStudents();
      let vm = this;
      fetch("/api/studentattendance/" + vm.makedate + "")
        .then(res => res.json())
        .then(res => {
          this.attendnaceDatasBydate = res.data;
          console.log(res.data);
        })
        .catch(err => console.log(err));
        
    },
    // Get status for H1
    getStatusH1(id) {
      var status;
      var aData;
      var child;
      aData = this.attendnaceDatasBydate;
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
      aData = this.attendnaceDatasBydate;
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
      aData = this.attendnaceDatasBydate;
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
      aData = this.attendnaceDatasBydate;
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
      aData = this.attendnaceDatasBydate;
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
      aData = this.attendnaceDatasBydate;
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
      aData = this.attendnaceDatasBydate;
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
}
</script>


<style scoped>
.hours_list li
{
    list-style: none;
    display: inline-block;
}
</style>
