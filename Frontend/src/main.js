import Vue from 'vue'
import App from './App.vue'
import VueRouter from 'vue-router'

import 'bootstrap'
import 'bootstrap/dist/css/bootstrap.min.css'
import "bootstrap-icons/font/bootstrap-icons.css"

//route konfiguráció importálása
import RouteConfig from './config/routes.js'

//route indítása
const router = new VueRouter({
  routes: RouteConfig
});

Vue.use(VueRouter);

Vue.config.productionTip = false
Vue.mixin({
  data() {
      return {
          url: "http://localhost/CipoShop/backend/backend.php"
      }
  },
  methods: {

  }
});
import axios from 'axios';
axios.defaults.withCredentials=true;

new Vue({
  router: router,
  render: h => h(App),
  data:{
    loginAccessLevel: null,
    loginUserName: null,
  },
  created(){
    this.getUser();
  },
  methods:{
    getUser(){
      axios
        .get(this.url, {
          params: {
            query: "getUser",
          },
        })
        .then((res) => {

          this.loginAccessLevel = res.data.loginAccessLevel;
          this.loginUserName = res.data.loginUserName;
        })
    }
  }
}).$mount('#app')
