<template>
  <div class="card">
    <div class="delete">
      <button @click.prevent="deleteGalery" class="delete-button create-new">Delete</button>
    </div>
    <div class="card-content">
      <h3>{{title}}</h3>
      <div class="card-content--more">
        <img :src="this.imagePath" alt="">
        <div class="card-content--more__icon">
          <h3>See More</h3>
          <i class="fa-solid fa-arrow-right-long"></i>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  props: ['title','img','id'],
  data(){
    return{
      imagePath: null
    }
  },
  methods: {
    deleteGalery(){
      fetch("http://127.0.0.1:8000/galery/"+ this.id,{
        method: "Delete",
      }).then((response) => {
        this.$emit('isDone',response)
      });
      this.isDone = !this.isDone;
    },
  },
  created() {
    this.imagePath = this.img;
    console.log(this.imagePath)
  }
}
</script>