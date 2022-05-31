<template>
  <div class="signup container mt-3">
    <div>
      <div class="card-header bg-info text-white">Student Details</div>
      <div class="card-body">
        <div class="row">
          <div class="col-md-6">First Name</div>
          <div class="col-md-6">
            {{ student.firstName }}
          </div>
        </div>
        <div class="row">
          <div class="col-md-6">Last Name</div>
          <div class="col-md-6">
            {{ student.lastName }}
          </div>
        </div>
        <div class="row">
          <div class="col-md-6">Email</div>
          <div class="col-md-6">
            {{ student.stdEmail }}
          </div>
        </div>
        <div class="row mt-2">
          <table class="table table-stripped">
            <thead class="">
              <th>Subject</th>
              <th>Priority</th>
            </thead>
            <tbody>
              <tr v-for="row in student.subjects" :key="row.id">
                <td>
                  {{ row.name }}
                </td>
                <td>{{ row.priority }}</td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</template>
<script>
import axios from "axios";
export default {
  data() {
    return {
      student: [],
    };
  },
  mounted() {
    this.getStudent();
  },
  computed: {
    // Students() {
    //   return this.students;
    // },
  },
  methods: {
    getStudent() {
      axios
        .get("http://localhost:8000/api/students/" + this.$route.params.id)
        .then((r) => {
          this.student = r.data;
          console.log(r);
        })
        .catch((err) => {
          console.log(err);
        });
    },
  },
};
</script>
<style>
@media (min-width: 1024px) {
  .signup {
    min-height: 100vh;
  }
}
</style>
