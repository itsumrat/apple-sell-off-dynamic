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
                            <td @click="OpenTab('addresses')">Addresses</td>
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

                <div class="col-md-9 mt-2" v-if="active_tab == 'addresses'">
                    <form @submit.prevent="customerAddress()">
                        <div class="card">
                            <div class="card-header text-uppercase text-info">Billing Address</div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <label>Name</label>
                                        <input class="form-control" v-model="addresses.bname" placeholder="Name">
                                    </div>
                                    <div class="col-lg-6">
                                        <label>Email</label>
                                        <input class="form-control" v-model="addresses.bemail" placeholder="Email">
                                    </div>
                                    <div class="col-lg-6">
                                        <label>Phone</label>
                                        <input class="form-control" v-model="addresses.bphone" placeholder="Phone">
                                    </div>
                                    <div class="col-lg-6">
                                        <label>Country</label>
                                        <select class="form-control" v-model="addresses.bregion_id">
                                            <option value="">Select</option>
                                            <option v-for="value in country.country" :value="value.id">{{ value.name }}</option>
                                        </select>
                                    </div>
                                    <div class="col-lg-6">
                                        <label>Division</label>
                                        <select class="form-control" v-model="addresses.bcity_id">
                                            <option value="">Select</option>
                                            <option v-for="value in country.division" v-if="value.country_id == addresses.bregion_id" :value="value.id">{{ value.name }}</option>
                                        </select>
                                    </div>
                                    <div class="col-lg-6">
                                        <label>District</label>
                                        <select class="form-control" v-model="addresses.barea_id">
                                            <option value="">Select</option>
                                            <option v-for="value in country.district" v-if="value.division_id == addresses.bcity_id" :value="value.id">{{ value.name }}</option>
                                        </select>
                                    </div>
                                    <div class="col-lg-12">
                                        <label>Address</label>
                                        <textarea class="form-control" placeholder="Address" v-model="addresses.baddress"></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="card">
                            <div class="card-header text-uppercase text-info">Shipping Address</div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <label>Name</label>
                                        <input class="form-control" v-model="addresses.sname" placeholder="Name">
                                    </div>
                                    <div class="col-lg-6">
                                        <label>Email</label>
                                        <input class="form-control" v-model="addresses.sphone" placeholder="Email">
                                    </div>
                                    <div class="col-lg-6">
                                        <label>Phone</label>
                                        <input class="form-control" v-model="addresses.semail" placeholder="Phone">
                                    </div>
                                    <div class="col-lg-6">
                                        <label>Country</label>
                                        <select class="form-control" v-model="addresses.sregion_id">
                                            <option value="">Select</option>
                                            <option v-for="value in country.country" :value="value.id">{{ value.name }}</option>
                                        </select>
                                    </div>
                                    <div class="col-lg-6">
                                        <label>Division</label>
                                        <select class="form-control" v-model="addresses.scity_id">
                                            <option value="">Select</option>
                                            <option v-for="value in country.division" v-if="value.country_id == addresses.sregion_id" :value="value.id">{{ value.name }}</option>
                                        </select>
                                    </div>
                                    <div class="col-lg-6">
                                        <label>District</label>
                                        <select class="form-control" v-model="addresses.sarea_id">
                                            <option value="">Select</option>
                                            <option v-for="value in country.district" v-if="value.division_id == addresses.scity_id" :value="value.id">{{ value.name }}</option>
                                        </select>
                                    </div>
                                    <div class="col-lg-12">
                                        <label>Address</label>
                                        <textarea class="form-control" placeholder="Address" v-model="addresses.saddress"></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <button class="btn btn-primary">Submit</button>
                    </form>
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
                                    <th>Order ID</th>
                                    <th>Quantity</th>
                                    <th>Total</th>
                                    <th>Invoice</th>
                                </tr>
                                <tr v-for="(data_value, index) in customer_order">
                                    <td>{{ data_value.order_no }}</td>
                                    <td>{{ data_value.total_count }}</td>
                                    <td>{{ data_value.total_price }}</td>
                                    <td>
                                        <router-link :to="`invoice/${data_value.order_no}`">Invoice</router-link>
                                    </td>
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

            addresses : {
                bname : '',
                bphone : '',
                bemail : '',
                bregion_id : '',
                bcity_id : '',
                barea_id : '',
                baddress : '',

                sname : '',
                sphone : '',
                semail : '',
                sregion_id : '',
                scity_id : '',
                sarea_id : '',
                saddress : '',
            },
            country : {},
            customer_address : {},
            customer_order : {},
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
                    _this.addresses = response.data.addresses;
                })
                .catch((error) => {
                    console.log(error);
                })
        },

        customerAddress() {
            const _this = this;
            axios.post('/api/customer_address_store', _this.addresses)
                .then((response) => {
                    this.$toasted.success("Your profile has been Updated.");
                })
                .catch((error) => {
                    console.log(error);
                })
        },

        address() {
            const _this = this;
            axios.get('/api/address')
            .then((response) => {
                _this.country = response.data.data;
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
                    this.$toasted.success("Your profile has been Updated.");
                })
                .catch((error) => {
                    console.log(error);
                })
        },

        CustomerOrder() {
            const _this = this;
            axios.get('/api/customer_order')
                .then((response) => {
                    _this.customer_order = response.data.data;
                    console.log(_this.customer_order)
                })
                .catch((error) => {
                    console.log(error);
                })
        },

    },
    mounted() {
        this.User();
        this.address();
        this.CustomerOrder();
    }
};
</script>

<style scoped>
    .col-md-3 table tr {
        cursor: pointer;
    }
</style>
