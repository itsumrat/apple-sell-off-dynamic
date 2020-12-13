<template>
  <div>
    <header
      class="page-header page-header-compact page-header-light border-bottom bg-white mb-4"
    >
      <div class="container-fluid">
        <div class="page-header-content">
          <div class="row align-items-center justify-content-between pt-3">
            <div class="col-auto mb-3">
              <h1 class="page-header-title">
                <div class="page-header-icon">
                  <i data-feather="user"></i>
                </div>
                My Account - Profile
              </h1>
            </div>
          </div>
        </div>
      </div>
    </header>
    <!-- Main page content-->
    <div class="container mt-4">
      <!-- Account page navigation-->
      <nav class="nav nav-borders">
        <router-link class="nav-link" :to="{ name: 'user-profile' }"
          >Profile</router-link
        >
        <router-link class="nav-link" :to="{ name: 'orderlist' }"
          >Order List</router-link
        >
      </nav>
      <hr class="mt-0 mb-4" />
      <div class="row">
        <div class="col-xl-8">
          <!-- Account details card-->
          <div class="card mb-4">
            <div class="card-header text-info">Account Details</div>
            <div class="card-body">
              <form @submit.prevent="profileUpdate">
                <!-- Form Row-->
                <div class="form-row">
                  <div class="form-group col-md-6">
                    <label class="form__label small mb-1" for="name"
                      >Name</label
                    >
                    <input
                      class="form__input"
                      id="name"
                      name="name"
                      type="text"
                      placeholder="Enter your name"
                      v-model="customer.name"
                    />
                  </div>
                  <div
                    class="form-group col-md-6"
                    :class="{
                      'form-group--error': $v.email.$error,
                    }"
                  >
                    <label class="form__label small mb-1" for="email"
                      >Email</label
                    >
                    <input
                      class="form__input"
                      id="email"
                      name="email"
                      type="email"
                      placeholder="Enter your email"
                      v-model.trim="$v.email.$model"
                    />
                    <small
                      class="error form-text text-danger"
                      v-if="!$v.email.email"
                      >Email must have valid.</small
                    >
                  </div>
                </div>
                <!-- Form Row        -->
                <div class="form-row">
                  <div class="form-group col-md-6">
                    <label class="form__label small mb-1" for="phone"
                      >Phone</label
                    >
                    <input
                      class="form__input"
                      id="phone"
                      name="phone"
                      type="text"
                      placeholder="Enter your phone"
                      v-model="customer.phone"
                    />
                  </div>
                </div>
                <button
                  class="button"
                  type="submit"
                  :disabled="submitStatus === 'PENDING'"
                >
                  Submit!
                </button>
                <p class="typo__p" v-if="submitStatus === 'OK'">
                  Thanks for your submission!
                </p>
                <p class="typo__p" v-if="submitStatus === 'ERROR'">
                  Please fill the form correctly.
                </p>
                <p class="typo__p" v-if="submitStatus === 'PENDING'">
                  Sending...
                </p>
              </form>
            </div>
          </div>
        </div>
        <div class="col-xl-4">
          <!-- Profile picture card-->
          <div class="card">
            <password-change></password-change>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>
<script>
import PasswordChange from "./PasswordChange.vue";
import { validationMixin } from "vuelidate";
import { required, minLength, sameAs, email } from "vuelidate/lib/validators";
export default {
  name: "UserProfile",
  components: {
    PasswordChange,
  },
  data() {
    return {
      customer: "",
      user: "",
      email: "",
      isLoggedIn: localStorage.getItem("eShop.token") != null,
      baseUrlPath: null,
      submitStatus: null,
    };
  },

  mixins: [validationMixin],
  validations: {
    email: {
      required,
      email,
    },
  },
  mounted() {
    this.loadCustomer();
    this.setDefaults();
    this.baseUrlPath = axios.defaults.baseURL;
  },

  methods: {
    setDefaults() {
      if (this.isLoggedIn) {
        let user = JSON.parse(localStorage.getItem("eShop.user"));
        this.user = user;
      }
    },

    loadCustomer() {
      axios
        .get("api/customer/")
        .then((response) => {
          this.customer = response.data;
          this.email = this.customer.email;
        })
        .catch((error) => {
          this.$toasted.error("Errors !! -" + error.response.data.message, {
            theme: "outline",
            position: "top-right",
            duration: 9000,
          });
        });
    },

    profileUpdate() {
      this.$v.$touch();
      if (this.$v.$invalid) {
        this.submitStatus = "ERROR";
      } else {
        var formData = new FormData();
        formData.append("name", this.customer.name);
        formData.append("email", this.email);
        formData.append("phone", this.customer.phone);
        axios
          .post("api/cutomerProfileUpdate", formData)
          .then((response) => {
            this.loadCustomer();
            this.$router.push({ name: "user-profile" });
            //window.location.reload();
            this.$toasted.success(
              "Success !! - You have profile updated successfully",
              {
                theme: "outline",
                position: "top-right",
                duration: 9000,
              }
            );
            this.submitStatus = "PENDING";
            setTimeout(() => {
              this.submitStatus = "OK";
            }, 900);
          })
          .catch((error) => {
            if (error.response.status == 422) {
              this.$toasted.error(
                "Errors !! -" + error.response.data.errors.email,
                {
                  theme: "outline",
                  position: "top-right",
                  duration: 9000,
                }
              );
            }
          });
      }
    },
  },
};
</script>
