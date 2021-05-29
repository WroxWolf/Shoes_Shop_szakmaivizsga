<template>
  <div id="app" class="container-fluid p-0">
    <Header></Header>
    <Menu></Menu>
    <router-view></router-view>
    <Footer></Footer>
  </div>
</template>

<script>
import Footer from './components/Footer.vue'
import Header from './components/Header.vue'
import Menu from './components/Menu.vue'

export default {
  name: 'App',
  components: {
    Footer,
    Header,
    Menu
  }
}
</script>

<style>
  
</style>
