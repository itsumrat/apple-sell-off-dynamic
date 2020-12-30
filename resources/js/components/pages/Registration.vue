<template>
    <div>
        <section id="banner-contact">
        </section>
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="page-title">
                        <h1>sign in</h1>
                    </div>
                </div>
                <div class="col-lg-3"></div>
                <div class="col-lg-6 col-md-6">
                    <div class="registration-area">
                        <h4>New Customer?</h4>
                        <form @submit.prevent="Register()">
                            <div class="form-group">
                                <label for="phone">Name*</label>
                                <input type="text" class="form-control" v-model="form.name" id="name"
                                       placeholder="Name">
                                <span class="text-danger" v-if="Errors.name" v-text="Errors.name[0]"></span>
                            </div>
                            <div class="form-group">
                                <label for="loginEmail">Email Address*</label>
                                <input type="email" class="form-control" v-model="form.email" name="email"
                                       id="loginEmail" placeholder="Email">
                                <span class="text-danger" v-if="Errors.email" v-text="Errors.email[0]"></span>
                            </div>
                            <div class="form-group">
                                <label for="phone">Phone*</label>
                                <input type="text" class="form-control" v-model="form.phone" id="phone"
                                       placeholder="Phone">
                                <span class="text-danger" v-if="Errors.phone" v-text="Errors.phone[0]"></span>
                            </div>
                            <div class="form-group">
                                <label for="address">Address*</label>
                                <textarea class="form-control" v-model="form.address" id="address"
                                          placeholder="Address"></textarea>
                                <span class="text-danger" v-if="Errors.address" v-text="Errors.address[0]"></span>
                            </div>
                            <div class="form-group">
                                <label for="password">Password*</label>
                                <input type="password" v-model="form.password" class="form-control mb-3" id="password"
                                       placeholder="Password">
                                <span class="text-danger" v-if="Errors.password" v-text="Errors.password[0]"></span>
                            </div>
                            <div class="form-group">
                                <label for="password_confirmation">Confirm Password*</label>
                                <input type="password" v-model="form.password_confirmation" class="form-control mb-3"
                                       id="password_confirmation" placeholder="Confirm Password">
                                <span class="text-danger" v-if="Errors.password" v-text="Errors.password[0]"></span>
                                <small>Your personal data will be used to support your experience throughout this
                                    website, to manage acces to your account, and for other purposes described in our <a
                                        href="policy.php">privacy policy</a></small>
                            </div>
                            <button type="submit" class="btn">Register</button>
                        </form>
                    </div>
                </div>
                <div class="col-lg-3"></div>
            </div>
        </div>
    </div>
</template>
<script>
export default {
    name: 'register',
    data() {
        return {
            form: {
                name: '',
                phone: '',
                email: '',
                address: '',
                password: '',
                password_confirmation: '',
            },
            Errors: [],
        }
    },
    methods: {
        Register() {
            const _this = this;
            axios.post('/api/register', _this.form)
                .then((response) => {
                    if (response.data.status == 200) {
                        this.$toasted.success("Success !! - You have registered successfully! Please login with form!", {
                            theme: "outline",
                            position: "top-right",
                            duration: 9000
                        });
                        this.$router.push({name: 'login'});
                        window.location.reload();
                    } else {
                        _this.Errors = response.data.errors;
                    }
                    console.log(response);
                })
                .catch((error) => {
                    console.log(error);
                })
        },
    },
    created() {

    }
}
</script>
