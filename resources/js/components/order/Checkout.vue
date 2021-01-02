<template>
    <div>
        <section id="banner-contact">
        </section>
        <div class="container bg-white">
            <div class="card pt-3">
                <div class="card-body">
                    <div class="row text-sm">
                        <div class="col-md-5 order-md-3 mb-4 text-sm">
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
                                        <p class="my-0">{{ pro.name }} x {{ pro.quantity }}</p>
<!--                                        <small class="text-muted">Brief description</small>-->
                                    </div>
                                    <span class="text-muted"> {{ pro.price * pro.quantity }}</span>
                                </li>
                                <li class="list-group-item d-flex justify-content-between">
                                    <span>Total </span>
                                    <strong> {{ cart_list.total }}</strong>
                                </li>
                            </ul>
                            <div class="input-group">
                                <button type="submit" disabled="" class="btn btn-block btn-light text-info">Proccess
                                    Continue
                                </button>
                            </div>
                        </div>
                        <div class="col-md-7 order-md-1 text-sm">
                            <h4 class="mb-1 text-info">Delivery Information</h4>
                            <form @submit.prevent="deliveryAddress">
                                <div class="row">
                                    <div class="col-md-6 mb-2">
                                        <div class="form-group">
                                            <label class="form__label" for="bname">Name</label>
                                            <input id="bname" class="form__input"
                                                   v-model="customer.customeraddress ? customer.customeraddress.bname : customer.name"/>
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-2">
                                        <div class="form-group">
                                            <label class="form__label" for="phone">Phone</label>
                                            <input id="phone" class="form__input"
                                                   v-model="customer.customeraddress ? customer.customeraddress.bphone : customer.phone"
                                                   type="text" placeholder="01728454112"/>
                                        </div>
                                    </div>
                                </div>

                                <div class="mb-2">
                                    <div class="form-group">
                                        <label class="form__label" for="email">Email</label>
                                        <input id="email" class="form__input"
                                               v-model.trim="customer.customeraddress ? customer.customeraddress.bemail : customer.email"
                                               placeholder="example@gmail.com"/>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4 mb-2">
                                        <div class="form-group" :class="{ 'form-group--error': $v.bregion.$error }">
                                            <label class="form__label" for="bregion">Region</label>
                                            <select class="form__input" v-model.trim="$v.bregion.$model" id="bregion">
                                                <option value="">Choose...</option>
                                                <option value="1">Dhaka</option>
                                                <option value="2">Rajshahi</option>
                                                <option value="3">Rangpur</option>
                                                <option value="4">Khulna</option>
                                            </select>
                                        </div>
                                        <div class="error" v-if="!$v.bregion.required"><p>Region is required</p></div>
                                    </div>
                                    <div class="col-md-4 mb-2">
                                        <div class="form-group" :class="{ 'form-group--error': $v.bcity.$error }">
                                            <label class="form__label" for="bcity">City</label>
                                            <select @change="shippingCharge" class="form__input"
                                                    v-model.trim="$v.bcity.$model" id="bcity">
                                                <option value="">Choose...</option>
                                                <option value="1">Dhaka</option>
                                                <option value="2">Naogaon</option>
                                                <option value="3">Bogura</option>
                                                <option value="4">Nator</option>
                                            </select>
                                        </div>
                                        <div class="error" v-if="!$v.bcity.required"><p>City is required</p></div>
                                    </div>
                                    <div class="col-md-4 mb-2">
                                        <div class="form-group">
                                            <label class="form__label" for="barea">Area</label>
                                            <select class="form__input" v-model.trim="$v.barea.$model" id="barea">
                                                <option value="">Choose...</option>
                                                <option value="1">Naogaon</option>
                                                <option value="2">Bogura</option>
                                                <option value="3">Nator</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-2">
                                    <div class="form-group">
                                        <label class="form__label" for="baddress">Address</label>
                                        <input type="text" class="form__input"
                                               v-model="customer.customeraddress ? customer.customeraddress.baddress : customer.address"
                                               id="baddress" placeholder="House#45, Nikunja-2, Khilkhet, Dhaka-1229">
                                    </div>
                                </div>
                                <hr class="mb-1">
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" v-model="same_address" class="custom-control-input"
                                           id="same-address">
                                    <label class="custom-control-label" for="same-address">Shipping address is the same
                                        as my billing address</label>
                                </div>
                                <hr class="mb-1">
                                <div class="row">
                                    <div class="col mb-2">
                                        <button class="button btn-block mt-4 text-md" type="submit"
                                                :disabled="submitStatus === 'PENDING'">Save
                                        </button>
                                        <p class="typo__p" v-if="submitStatus === 'OK'">Thanks for your submission!</p>
                                        <p class="typo__p" v-if="submitStatus === 'ERROR'">Please fill the form
                                            correctly.</p>
                                        <p class="typo__p" v-if="submitStatus === 'PENDING'">Sending...</p>
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

            cart_list : {}
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
