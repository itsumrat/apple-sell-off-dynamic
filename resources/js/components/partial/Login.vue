<template>
  <div>
    <div class="container">
      <div class="row">
        <div class="col-md-6 offset-md-3 mt-2">
          <div class="card">
            <div class="card-header text-uppercase text-info">
              Login Form
            </div>
            <div class="card-body">
              <form>
                <div class="form-group" :class="{ 'form-group--error': $v.email.$error }">
                  <label class="form__label" for="email">Email</label>
                  <input id="email" class="form__input" v-model.trim="$v.email.$model"/>
                </div>
                <div class="error" v-if="!$v.email.required">
                  <p>Email is required</p>
                </div>
                <div class="error" v-if="!$v.email.email">Email must have valid.</div>
                <div class="form-group" :class="{ 'form-group--error': $v.password.$error }">
                  <label class="form__label">Password</label>
                  <input class="form__input" v-model.trim="$v.password.$model" :type="type" /><i @click="showPasswordl" :class="btnText"></i>
                </div>
                <div class="error" v-if="!$v.password.required">Password is required.</div>
                <div class="error" v-if="!$v.password.minLength">Password must have at least {{ $v.password.$params.minLength.min }} letters.</div>
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="remember-me" class="text-info"><span>Remember me</span> <span><input id="remember-me" name="remember-me" type="checkbox"></span></label><br>
                      <button @click="handleSubmit" class="button" type="submit" :disabled="submitStatus === 'PENDING'">Submit!</button>
                      <p class="typo__p" v-if="submitStatus === 'OK'">Thanks for your submission!</p>
                      <p class="typo__p" v-if="submitStatus === 'ERROR'">Please fill the form correctly.</p>
                      <p class="typo__p" v-if="submitStatus === 'PENDING'">Sending...</p>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div id="register-link" class="text-right">
                      <a href="#" class="text-warning">Forgot password?</a>
                    </div>
                    <hr>
                    <div id="register-link" class="text-right">
                      <router-link :to="{name: 'sign-up'}" class="text-info">Register here</router-link>
                      <p class="text-sm">Don't have an account?</p>
                    </div>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>
<script>
import { mapActions, mapGetters } from "vuex";
import { required, minLength, email } from "vuelidate/lib/validators";
	export default {
		name: "Login",
		data () {
			return {
				email: "",
				password: "",
        submitStatus: null,
        type: 'password',
        btnText: 'hide-show fas fa-eye'
			}
		},
        validations: {
            email: {
              required,
              email
            },
            password: {
              required,
              minLength: minLength(8)
            }
        },
		methods: {
            handleSubmit(e) {
                e.preventDefault()
                this.$v.$touch()
                if (this.$v.$invalid) {
                    this.submitStatus = 'ERROR'
                } else {
                    if (this.password.length > 0) {
                        let email = this.email;
                        let password = this.password;
                        let self = this;
                        axios.post('api/signIn', {email, password}).then(response => {
                            let user = response.data.user;
                            localStorage.setItem('eShop.user', JSON.stringify(user));
                            localStorage.setItem('eShop.token', response.data.token);
                            self.$store.dispatch("authcheck/setUser", response.data.user);
                            self.$store.dispatch("authcheck/setToken", response.data.token);
                            axios.defaults.headers.common["Authorization"] = `Bearer ${this.tokenHeader}`;

                            if (localStorage.getItem('eShop.token') != null) {
                                this.$emit('loggedIn')
                                if (this.$route.params.nextUrl != null) {
                                    this.$router.push(this.$route.params.nextUrl);
                                } else {
                                    this.$toasted.success("Customer Successfully login!");
                                    this.$router.push({name: 'user-profile'});
                                    window.location.reload();
                                }
                            }else {
                                this.$router.push(this.$route.params.nextUrl);
                            }
                        })
                        .catch(error => {
                            this.$toasted.error("Errors !! -" + error.response.data.error, {
                                             theme: "outline",
                                             position: "top-right",
                                             duration : 9000
                                        });
                            if (error.response.status == 422) {
                              this.errors = error.response.data.errors;
                            }
                        });
                    }
                }

            },

            showPasswordl() {
               if(this.type === 'password') {
                  this.type = 'text'
                  this.btnText = 'hide-show fas fa-eye-slash'
               } else {
                  this.type = 'password'
                  this.btnText = 'hide-show fas fa-eye'
               }
           }
        },
        computed: {
            ...mapGetters({
              tokenHeader: "authcheck/token"
            }),
        }
	};
</script>
