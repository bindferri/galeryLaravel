<template>
  <div class="form-card">
    <form @submit.prevent="register" action="#" class="form-card--register" method="post">
      <img src="../assets/ao_RGB_BLAU_Schriftzug.png" alt="">
      <h2>Sign Up</h2>
      <p>Discover our journey with us!</p>
      <div class="form-card--inputs">
        <label>Name and Surname:</label>
        <div class="form-card--icons">
          <i class="fa-solid fa-user"></i>
          <input v-model="fullName" type="text" name="firstname" placeholder="John Smith">
        </div>
        <label>Email:</label>
        <div class="form-card--icons">
          <i class="fa-solid fa-envelope"></i>
          <input v-model="email" type="email" name="email" placeholder="johnsmith@gmail.com" required>
        </div>
        <label>Password:</label>
        <div class="form-card--icons">
          <i class="fa-solid fa-key"></i>
          <input v-model="password" type="password" name="password" placeholder="********" required>
        </div>
        <button type="submit">Sign Up</button>
        <p class="account-login">Have an account? <router-link to="/login">Log in</router-link></p>
      </div>
    </form>
    <div class="form-card--image">
      <img src="../assets/295838159_560611329126192_9182157527664662335_n.jpg" alt="">
    </div>
  </div>
</template>

<script>
export default {
  data(){
    return{
      fullName: null,
      email: null,
      password:null
    }
  },
  methods: {
    register(){
      const name = this.fullName.split(" ")[0];
      const lastName = this.fullName.split(" ")[1];
      const formData = new FormData();
      formData.append('first_name',name);
      formData.append('last_name',lastName);
      formData.append('email',this.email);
      formData.append('password',this.email);
      fetch('http://127.0.0.1:8000/users',{
        method: "POST",
        body: formData
      }).then((res) => {
        if (res.ok){
          this.$router.push('/login')
        }
      })
    },
  }

}
</script>

