<template>
  <div class="signup container">
    <div class="row">
      <h1>New Student</h1>
      <div v-if="dsave" class="alert alert-success" >
           Data Saved successfully.
      </div>
      <div class="mb-3">
        <label for="name" class="form-label float-left">First Name </label>
        <input
          type="text"
          class="form-control"
          id="firstName"
          v-model="form.firstName"
          placeholder="First Name"
        />
        <span
        class="text-danger"
        v-if="errors.firstName"
                        v-text="errors.firstName"
                      ></span>
      </div>
      <div class="mb-3">
        <label for="price" class="form-label float-left">Last Name</label>
        <input
          type="text"
          class="form-control"
          id="lastName"
          v-model="form.lastName"
          placeholder="Last Name"
        />
         <span
        class="text-danger"
        v-if="errors.lastName"
                        v-text="errors.lastName"
                      ></span>
      </div>

      <div class="mb-3">
        <label for="price" class="form-label float-left">Email</label>
        <input
          type="text"
          class="form-control"
          id="stdEmail"
          v-model="form.stdEmail"
          placeholder="Email"
        />
        <span
        class="text-danger"
        v-if="errors.stdEmail"
                        v-text="errors.stdEmail"
                      ></span>
      </div>
   
      <div class="mb-3">
        <label for="price" class="form-label float-left">Select Courses</label>

        <div class="row mt-2" v-for="(input, k) in form.subject" :key="k">
           <div class="col-md-5">
            <select
              class="form-control"
              id=""
              v-model="input.name"
            >
              <option value="" selected disabled>Select Courses</option>
              <option value="Math">Math</option>
              <option value="English">English</option>
              <option value="Physics">Physics</option>
            </select>
          </div> 

          <div class="col-md-5">
            <input
              class="form-control"
              id="priority"
              v-model="input.priority"
            />
             
          </div>
           <div class="col-md-1">
              <button  class="btn btn-primary" @click="add(k)"
              v-show="k == form.subject.length - 1">+</button>
         </div>
           <div class="col-md-1">
              <button  class="btn btn-danger" 
              @click="remove(k)"
              v-show="(k==(form.subject.length-1))"
              >-</button>
         </div>
        
        </div>
       
      </div>

      <button class="btn btn-success" @click="submit()">Save</button>
    </div>

  </div>
</template>
<script>
import axios from "axios";
export default {
  data() {
    return {
      
      dsave: false,
      count: 1,
      errors:[],
  
      form: {
        firstName: "",
        lastName: "",
        stdEmail: "",
        subject: [
        {
          name: "",
          priority: "",
          subName : ""
        },
        ]
      },
    };
  },
  mounted() {

  },
  computed: {

  },
  methods: {

    add(index) {
      if (form.subject[index].name=="") {
        alert('')
      }
      this.form.subject.push({
        name: "",
        priority: "",
      });
      //console.log(this.subs);
    },

    remove(index) {
      console.log(index);
      this.form.subject.splice(index, 1);
    },

    async submit() {
      axios
        .post("http://localhost:8000/api/students", this.form)
        .then((r) => {
         
          console.log(r);
          this.errors=[];
      
          this.dsave = true;
        })
      
        .catch((err) => {
          this.errors=err.response.data.errors;
          this.dsave = false;
          console.log(err.response.data.errors);
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
