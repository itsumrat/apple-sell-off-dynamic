<template>
    <div>
        <section id="banner-contact">
        </section>
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="page-title">
                        <h1>Profile</h1>
                    </div>
                </div>

                <div class="col-md-3 mt-2">
                    <table class="table table-bordered">
                        <tr>
                            <td @click="OpenTab('dashboard')">Dashboard</td>
                        </tr>
                        <tr>
                            <td @click="OpenTab('order')">Orders</td>
                        </tr>
                        <tr>
                            <td>Addresses</td>
                        </tr>
                        <tr>
                            <td @click="OpenTab('profile_edit')">Account Details</td>
                        </tr>
                        <tr>
                            <td @click="logOut()">Logout</td>
                        </tr>
                    </table>
                </div>

                <div class="col-md-9 mt-2" v-if="active_tab == 'dashboard'">
                    <div class="card">
                        <div class="card-header text-uppercase text-info">
                            Dashboard
                        </div>
                        <div class="card-body">
                            <p>
                                From your account dashboard you can view your recent orders, <a href="javascript:;" @click="OpenTab('profile_edit')">manage your shipping and billing addresses</a> and <a href="javascript:;" @click="OpenTab('profile_edit')">edit your password and account details</a>.
                            </p>
                        </div>
                    </div>
                </div>

                <div class="col-md-9 mt-2" v-if="active_tab == 'profile_edit'">
                    <div class="card">
                        <div class="card-header text-uppercase text-info">
                            Profile Info
                        </div>
                        <form @submit.prevent="UpdateProfile()">
                        <div class="card-body">
                            <table class="table table-bordered">
                                <tr>
                                    <th>Name</th>
                                    <th>:</th>
                                    <th>
                                        <div class="form-group">
                                            <input type="text" class="form-control" v-model="UserInfo.name" id="name" placeholder="Name">
                                        </div>
                                    </th>
                                </tr>
                                <tr>
                                    <th>Email</th>
                                    <th>:</th>
                                    <th>{{ UserInfo.email }}</th>
                                </tr>
                                <tr>
                                    <th>Phone</th>
                                    <th>:</th>
                                    <th>
                                        <div class="form-group">
                                            <input type="text" class="form-control" v-model="UserInfo.phone" id="phone" placeholder="Phone">
                                        </div>
                                    </th>
                                </tr>
                                <tr>
                                    <th>Address</th>
                                    <th>:</th>
                                    <th>
                                        <div class="form-group">
                                            <input type="text" class="form-control form-control" v-model="UserInfo.address" id="address" placeholder="Address">
                                        </div>
                                    </th>
                                </tr>
                            </table>
                            <button class="btn btn-primary text-right">Update</button>
                        </div>
                        </form>
                    </div>
                </div>

                <div class="col-md-9 mt-2" v-if="active_tab == 'order'">
                    <div class="card">
                        <div class="card-header text-uppercase text-info">
                            Orders
                        </div>
                        <div class="card-body">
                            <table class="table table-bordered">
                                <tr>
                                    <th>#</th>
                                    <th>Image</th>
                                    <th>Name</th>
                                    <th>Quantity</th>
                                    <th>Price</th>
                                    <th>S.total</th>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>

export default {
    data() {
        return {
            UserInfo : {
                name : '',
                phone : '',
                address : '',
            },
            active_tab : 'dashboard',
        }
    },
    methods: {

        OpenTab(tab_name) {
            const _this = this;
            _this.active_tab = tab_name;
        },

        User() {
            const _this = this;
            axios.get('/api/user_info')
                .then((response) => {
                    _this.UserInfo = response.data.data;
                })
                .catch((error) => {
                    console.log(error);
                })
        },

        logOut() {
            const _this = this;
            axios.get('/api/logout', _this.form)
                .then((response) => {
                    this.UserInfo = response.data.data
                    this.$router.push({name: 'login'});
                    window.location.reload();
                })
                .catch((error) => {
                    console.log(error);
                })
        },

        UpdateProfile() {
            const _this = this;
            axios.post('/api/update_profile', _this.UserInfo)
                .then((response) => {
                    this.$toasted.success("Your profile has been Updated.", {
                        theme: "outline",
                        position: "top-right",
                        duration : 9000
                    });
                })
                .catch((error) => {
                    console.log(error);
                })
        }
    },
    mounted() {
        this.User();
    }
};
</script>

<style scoped>
    .col-md-3 table tr {
        cursor: pointer;
    }
</style>
