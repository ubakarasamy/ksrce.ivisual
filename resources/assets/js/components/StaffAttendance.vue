<template>
    
    <div class="card">
                       <div class="card-header">
                           <h3 class="card-title">
                               Make Attendance for {{ createAttendance.makedate }} 
                               {{userRole}}
                           </h3>
                       </div>
                       <div class="card-body">


                           <div class="showCreateAttendance" v-if="showCreateAttendance">

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
                                            <input type="text" id="eid" v-model="createAttendance.eid" name="eid" class="form-control">
                                            <p class="text-muted">Enter Your Employee Id</p>
                                       </div>
                               </div>
                               <button type="submit" class="btn btn-primary">Submit</button>
                            </form>
                           </div>

                           <div class="showNew" v-if="showCreateAttendance === false">

                                <input type="text" class="form-control col-md-4 mb-3" style="text-transform:uppercase;margin-botom:20px;" placeholder="Search with Employee Id" v-model="search">
                                <table class="table">
                                   <thead>
                                       <th>#EID</th>
                                       <th>Name</th>
                                       <th>Department</th>
                                       <th>Status</th>
                                       <th>Change Status</th>
                                   </thead>
                                   <tbody>
                                       <tr v-for="Staff in searchStaffs" v-bind:key="Staff.id">
                                           <td>{{ Staff.eid }}</td>
                                           <td>{{ Staff.name }}</td>
                                           <td>{{ Staff.department }}</td>
                                            <td>
                                                <span v-if="getStatus(Staff.id) != null" style="color:#89729E;">{{ getStatus(Staff.id) }}</span>
                                                <span v-if="getStatus(Staff.id) == null" style="color:#F47983;">Not Updated</span>
                                            </td>
                                            <td>
                                              <div class="form-group">
<select class="form-control" @change="SetStatus(Staff)" v-model="Staff.selectedStatus" id="selectedStatus" style="width:120px;"> 
  <option v-for="setStatuse in setStatuses" v-bind:value="setStatuse.value">
    {{ setStatuse.text }}
  </option>
</select>
</div>
                                            </td>
                                       </tr>
                                   </tbody>
                                </table>
                           </div>
                       </div>
                   </div>

</template>

<script>
export default {
  data() {
    return {
      Staffs: [],
      search: "",
      attendanceDatas: [],
      createAttendance: {
        makedate: "",
        eid: ""
      },
      showCreateAttendance: true,
      //set status
      Staff: {
        selectedStatus: "",
        id: ""
      },
      setStatuses: [
        { text: "Not Updated", value: "null" },
        { text: "Present", value: "present" },
        { text: "CL", value: "cl" },
        { text: "CPL", value: "cpl" },
        { text: "Present-Permission", value: "present-permission" },
        { text: "Present-Late", value: "present-late" },
        { text: "OD", value: "od" },
        { text: "SOD", value: "sod" },
        { text: "Absent", value: "absent" }
      ],
      settingStatus: {}
    };
  },
  props:{
    userId: Number ,
  },
  methods: {
    makeDate() {
      fetch("/api/staffattendance", {
        method: "post",
        body: JSON.stringify(this.createAttendance),
        headers: {
          "content-type": "application/json"
        }
      })
        .then(res => res.json())
        .then(data => {
          alert("Attendance Created");
        })
        .catch(err => console.log(err));

      this.showCreateAttendance = false;
      this.fetchAttendanceData(this.createAttendance.makedate);
      this.fetchAllstaffs();
    },
    //Fetch Attendance Data
    fetchAttendanceData(makedate) {
      let vm = this;
      //page_url = '/api/staffattendance/{makedate}';
      fetch("/api/staffattendance/" + makedate + "")
        .then(res => res.json())
        .then(res => {
          this.attendanceDatas = res.data;
        })
        .catch(err => console.log(err));
    },
    //Featch all Staffs
    fetchAllstaffs() {
      fetch("/api/staffprofile")
        .then(res => res.json())
        .then(res => {
          this.Staffs = res.data;
        })
        .catch(err => console.log(err));
    },
    // Get status
    getStatus(id) {
      var status;
      var aData;
      var child;
      aData = this.attendanceDatas;
      for (var child in aData) {
        if (aData[child].staff_id === id) {
          status = aData[child].status;
        }
      }
      return status;
    },
    // set status
    SetStatus(Staff) {
      const PassData = {
        staff_id: Staff.id,
        staff_status: Staff.selectedStatus,
        date: this.createAttendance.makedate
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
      this.fetchAttendanceData(this.createAttendance.makedate);
       this.fetchAllstaffs();
      //console.log(JSON.stringify(PassData));
    }
  },

  computed: {
    searchStaffs: function() {
      var self = this;
      return this.Staffs.filter(function(cust) {
        return cust.eid.toLowerCase().indexOf(self.search.toLowerCase()) >= 0;
      });
      //return this.customers;
    }
  }
};
</script>
