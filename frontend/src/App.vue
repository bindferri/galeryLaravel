<template>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100&family=Roboto+Slab:wght@400;800&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css">
  <router-view />
</template>
<script>
export default {
  name: 'App',
}
</script>

<style>
html{
  font-size: 10px;
  font-family: 'Roboto Slab', serif;
}

* , *::after , *::before{
  box-sizing: border-box;
}

body{
  margin: 0;
}

/* Register */

.form-card{
  display: flex;
}

.form-card--image{
  width: 50%;
}

.form-card--image img{
  width: 100%;
  height: 100vh;
  display: block;
}

.form-card--register{
  display: flex;
  flex-direction: column;
  width: 50%;
  height: 100%;
  justify-content: center;
  color: #2b2b2b;
  padding-left: 19.6rem;
  padding-top: 11.4rem;
}

.form-card--register input{
  width: 100%;
  height: 5.2rem;
  padding: 0.8rem 1rem;
  background-color: #F6F6F6;
  border: none;
  border-radius: 5px;
  outline-style: none;
  margin-bottom: 1rem;
  margin-top: 0.8rem;
  text-indent: 5.1rem;
}

.form-card--register i{
  font-size: 2rem;
  position: absolute;
  left: 2.5rem;
  top: calc(50% - 1rem);
}

.form-card--register label:not(:first-child){
  margin-top: 2rem;
}

.form-card--icons {
  position: relative;
  max-width: 57rem;
}

.form-card--register button{
  padding: 1.2rem 1rem;
  margin-top: 1.5rem;
  border-radius: 5px;
  background-color: #0F3D3E;
  color: #ffffff;
  border: none;
  cursor: pointer;
  max-width: 57rem;
  height: 5.2rem;
}

.form-card--register img{
  width: 10.3rem;
  height: 6.4rem;
  margin-bottom: 2rem;
}

.form-card--register h2{
  font-size: 3.2rem;
  font-weight: 800;
  padding-top: 3rem;
  margin: 0;
}

.form-card--register p{
  margin-top: 1.5rem;
  font-size: 1.2rem;
  margin-bottom: 0;
}

.form-card--inputs{
  display: flex;
  flex-direction: column;
  margin-top: 2.8rem;
  font-size: 1.4rem;
}

.form-card--register input::placeholder{
  font-size: 1.2rem;
}

.account-login{
  font-size: 1.4rem!important;
  margin-top: 2rem!important;
}

.account-login a{
  color: #2b2b2b;
}

/* Dashboard */

.navigation-bar{
  width: 30rem;
  background-color: #0F3D3E;
  border-top: 1px solid #F1F1F1;
}

.dashboard-content{
  background-color: #FEFBF6;
  padding-top: 5rem;
  min-height: calc(100vh - 10rem);
}

.navbar{
  height: 10rem;
  display: flex;
  justify-content: space-between;
  align-items: center;
  padding: 0 19.65rem;
  background-color: #0F3D3E;
}

.navbar img{
  width: 10rem;
}

.navbar a{
  text-decoration: none;
  font-size: 1.8rem;
  color: #2b2b2b;
  border: 1px solid #fff;
  padding: 1rem 3rem;
  border-radius: 4px;
  background-color: #ffffff;
  font-weight: 800;
}

.card{
  width: 45rem;
  height: 30rem;
  background-image: linear-gradient(rgba(0, 0, 0, 0.527),rgba(0, 0, 0, 0.5)) , url("assets/jeshoots-com--2vD8lIhdnw-unsplash.jpg");
  background-size: cover;
  transition: opacity 1s;
  border-radius: 5px;
}

.card:hover{
  background-color: #2b2b2b;
  opacity: 0.8;
}

.card:hover .card-content--more,.card:hover .card-content{
  display: none;
}

.card h3{
  margin: 0;
  color: white;
  font-size: 1.6rem;
  font-weight: 800;
}

.delete-button{
  max-height: 5rem;
}

.card:hover .delete{
  display: flex;
}

.delete{
  height: 100%;
  justify-content: center;
  align-items: center;
  display: none;
}

.card-content{
  height: 100%;
  padding: 0 3rem;
  display: flex;
  flex-direction: column;
  justify-content: flex-end;
  padding-bottom: 3em;
}

.card-content--more{
  margin-top: 5rem;
  display: flex;
  justify-content: space-between;
  align-items: center;
}

.card-content--more img{
  width: 6rem;
  height: 6rem;
  border-radius: 50%;
  object-fit: cover;
}

.card-content--more i{
  color: white;
  font-size: 2.5rem;
}

.card-content--more__icon{
  display: flex;
  align-items: center;
  gap: 1rem;
}

.row{
  padding-top: 2rem;
  padding-bottom: 5rem;
  display: flex;
  flex-wrap: wrap;
  gap: 8rem;
  justify-content: flex-start;
  padding-left: 19.65rem;
}

.create-new{
  width: 15rem;
  height: 4rem;
  border-radius: 4px;
  border: none;
  color: white;
  background-color: #0F3D3E;
  display: flex;
  justify-content: space-evenly;
  align-items: center;
  font-weight: 700;
  cursor: pointer;
}

.left{
  margin-left: 19.65rem;
}

/* Modal */

.overlay{
  background-color: rgba(0, 0, 0, 0.4);
  backdrop-filter: blur(5px);
  position: fixed;
  top: 0;
  left: 0;
  height: 100vh;
  width: 100vw;
  max-width: 100%;
}

.modal{
  position: fixed;
  height: 66.4rem;
  width: 66.4rem;
  top: calc(50% - 30rem);
  left: calc(50% - 30rem);
  border-radius: 7px;
  background-color: white;
}

.modal-form{
  display: flex;
  flex-direction: column;
  max-width: 57rem;
  height: 100%;
  padding-top: 4.7rem;
  margin: 0 auto;
}

.modal-form h2{
  font-size: 2.5rem;
  font-weight: 800;
  padding-bottom: 1.5rem;
  margin: 0;
}

.modal-form label{
  font-size: 1.4rem;
  padding-bottom: 0.5rem;
}

.modal-form label:not(:first-child){
  padding-top: 2rem;
}

.modal-form input[type=text]{
  width: 100%;
  height: 5.2rem;
  padding: 0.8rem 1rem;
  background-color: #F6F6F6;
  border: none;
  border-radius: 5px;
  outline-style: none;
  margin-bottom: 1rem;
  margin-top: 0.8rem;
  text-indent: 5.1rem;
}

.modal-form input::placeholder{
  font-size: 1.2rem;
}

.modal-form .icons{
  font-size: 2rem;
  position: absolute;
  left: 2.5rem;
  top: calc(50% - 1rem);
}

.modal-form--icons{
  position: relative;
}

.close{
  font-size: 2.5rem;
  position: absolute;
  right: 4rem;
  top: 3rem;
}

#image{
  font-weight: 800;
}

.modal-image{
  background-color: #F2F2F2;
  border-radius: 6px;
  height: 16rem;
  display: flex;
  justify-content: center;
  align-items: center;
}

#image-input{
  display: none;
}

.modal-image label{
  border: 1px solid #2b2b2b;
  border-style: dashed;
  padding: 1.5rem 12rem;
  border-radius: 10px;
}

.modal-button{
  width: 100%;
  height: 5rem;
  margin-top: 2.5rem;
}

.hidden{
  display: none;
}
</style>
