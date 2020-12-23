<template>
  <div>
    <div class="container">
      <div class="row">
          <div class="col-12">
              <div class="page-title">
                  <h1>sign in</h1>
              </div>
          </div>
        <div class="col-md-6 offset-md-3 mt-2">
          <div class="card">
            <div class="card-header text-uppercase text-info">
              Registration Form
            </div>
            <div class="card-body">
              <form @submit.prevent="register">
                <div class="form-group" :class="{ 'form-group--error': $v.name.$error }">
                  <label class="form__label">Name</label>
                  <input class="form__input" v-model.trim="$v.name.$model"/>
                </div>
                <div class="error" v-if="!$v.name.required">
                  <p>Name is required</p>
                </div>
                <div class="error" v-if="!$v.name.minLength">Name must have at least {{$v.name.$params.minLength.min}} letters.</div>
                <div class="form-group" :class="{ 'form-group--error': $v.email.$error }">
                  <label class="form__label">Email</label>
                  <input class="form__input" v-model.trim="$v.email.$model"/>
                </div>
                <div class="error" v-if="!$v.email.required">
                  <p>Email is required</p>
                </div>
                <div class="error" v-if="!$v.email.email">Email must have valid.</div>
                <div class="form-group" :class="{ 'form-group--error': $v.password.$error }">
                  <label class="form__label">Password</label>
                  <input class="form__input" v-model.trim="$v.password.$model" :type="type" /><i @click="showPasswordr" :class="btnText"></i>
                </div>
                <div class="error" v-if="!$v.password.required">Password is required.</div>
                <div class="error" v-if="!$v.password.minLength">Password must have at least {{ $v.password.$params.minLength.min }} letters.</div>
                <div class="form-group" :class="{ 'form-group--error': $v.password_confirmation.$error }">
                  <label class="form__label">Repeat password</label>
                  <input class="form__input" v-model.trim="$v.password_confirmation.$model" :type="type"/><i @click="showPasswordr" :class="btnText"></i>
                </div>
                <div class="error" v-if="!$v.password_confirmation.sameAsPassword">Passwords must be identical.</div>
                <div class="form-check mb-3">
                  <input type="checkbox" class="form-check-input" v-model="user_type" value="Vendor">
                  <label class="form-check-label">If you want as a vendor please checked it!</label>
                </div>
                <button class="button" type="submit" :disabled="submitStatus === 'PENDING'">Submit!</button>
                <p class="typo__p" v-if="submitStatus === 'OK'">Thanks for your submission!</p>
                <p class="typo__p" v-if="submitStatus === 'ERROR'">Please fill the form correctly.</p>
                <p class="typo__p" v-if="submitStatus === 'PENDING'">Sending...</p>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import { validationMixin } from 'vuelidate';
import { required, minLength, sameAs, email } from "vuelidate/lib/validators";

export default {
  data() {
    return {
      name: '',
      email: '',
      password: '',
      password_confirmation: '',
      user_type: '',
      submitStatus: null,
      type: 'password',
      btnText: 'hide-show fas fa-eye'
    }
  },
  validations: {
    name: {
      required,
      minLength: minLength(4)
    },
    email: {
      required,
      email
    },
    password: {
      required,
      minLength: minLength(8)
    },
    password_confirmation: {
      sameAsPassword: sameAs('password')
    }
  },
  methods: {
    register() {
      this.$v.$touch()
      if (this.$v.$invalid) {
        this.submitStatus = 'ERROR'
      } else {
  		if (this.user_type == true) {
  			 var userType = 'Vendor';
      	}else {
      		var userType = 'Customer';
      	}

  		var formData = new FormData();
      	formData.append("name", this.name);
      	formData.append("email", this.email);
      	formData.append("user_type", userType);
      	formData.append("password", this.password);
      	formData.append("password_confirmation", this.password_confirmation);
      	axios.post("api/signUp", formData)
        .then(response => {
          this.$toasted.success("Success !! - You have registered successfully! Please login with form!", {
                 theme: "outline",
                 position: "top-right",
                 duration : 9000
            });
          this.$router.push({name: 'home'});
          window.location.reload();
        })
        .catch(error => {
            if (error.response.status == 422) {
              this.$toasted.error("Errors !! -" + error.response.data.errors.email, {
	                 theme: "outline",
	                 position: "top-right",
	                 duration : 9000
	            });
            }
      	});
        this.submitStatus = 'PENDING'
        setTimeout(() => {
          this.submitStatus = 'OK'
        }, 900)
      }
    },

    showPasswordr() {
         if(this.type === 'password') {
            this.type = 'text'
            this.btnText = 'hide-show fas fa-eye-slash'
         } else {
            this.type = 'password'
            this.btnText = 'hide-show fas fa-eye'
         }
     }
  }
};
</script>
