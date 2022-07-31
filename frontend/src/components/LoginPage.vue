<template>
  <div class="form-card">
    <form @submit.prevent="logIn" action="#" class="form-card--register" method="post">
      <img src="../assets/ao_RGB_BLAU_Schriftzug.png" alt="">
      <h2>Login</h2>
      <p>Discover our journey with us!</p>
      <div class="form-card--inputs">
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
        <button type="submit">Login</button>
        <p class="account-login">Still don't have an account? <router-link to="/register">Sign up</router-link></p>
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
    logIn(){
      const formData = new FormData();
      formData.append('email',this.email);
      formData.append('password',this.email);
      fetch("http://127.0.0.1:8000/login",{
        method: "POST",
        body: formData
      }).then(response => response.json()).then(data => {
          if (data.success !== false){
            localStorage.setItem('accessToken',data.access_token)
            this.$router.push('/dashboard')
            console.log(data)
          }

      }).catch(e => console.log(e))
    }
  }

}
</script>

