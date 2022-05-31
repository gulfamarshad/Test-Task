<template>
  <div class="signup container">

    <div class="row mt-2">
      <table class="table table-stripped">
        <thead class="">
          <th>First Name</th>
          <th>Last Name</th>
          <th>Email</th>
          <th>Action</th>
        </thead>
        <tbody>
          <tr v-for="row in Students" :key="row.id">
            <td>
             {{
                row.firstName
              }}
            </td>
            <td>{{ row.lastName }}</td>
            <td>{{ row.stdEmail }}</td>
            <td>
              <button class="btn  btn-outline-primary btn-small">
                <RouterLink :to="'/student/' + row.id">View Details</RouterLink>
              </button>
            </td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
</template>
<script>
import axios from "axios";
export default {
  data() {
    return {
      students: []
    };
  },
  mounted() {
    this.getStudents();
  },
  computed: {
    Students() {
      return this.students;
    },
  },
  methods: {
    getStudents() {
      axios
        .get("http://localhost:8000/api/students")
        .then((r) => {
          this.students = r.data;
          console.log(r);
        })
        .catch((err) => {
          console.log(err);
        });
    }
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
