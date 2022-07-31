<template>
  <div class="navbar">
    <img src="../assets/logo.png" alt="">
    <a href="#" @click="logout">Logout</a>
  </div>
  <div class="dashboard-content">
    <button @click="modal" class="create-new left"><i class="fa-solid fa-plus"></i>Create New</button>
    <div class="row">
      <BaseCard @isDone="reloadPage" v-for="galery in data" :key="galery.id" :title="galery.title" :img="galery.fullUrl" :id="galery.id"></BaseCard>

    </div>
  </div>

  <div class="overlay" :class="{hidden: isClosed}">
    <div class="modal">

      <i @click="modal" class="fa-solid fa-xmark close"></i>
      <form action="#" enctype="multipart/form-data" class="modal-form">
        <h2>Upload new file</h2>
        <label>Title:</label>
        <div class="modal-form--icons">
          <i class="fa-solid fa-align-justify icons"></i>
          <input ref="title" type="text" placeholder="John Smith">
        </div>
        <label>Description:</label>
        <div class="modal-form--icons">
          <i class="fa-solid fa-note-sticky icons"></i>
          <input ref="description" type="text" placeholder="John Smith">
        </div>
        <label id="image">Upload your pictures</label>
        <div class="modal-form--icons modal-image">
          <label for="image-input"><img src="Icon%20awesome-image.png" alt=""></label>
          <input @change="getImageValue" type="file" id="image-input">
        </div>
        <button @click.prevent="createGalery" class="create-new modal-button">Create</button>
      </form>
    </div>
  </div>
</template>

<script>
import BaseCard from "@/components/BaseCard";
export default {
  components: {
    BaseCard
  },
  data() {
    return {
      isClosed: true,
      image: null,
      data: [],
      isDone: null,
      token: null
    }
  },
  watch: {
  },
  name: 'HelloWorld',
  methods: {
    modal() {
      this.isClosed = !this.isClosed
    },
    getImageValue(e){
      this.image = e.target.files[0]
    },
    createGalery(){
      const formData = new FormData();
      formData.append('image',this.image)
      formData.append('title',this.$refs.title.value)
      formData.append('description',this.$refs.description.value)

      fetch("http://127.0.0.1:8000/galery", {
        method: "POST",
        headers: {
          'Authorization': 'Bearer ' + this.token
        },
        body: formData
      }).then((response) => {
            if (response.ok){
              this.getData()
              this.isClosed = true;
              this.$refs.title.value = ''
              this.$refs.description.value = ''
            }
          }
      )
    },
    async getData(){
      this.token = localStorage.getItem('accessToken');
      let data = await fetch("http://127.0.0.1:8000/galery",{
        method: "GET",
        headers: {
          'Authorization': 'Bearer ' + this.token
        }
          }
      );
      this.data = await data.json();
    },
    reloadPage(){
      this.getData()
    },
    logout(){
      localStorage.removeItem("accessToken")
      this.$router.push('/login')
    }
  },
  mounted() {
    this.getData();
  },
  beforeCreate() {
    this.token = localStorage.getItem('accessToken');
    if (!this.token){
      this.$router.push('/login')
    }
  }
}
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped>

</style>
