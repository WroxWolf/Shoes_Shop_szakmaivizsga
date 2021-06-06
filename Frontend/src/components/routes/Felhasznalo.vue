<template>
  <div class="container-fluid szovegTipus">
    <div class="row mt-5">
      <!-- IMAGE CONTAINER BEGIN -->
      <div
        class="col-lg-6 col-md-6 d-none d-md-block infinity-image-container"
      >
      </div>
      <!-- IMAGE CONTAINER END -->

      <!-- FORM CONTAINER BEGIN -->
      <div class="col-lg-6 col-md-6 infinity-form-container">
        <div class="col-lg-9 col-md-12 col-sm-8 col-xs-12 infinity-form">
          <!-- Company Logo -->
          <div class="text-center mb-4">
            <h4>Bejelentkezés</h4>
          </div>
          <!-- Form -->
          <form class="px-3" @submit.prevent="Login()">
            <!-- Input Box -->
            <div class="form-input">
              <span><i class="bi bi-person-fill"></i></span>
              <input
                type="email"
                name=""
                placeholder="Email cím"
                tabindex="10"
                v-model="email"
                required
              />
            </div>
            <div class="form-input">
              <span><i class="bi bi-shield-lock-fill"></i></span>
              <input type="password" 
              v-model="password"
              name="" placeholder="******" required />
            </div>
            <div class="row mb-3">
              <!--Remember Checkbox -->
              <div class="col-auto d-flex align-items-center"></div>
            </div>

            <!-- Login Button -->
            <div class="mx-auto text-center">
              <button type="submit" class="btn btn-block">Bejelentkezés</button>
            </div>
            <!-- Forget Password -->

            <div class="text-center mb-2">
              <div class="text-center mb-3" style="color: #777">
                Jelentkezen be:
              </div>

              <!-- Facebook Button -->
              <a href="" class="btn btn-social btn-facebook"><i class="bi bi-facebook"></i></a>

              <!-- Google Button -->
              <a href="" class="btn btn-social btn-google"><i class="bi bi-google"></i></a>

              <!-- Twitter Button -->
              <a href="" class="btn btn-social btn-twitter"><i class="bi bi-twitter"></i></a>
            </div>

            <div class="text-center mb-5" style="color: #777">
              Nincs fiokja?
              <a class="register-link" href="#"
                >Regisztráljon most!!</a
              >
            </div>
          </form>
        </div>
        <!-- FORM END -->
      </div>
      <!-- FORM CONTAINER END -->
    </div>
  </div>
</template>

<script>
import axios from 'axios';
axios.defaults.withCredentials=true;

export default {
  data(){
    return{
      email: null,
      password: null,
    }
  },
  methods:{
    Login(){
      axios.get(this.url,{
        params:{
          query:"loginUser",
          email:this.email,
          password: this.password,
        }
      }).then(
        (res)=>{
          this.$root.$data.loginAccessLevel = res.data.loginAccessLevel;
          this.$root.$data.loginUserName = res.data.loginUserName;
          this.$router.push({ name: "home" });
        }
      )
    }
  }
};
</script>

<style>
.infinity-image-container p{
  margin-top: 255px;
}
.szovegTipus{
  font-family: 'Sigmar One', cursive;
}
.infinity-image-container{
	background-image: url("../../assets/undraw_Login_re_4vu2.png");
	background-size: cover;
	height: 75vh;
}

.infinity-form-container{
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
}

.infinity-form{
	display: flex;
    flex-direction: column;
    justify-content: center;
    min-height: 100vh;
}

.infinity-form h4 {
    font-weight: bold;
}

.infinity-form .form-input {
    position: relative;
}

.infinity-form .form-input input {
    width: 100%;
    margin-bottom: 20px;
    height: 40px;
    border: none;
    border-bottom: 2px solid #777;
    outline: none;
    background: transparent;
    padding-left: 40px;
    font-weight: bold;
    color: #777;
}

.infinity-form .form-input span {
    position: absolute;
    top: 8px;
    padding-left: 10px;
    color: #777;
}

.infinity-form .form-input input:focus,
.infinity-form .form-input input:valid {
    border-bottom: 2px solid #4285f4;   
}

.infinity-form .custom-checkbox .custom-control-input:checked ~ .custom-control-label::before {
  background-color: #4285f4 !important;
  border:0px;
}

.infinity-form button[type="submit"] {
    margin-top: 10px;
    border: none;
    cursor: pointer;
    border-radius: 20px;
    background: linear-gradient(45deg, #000000, #5c5c5d);  
    color: #fff;
    font-weight: bold;
    transition: 0.5s;
}

.infinity-form button[type="submit"]:hover {
    background: linear-gradient(45deg, #5c5c5d, #000000); 
}

.forget-link , .login-link , .register-link {
    color: #5c5c5d;
    font-weight: bold;
}

.forget-link:hover , .login-link:hover , .register-link:hover {
    color: #000000;
    text-decoration: none;
}

.infinity-form .btn-social {
    color: white;
    border: 0;
    display: inline-block;
    margin: 0px;
    margin-right: 10px;
    font-weight: bold;
    padding: 0px 5px;
    margin-bottom: 10px;
}

.infinity-form .btn-facebook {
    color: #4866a8;
}

.infinity-form .btn-google {
    color: #da3f34;
}

.infinity-form .btn-twitter {
    color: #33ccff;
}

.infinity-form .btn-facebook:hover {
    color: white;
    background: hsla(221, 40%, 40%, 1);
}

.infinity-form .btn-google:hover {
    color: white;
    background: hsla(4, 59%, 47%, 1);
}

.infinity-form .btn-twitter:hover {
    color: white;
    background: hsla(195, 78%, 54%, 1);
}
</style>