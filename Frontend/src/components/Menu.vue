<template>
<nav class="navbar sticky-top nav-tabs navbar-expand-lg navbar-dark bg-dark">
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark m-1">
  <div class="container-fluid">
    <router-link class="navbar-brand" to="/">Főoldal</router-link>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <router-link class="nav-link" aria-current="page" to="/cards/">Termékek</router-link>
        </li>
         <li v-if="loginAccessLevel==1" class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Adat kezelés
          </a>
          <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="navbarDropdown">
          <li><router-link class="dropdown-item" to="/CipoTabla/">Cipő tábla</router-link></li>
          <li><router-link class="dropdown-item" to="/MarkaTabla/">Márka tábla</router-link></li>
          <li><router-link class="dropdown-item" to="/MeretTabla/">Méret tábla</router-link></li>
          <li><router-link class="dropdown-item" to="/SzinTabla/">Szín tábla</router-link></li>
          <li><router-link class="dropdown-item" to="/TipusTabla/">Tipus tábla</router-link></li>
          </ul>
        </li>
        <li v-if="loginAccessLevel>0" class="nav-item">
          <router-link class="nav-link" to="/Kosar/"><i class="bi bi-cart"></i><sup class="sup">0</sup></router-link>
        </li>
        <li class="nav-item dropdown">
          <!-- <router-link class="nav-link" to="/Felhasznalo/"></router-link> -->
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            <i class="bi bi-person-circle"></i>
          </a>
          <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="navbarDropdown">
          <li v-if="loginAccessLevel==0"><router-link class="dropdown-item" to="/Felhasznalo/">Bejelentkezés</router-link></li>
          <li @click="logout()" v-if="loginAccessLevel>0" class="dropdown-item">Kijelentkezés</li>
          </ul>
        </li>
      </ul>
    </div>
  </div>
</nav>
</nav>
</template>

<script>
import axios from 'axios';
axios.defaults.withCredentials=true;

export default {
  computed:{
    loginAccessLevel() {
      return this.$root.$data.loginAccessLevel;
    },
  },
  methods:{
    logout(){
      axios.get(this.url,{
        params:{
          query:"logoutUser",
        }
      }).then(
        (res)=>{
          this.$root.$data.loginAccessLevel = res.data.loginAccessLevel;
          this.$root.$data.loginUserName = res.data.loginUserName;
          if (this.$route.name != "home") this.$router.push({ name: "home" });
        }
      )
    }
  }
}
</script>

<style>
  .navbar-expand-lg .navbar-nav .nav-link {
    margin-left: 10px;
}
.sup{
  color: red;
}
.navbar{
  font-family: 'Sigmar One', cursive;
}
</style>