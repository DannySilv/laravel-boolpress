<template>
  <div class="container">
    <h1>Contact Us</h1>
    <div v-if="success" class="alert alert-success">
      The message was sent!
    </div>
    <form>
      <div class="form-group">
        <label for="email" class="form-label">Email</label>
        <input type="email" class="form-control" id="email" placeholder="Enter email" v-model="email">
        <div v-if="errors.email" class="text-danger">
          <h6 v-for="(error, index) in errors.email" :key="index">{{ error }}</h6>
        </div>
      </div>
      <div class="form-group">
        <label for="name" class="form-label">Name</label>
        <input type="text" class="form-control" id="name" placeholder="Enter Name" v-model="name">
        <div v-if="errors.email" class="text-danger">
          <h6 v-for="(error, index) in errors.name" :key="index">{{ error }}</h6>
        </div>
      </div>
      <div class="form-group">
        <label for="message" class="form-label">Message</label>
        <textarea type="text" class="form-control" id="message" placeholder="Enter Message" rows="6" v-model="message"></textarea>
        <div v-if="errors.message" class="text-danger">
          <h6 v-for="(error, index) in errors.message" :key="index">{{ error }}</h6>
        </div>
      </div>
      <div v-if="loading">
        <h6>Sending...</h6>
      </div>
      <button @click.prevent="sendRequest" type="submit" class="btn btn-primary" :disabled="loading">Submit</button>
    </form>
  </div>
</template>

<script>
export default {
  name: 'Contacts',
  data() {
    return {
      email: "",
      name: "",
      message: "",
      success: false,
      errors: {},
      loading: false
    }
  },
  methods: {
    sendRequest() {
      this.errors = {};
      this.loading = true;
      axios.post('/api/leads', {
        email: this.email,
        name: this.name,
        message: this.message
      })
      .then(resp => {
        if(resp.data.success) {
          this.success = true;
          this.email = "";
          this.name = "";
          this.message = "";
        } else {
          this.success = false;
          this.errors = resp.data.errors;
        }
        this.loading = false;
      })
    }
  }
}
</script>

<style>

</style>