<template>
  <div>
    <div class="card-header text-info">Password Change</div>
    <div class="card-body">
      <form @submit.prevent="passwordUpdate">
        <div
          class="form-group"
          :class="{ 'form-group--error': $v.old_password.$error }"
        >
          <label class="form__label">Current Password</label>
          <input
            class="form__input"
            v-model.trim="$v.old_password.$model"
            :type="type"
          /><i @click="showPassword" :class="btnText"></i>
        </div>
        <div class="error" v-if="!$v.old_password.required">
          Current Password is required.
        </div>
        <div class="error" v-if="!$v.old_password.minLength">
          Password must have at least
          {{ $v.old_password.$params.minLength.min }} letters.
        </div>
        <div
          class="form-group"
          :class="{ 'form-group--error': $v.new_password.$error }"
        >
          <label class="form__label">New Password</label>
          <input
            class="form__input"
            v-model.trim="$v.new_password.$model"
            :type="type"
          /><i @click="showPassword" :class="btnText"></i>
        </div>
        <div class="error" v-if="!$v.new_password.required">
          Password is required.
        </div>
        <div class="error" v-if="!$v.new_password.minLength">
          Password must have at least
          {{ $v.new_password.$params.minLength.min }} letters.
        </div>
        <div
          class="form-group"
          :class="{
            'form-group--error': $v.password_confirmation.$error,
          }"
        >
          <label class="form__label">Repeat password</label>
          <input
            class="form__input"
            v-model.trim="$v.password_confirmation.$model"
            :type="type"
          /><i @click="showPassword" :class="btnText"></i>
        </div>
        <div class="error" v-if="!$v.password_confirmation.sameAsPassword">
          Passwords must be matched with previous.
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
        <p class="typo__p" v-if="submitStatus === 'PENDING'">Sending...</p>
      </form>
    </div>
  </div>
</template>
<script>
import { validationMixin } from "vuelidate";
import { required, minLength, sameAs, email } from "vuelidate/lib/validators";
export default {
  name: "PasswordChange",
  data() {
    return {
      old_password: "",
      new_password: "",
      password_confirmation: "",
      isLoggedIn: localStorage.getItem("eShop.token") != null,
      baseUrlPath: null,
      submitStatus: null,
      type: "password",
      btnText: "hide-show fas fa-eye",
    };
  },

  mixins: [validationMixin],
  validations: {
    old_password: {
      required,
      minLength: minLength(8),
    },
    new_password: {
      required,
      minLength: minLength(8),
    },
    password_confirmation: {
      sameAsPassword: sameAs("new_password"),
    },
  },
  mounted() {
    this.setDefaults();
    this.baseUrlPath = axios.defaults.baseURL;
  },

  methods: {
    setDefaults() {
      if (this.isLoggedIn) {
        let user = JSON.parse(localStorage.getItem("eShop.user"));
        this.user = user;
        this.email = user.email;
      }
    },

    passwordUpdate() {
      this.$v.$touch();
      if (this.$v.$invalid) {
        this.submitStatus = "ERROR";
      } else {
        var formData = new FormData();
        formData.append("old_password", this.old_password);
        formData.append("new_password", this.new_password);
        formData.append("password_confirmation", this.password_confirmation);
        axios
          .post("api/cutomerPasswordUpdate", formData)
          .then((response) => {
            if (response.data == "error") {
              this.$toasted.error(
                "Errors !! - Your current password doesn't matched with database",
                {
                  theme: "outline",
                  position: "top-right",
                  duration: 9000,
                }
              );
              this.$router.push({ name: "user-profile" });
            } else {
              this.$toasted.success(
                "Success !! - You have password change successfully",
                {
                  theme: "outline",
                  position: "top-right",
                  duration: 9000,
                }
              );
              this.$router.push({ name: "user-profile" });
            }
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
        this.submitStatus = "PENDING";
        setTimeout(() => {
          this.submitStatus = "OK";
        }, 900);
      }
    },

    showPassword() {
      if (this.type === "password") {
        this.type = "text";
        this.btnText = "hide-show fas fa-eye-slash";
      } else {
        this.type = "password";
        this.btnText = "hide-show fas fa-eye";
      }
    },
  },
};
</script>
<style>
i.hide-show {
  position: absolute;
  margin-top: 12px;
  margin-left: -28px;
}
</style>
