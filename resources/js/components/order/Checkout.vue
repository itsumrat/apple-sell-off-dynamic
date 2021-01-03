<template>
    <div>
        <section id="banner-contact">
        </section>
        <div class="container bg-white">
            <div class="card pt-3">
                <form @submit.prevent="confirmOrder">
                <div class="card-body">
                    <div class="row text-sm">
                        <div class="col-md-4 order-md-3 mb-4 text-sm">
                            <div class="bg-light">
                                <h4 class="d-flex justify-content-between align-items-center p-3 mb-2">
                                    <span class="text-info">Your cart</span>
                                    <span class="badge badge-info badge-pill">{{ cart_list.cart_count }}</span>
                                </h4>
                            </div>
                            <ul class="list-group mb-2">
                                <li v-for="(pro, index) in cart_list.data" :key="index"
                                    class="list-group-item d-flex justify-content-between lh-condensed">
                                    <div>
                                        <p class="my-0">{{ pro.name }} <strong style="font-size: 12px;">x {{ pro.quantity }}</strong></p>
<!--                                        <small class="text-muted">Brief description</small>-->
                                    </div>
                                    <span class="text-muted"> {{ pro.price * pro.quantity }}</span>
                                </li>
                                <li class="list-group-item d-flex justify-content-between">
                                    <strong>Total </strong>
                                    <strong> {{ cart_list.total }}</strong>
                                </li>
                            </ul>
                            <div class="input-group">
                                <button class="btn btn-block btn-light text-info">Proccess
                                    Continue
                                </button>
                            </div>
                        </div>
                        <div class="col-md-8 order-md-1 text-sm">
                            <div class="card">
                                <div class="card-header text-uppercase text-info">User Information</div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-lg-4">
                                            <label>Name</label>
                                            <input class="form-control" v-model="UserInfo.name" placeholder="Name">
                                        </div>
                                        <div class="col-lg-4">
                                            <label>Email</label>
                                            <input class="form-control" v-model="UserInfo.email" placeholder="Email">
                                        </div>
                                        <div class="col-lg-4">
                                            <label>Phone</label>
                                            <input class="form-control" v-model="UserInfo.phone" placeholder="Phone">
                                        </div>
                                        <div class="col-lg-12">
                                            <label>Address</label>
                                            <textarea class="form-control" placeholder="Address" v-model="UserInfo.address"></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <br>
                            <div class="card">
                                <div class="card-header text-uppercase text-info">Billing Address</div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-lg-4">
                                            <label>Name</label>
                                            <input class="form-control" v-model="addresses.bname" placeholder="Name">
                                        </div>
                                        <div class="col-lg-4">
                                            <label>Email</label>
                                            <input class="form-control" v-model="addresses.bemail" placeholder="Email">
                                        </div>
                                        <div class="col-lg-4">
                                            <label>Phone</label>
                                            <input class="form-control" v-model="addresses.bphone" placeholder="Phone">
                                        </div>
                                        <div class="col-lg-4">
                                            <label>Country</label>
                                            <select class="form-control" v-model="addresses.bregion_id">
                                                <option value="">Select</option>
                                                <option v-for="value in country.country" :value="value.id">{{ value.name }}</option>
                                            </select>
                                        </div>
                                        <div class="col-lg-4">
                                            <label>Division</label>
                                            <select class="form-control" v-model="addresses.bcity_id">
                                                <option value="">Select</option>
                                                <option v-for="value in country.division" v-if="value.country_id == addresses.bregion_id" :value="value.id">{{ value.name }}</option>
                                            </select>
                                        </div>
                                        <div class="col-lg-4">
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
                                        <div class="col-lg-4">
                                            <label>Name</label>
                                            <input class="form-control" v-model="addresses.sname" placeholder="Name">
                                        </div>
                                        <div class="col-lg-4">
                                            <label>Email</label>
                                            <input class="form-control" v-model="addresses.sphone" placeholder="Email">
                                        </div>
                                        <div class="col-lg-4">
                                            <label>Phone</label>
                                            <input class="form-control" v-model="addresses.semail" placeholder="Phone">
                                        </div>
                                        <div class="col-lg-4">
                                            <label>Country</label>
                                            <select class="form-control" v-model="addresses.sregion_id">
                                                <option value="">Select</option>
                                                <option v-for="value in country.country" :value="value.id">{{ value.name }}</option>
                                            </select>
                                        </div>
                                        <div class="col-lg-4">
                                            <label>Division</label>
                                            <select class="form-control" v-model="addresses.scity_id">
                                                <option value="">Select</option>
                                                <option v-for="value in country.division" v-if="value.country_id == addresses.sregion_id" :value="value.id">{{ value.name }}</option>
                                            </select>
                                        </div>
                                        <div class="col-lg-4">
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
                        </div>
                    </div>
                </div>
                </form>
            </div>
        </div>
    </div>
</template>
<script>
import {validationMixin} from 'vuelidate';
import {required, minLength, email} from "vuelidate/lib/validators";
import {mapActions, mapGetters} from "vuex";
import _ from "lodash";

export default {
    name: "Checkout",
    data() {
        return {
            customer: '',
            bregion: '',
            bcity: '',
            barea: '',
            same_address: '',
            user_type: 0,
            isLoggedIn: localStorage.getItem("eShop.token") != null,
            baseUrlPath: null,
            submitStatus: null,

            cart_list : {},
            UserInfo : {},
            country : {},
            addresses : {},
        };
    },
    mixins: [validationMixin],
    validations: {
        bregion: {
            required
        },
        bcity: {
            required
        },
        barea: {
            required: false
        }
    },
    mounted() {
        this.User();
        this.address();
        this.cartList();
        // this.setDefaults();
        // this.loadCustomer();
        // this.baseUrlPath = axios.defaults.baseURL;
    },
    methods: {
        ...mapActions({
            addProduct: "cart/addProduct",
            removeProduct: "cart/removeProduct",
            allProductRemove: "cart/allProductRemove",
            allProductRemoveCart: "cart/allProductRemoveCart"
        }),

        setDefaults() {
            if (this.isLoggedIn) {
                let user = JSON.parse(localStorage.getItem("eShop.user"));
                this.name = user.name;
                this.user_type = user.role_id;
            }
        },

        addtoCart(item) {
            if (this.countProduct(item.id) < (this.quantityStock(item.id) - 1)) {
                this.addProduct(item);
            } else {
                this.$toasted.error("Product not available in stock!");
            }
        },

        removeFromCart(item) {
            this.removeProduct(item);
        },

        removeProductAll(id) {
            this.allProductRemove(id);
        },

        cartRemoveProductAll() {
            this.allProductRemoveCart();
        },

        countProduct(id) {
            let pro = this.products;
            if (!pro) {
                return 0;
            }
            for (var i = 0; i < pro.length; i++) {
                if (pro[i].id == id) {
                    return pro[i].count;
                }
            }
            return 0;
        },

        quantityStock(proid) {
            let pro = this.products;
            if (!pro) {
                return 1;
            }
            for (var i = 0; i < pro.length; i++) {
                if (pro[i].id == proid) {
                    return pro[i].product_stock;
                }
            }
            return 1;
        },

        loadCustomer() {
            axios.get('api/customer/')
                .then(response => {
                    this.customer = response.data;
                })
                .catch(error => {
                    this.$toasted.error("Errors !! -" + error.response.data.message, {
                        theme: "outline",
                        position: "top-right",
                        duration: 9000
                    });
                });
        },

        shippingCharge() {
            if (this.bcity == 1) {
                localStorage.removeItem('shippingamount');
                localStorage.setItem('shippingamount', 50);
            } else {
                localStorage.removeItem('shippingamount');
                localStorage.setItem('shippingamount', 100);
            }
        },

        deliveryAddress() {
            this.$v.$touch()
            if (this.$v.$invalid) {
                this.submitStatus = 'ERROR'
            } else {
                var formData = new FormData();
                formData.append("bname", this.customer.customeraddress ? this.customer.customeraddress.bname : this.customer.name);
                formData.append("bphone", this.customer.customeraddress ? this.customer.customeraddress.bphone : this.customer.phone);
                formData.append("bemail", this.customer.customeraddress ? this.customer.customeraddress.bemail : this.customer.email);
                formData.append("bregion_id", this.bregion);
                formData.append("bcity_id", this.bcity);
                formData.append("barea_id", this.barea);
                formData.append("baddress", this.customer.customeraddress ? this.customer.customeraddress.baddress : this.customer.address);
                formData.append("same_address", this.same_address);
                axios.post("api/deliveryAddress", formData)
                    .then(response => {
                        this.$toasted.success("Success !! - Successfully save delivery information!", {
                            theme: "outline",
                            position: "top-right",
                            duration: 9000
                        });
                        this.$router.push({name: 'payment'});
                    })
                    .catch(error => {
                        if (error.response.status == 422) {
                            this.$toasted.error("Errors !! -" + error.response.data.errors.email, {
                                theme: "outline",
                                position: "top-right",
                                duration: 9000
                            });
                        }
                    });
                this.submitStatus = 'PENDING'
                setTimeout(() => {
                    this.submitStatus = 'OK'
                }, 900)
            }
        },


        cartList() {
            const _this = this;
            axios.get('/api/cart_list')
                .then((response) => {
                    _this.cart_list = response.data;
                })
                .catch((error) => {
                    console.log(error);
                })
        },

        User() {
            const _this = this;
            axios.get('/api/user_info')
            .then((response) => {
                console.log(response.data.addresses);
                _this.UserInfo = response.data.data;
                _this.addresses = response.data.addresses;
            })
            .catch((error) => {
                console.log(error);
            })
        },

        confirmOrder() {
            const _this = this;
            axios.post('/api/confirm_order', {
                user_info : _this.UserInfo,
                addresses : _this.addresses
            })
            .then((response) => {
                this.$toasted.success("Your Order Is Placed Successfully!!");
                this.$router.push({name: '/'});
                window.location.reload();
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

    },

    computed: {
        ...mapGetters({
            products: "cart/products",
            tokenHeader: "authcheck/token",
            userCheck: "authcheck/user"
        }),

        totalCount() {
            let sum = 0;
            _.each(this.products, p => {
                sum += p.count;
            });
            return sum;
        },

        totalPrice() {
            let sum = 0;
            _.each(this.products, p => {
                sum += p.count * p.price;
            });
            return sum;
        }
    }
};
</script>

<style>
.custom-control.custom-radio {
    float: left;
    font-size: 30px;
}
</style>
