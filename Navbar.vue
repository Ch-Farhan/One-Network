<script setup>
import ButtonLink from "../components/ButtonLink.vue";
</script>

<template>
  <nav id="navbar">
    <div class="nav_upper_menu clearfix container">
      <div class="custom_logo">
        <RouterLink to="/">
          <img src="../assets/images/logo.png" />
        </RouterLink>
      </div>
      <div class="desktop-menu">
        <ul>
          <li class="dropdown menu-item">
            <RouterLink to="/">Home</RouterLink>
          </li>
          <li class="dropdown menu-item">
            <a href="#" class="">How it works</a>
          </li>
          <li class="dropdown menu-item">
            <a href="#" class="">Portfolio</a>
          </li>
          <li class="dropdown menu-item">
            <RouterLink to="/business-profile-creator">Creators</RouterLink>
          </li>
          <li class="dropdown menu-item">
            <RouterLink to="/about">About us</RouterLink>
          </li>
          <li class="dropdown menu-item" v-if="this.logoutShow">
            <RouterLink to="/dashboard">Dashboard</RouterLink>
          </li>
          <!-- <li class="dropdown menu-item">
                        <a href="#!" data-toggle="modal" data-target="#modalLogin">Login</a>
                        <RouterLink to="/dashboard">Login</RouterLink>
                        <a href="#">Login </a>
                    </li> -->
          <li class="dropdown menu-item">
            <!-- Button trigger modal -->
            
            <button type="button" v-if="!this.logoutShow"  data-toggle="modal" data-target="#modalLogin" >
                <!-- <a href="#!">Login</a> -->
                login  
            </button>
            <button type="button"  @click="LogOut()" v-else> log out </button>
           
            <!-- <div class="modal fade"  id="modalLogin" tabindex="-1" role="dialog" aria-labelledby="modalLoginLabel" aria-hidden="true"> -->
            <div
              class="modal fade modal_login"
              id="modalLogin"
              tabindex="-1"
              role="dialog"
              aria-labelledby="modalLoginLabel"
              aria-hidden="true"
            >
              <div class="modal-dialog modal-md" role="document">
                <div class="modal-content">
                  <div class="modal-heading">
                    <h2 class="modal-title d-flex justify-content-center">
                      Login
                    </h2>
                    <button
                      type="button"
                      class="close"
                      data-dismiss="modal"
                      aria-label="Close"
                    >
                      <span aria-hidden="true">×</span>
                    </button>
                  </div>
                  <form
                    v-on:submit.prevent="Login"
                    class="modal-body text-center con_form_body"
                  >
                    <div class="form-group">
                      <br />
                      <input
                        type="text"
                        v-model="loginObj.email"
                        class="form-control"
                        placeholder="Email"
                      />
                    </div>
                    <div class="form-group">
                      <input
                        type="password"
                        v-model="loginObj.password"
                        class="form-control"
                        placeholder="Password"
                      />
                    </div>
                    <a href="#!"
                      ><p class="text-primary mb-0">Forgot your password?</p></a
                    >
                    <p id="error">{{ this.errorMessage }}</p>

                    <ButtonLink type="submit" class="btn_input">
                      <template #inputButton>
                        <input
                          type="submit"
                          value="Sign In"
                          class="btn_submit"
                        />
                      </template>
                    </ButtonLink>
                  </form>
                  <div
                    class="modal-footer mt-0"
                    style="position: relative; top: 8px; left: -10px"
                  >
                    Already have an account?
                    <a href="#!" class="text-primary">Sign Up</a>
                  </div>
                </div>
              </div>
            </div>
            <!-- <a href="#!" data-toggle="modal" data-target="#modalLogin">Login</a> -->
            <!-- <RouterLink to="/dashboard">Login</RouterLink> -->
            <!-- <a href="#">Login </a> -->
          </li>
        </ul>
        <div class="respon_btn" v-if="!this.logoutShow">
          <ButtonLink
            type="link"
            text="Sign up"
            link="signup"
            class="nav_start btn_signup"
          />
        </div>
      </div>
    </div>

    <div class="topest-menu">
      <div class="container">
        <div class="tbl">
          mobile logo
          <div class="mob_front_logo">
            <RouterLink to="/">
              <img src="../assets/images/logo.png" />
            </RouterLink>
          </div>
          end
          <div class="top-menu">
            <div id="burger" class="burger">
              <div class="bar one topBar"></div>
              <div class="bar two midBar"></div>
              <div class="bar three btmBar"></div>
            </div>
          </div>
        </div>
        navigation onclick for Desktop
      </div>
    </div>
  </nav>
</template>

<style>
/* .text{
    text-align: center;
} */
.btn_orrange_popup {
  background: #f99911;
  position: relative;
  top: 0px;
  left: 70px;
  height: 40px;
  width: 50px;
}
.modal-title {
  margin: -8px 0px -6px 133px;
}
.highlighted_menu:after {
  visibility: hidden !important;
  -webkit-transform: scaleX(1) !important;
  transform: scaleX(1) !important;
  width: 29% !important;
  background: #f99911 !important;
}
.desktop-menu a:hover:after {
  visibility: hidden;
  -webkit-transform: scaleX(1);
  transform: scaleX(1);
}

.modal_login .modal-dialog {
  width: 400px !important;
  /* height: 450px !important; */
}

.modal_login .modal-content {
  border-radius: 40px;
}

.modal_login .modal-heading {
  display: flex;
  justify-content: space-between;
  align-items: center;
  padding: 15px 25px 15px 25px;
}

.nav_upper_menu li span {
  vertical-align: middle;
  margin-right: 0px;
}

.modal_login .close {
  position: relative;
  width: 25px;
  height: 25px;
  /* margin: 10px 15px 5px 0px; */
  /* margin-top: 10px;
  margin-bottom: 10px;
  margin-right: 0px; */
  margin-left: 4px;
  font-family: none;
  line-height: 0;
  /* padding: 5px 35px 25px 25px; */
  color: #fff;
  background: #f99911;
  border-radius: 50px;
  padding: 5px;
  opacity: 1;
}

.modal_login .modal-body {
  /* padding: 5px 30px 40px 50px; */
  padding: 0px 25px;
  border-top: 2px solid #f3f3f3;
  border-bottom: 2px solid #f3f3f3;
}

.modal_login input {
  font-weight: bold;
}

.modal_login .modal-footer {
  border-top: 0;
  text-align: center !important;
  padding: 5px 30px 20px 50px;
  font-weight: bold;
}

.modal_login .con_form_body .form-control {
  border-color: #dfdfdf;
  padding: 6px 20px;
}

.modal_login .con_form_body .form-control:focus {
  border-color: #f99911;
}

.desktop-menu ul li > button {
  color: #909090;
  background: transparent;
  padding: 0px 0 5px 0;
  text-decoration: none;
  transition: 0.3s;
  position: relative;
  display: block;
  margin-right: 30px;
  text-transform: uppercase;
  position: relative;
  font-family: Nexa-Bold;
  font-style: normal;
  font-weight: bold;
  font-size: 14px;
  line-height: 21px;
  letter-spacing: 0.05em;
  text-transform: uppercase;
}

.desktop-menu .dropdown-menu > li:last-child > button {
  border-bottom: none;
}

.desktop-menu li:last-child > button {
  padding-right: 0;
  border-right: 0;
  margin-left: 40px;
  color: #010101;
}

#error {
    color: #FF5733;
    font-size: 13px;
}
</style>


<script>
export default {
  data() {
    return {
      loginObj: {
        email: "",
        password: "",
      }, 
      errorMessage: "",
      logoutShow: false,
    };
  },
  methods: { 

    async Login(e) {
      e.preventDefault();
      const body = document.querySelector("body");
      const loginModal = document.querySelector(".modal_login");

      await axios
        .post("/api/client_login", this.loginObj)
        .then(( {config,data} ) => { 
          
          // Gurad Claus  
          if (!data.status) return this.errorMessage = data;  
          
          // SaveToken With Email
          const {email} = JSON.parse(config.data); 
            const $token = data.data.token;  
            const combo = `${$token}+UE+${email}` 
            localStorage.setItem('$valid', combo)

            // Hide Logout
            this.logoutShow = true; 

            // Remove Error
            this.errorMessage = '';

            // Remove Modal Class in body
            body.classList.remove("modal-open");
            body.style.paddingRight = 0;
            // Remove Modal
            loginModal.classList.add("in");
            loginModal.style.display = "none";

            // Destination Route
            this.$router.push("/dashboard");          
        })
        .catch((err) => {
            if (err) return this.errorMessage = 'Please enter valid Email and Password'; 
        });
    },

    async LogOut() {
        await axios
        .get("/logout").then(res => { 
            localStorage.removeItem('$valid')   
            this.logoutShow = false;
            this.$router.push("/");   
        }).catch((err)=> {
            localStorage.removeItem('$valid')   
            this.logoutShow = false;
            this.$router.push("/");  
        })
    },

    updateMenu() {
      if (localStorage.getItem("$valid")) {
          return this.logoutShow = true;
        }
    }
  },  

  mounted() {
    this.updateMenu();
  } 
};
</script>


