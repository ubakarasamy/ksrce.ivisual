
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');


window.Vue = require('vue');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */
import moment from 'moment'

Vue.prototype.moment = moment

Vue.component('staff-profile', require('./components/StaffProfile.vue'));
Vue.component('student-profile', require('./components/StudentProfile.vue'));
Vue.component('close-semeter', require('./components/CloseSemester.vue'));
Vue.component('staff-attendance', require('./components/StaffAttendance.vue'));
Vue.component('student-attendance', require('./components/StudentAttendance.vue'));
Vue.component('staffattendance-bymonth', require('./components/StaffAttendance-bymonth.vue'));
Vue.component('staff-myapprovals', require('./components/StaffApprovals.vue'));
Vue.component('approve-leaves', require('./components/ApproveLeaves.vue'));
Vue.component('time-tables', require('./components/Timetables.vue'));
Vue.component('stud-attendance-view', require('./components/StudAttendanceView.vue'));
Vue.component('stud-attendance-view-byoverall', require('./components/StudentAttendanceByOverall.vue'));
Vue.component('stud-attendance-view-bymonth', require('./components/StudentAttendanceByMonth.vue'));
Vue.component('create-subjects', require('./components/CreateSubjects.vue'));


const app = new Vue({
    el: '#app'
    
});
