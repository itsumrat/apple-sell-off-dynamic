<template>
	<div class="container bg-white">
		<div class="card pt-3">
			<!-- <div class="card-head ml-3"><h5>Checkout form</h5></div> -->
			<div class="card-body">
				<div class="row text-sm">
			        <div class="col-md-5 order-md-3 mb-4 text-sm">
			        	<div class="bg-light height-16">
				        	<h4 class="d-flex justify-content-between align-items-center p-3 mb-2">
					            <span class="text-info">Your cart</span>
					            <span class="badge badge-info badge-pill">{{ totalCount }}</span>
					         </h4>
			        	</div>
			          <ul class="list-group mb-2">
			            <li v-for="(pro, index) in products" :key="index" class="list-group-item d-flex justify-content-between lh-condensed">
			              <div>
			                <p class="my-0">{{ pro.name }}</p>
			                <small class="text-muted">Brief description</small>
			              </div>
			              <span class="text-muted">৳ {{ pro.price * pro.count }}</span>
			            </li>
			            <li class="list-group-item d-flex justify-content-between">
			              <span>Total (USD)</span>
			              <strong>৳ {{ totalPrice }}</strong>
			            </li>
			          </ul>

			          <form class="card p-2">
			            <div class="input-group">
			              <input type="text" class="form-control" placeholder="Promo code">
			              <div class="input-group-append">
			                <button type="submit" class="btn btn-info">Redeem</button>
			              </div>
			            </div>
			          </form>
			          <div class="input-group">
			          	<button type="submit" disabled="" class="btn btn-block btn-light text-info">Proccess Continue</button>
			          </div>
			        </div>
			        <div class="col-md-7 order-md-1 text-sm">
			          <h4 class="mb-1 text-info">Delivery Information</h4>
			          <form @submit.prevent="deliveryAddress">
			            <div class="row">
			              <div class="col-md-6 mb-2">
			              	<div class="form-group" :class="{ 'form-group--error': $v.name.$error }">
				                <label class="form__label" for="name">Name</label>
				                <input id="name" class="form__input" v-model.trim="customer.name"/>
			            	</div>
			            	<div class="error" v-if="!$v.name.required"><p>Name is required</p></div>
						  	<div class="error" v-if="!$v.name.minLength">Name must have at least {{$v.name.$params.minLength.min}} letters.</div>
			              </div>
			              <div class="col-md-6 mb-2">
			              	<div class="form-group" :class="{ 'form-group--error': $v.phone.$error }">
				                <label class="form__label" for="phone">Phone</label>
				                <input id="phone" class="form__input" v-model.number="customer.phone" type="number" placeholder="01728454112"/>
			            	</div>
			            	<div class="error" v-if="!$v.phone.required"><p>Phone number is required</p></div>
						  	<div class="error" v-if="!$v.phone.minLength">Phone must have at least {{$v.phone.$params.minLength.min}} number.</div>
			              </div>
			            </div>

			            <div class="mb-2">
			              <div class="form-group" :class="{ 'form-group--error': $v.email.$error }">
						    <label class="form__label" for="email">Email</label>
						    <input id="email" class="form__input" v-model.trim="$v.email.$model" placeholder="example@gmail.com" />
						  </div>
						  <div class="error" v-if="!$v.email.email">Email must have valid.</div>
			            </div>
			            <div class="row">
			              <div class="col-md-4 mb-2">
			              	<div class="form-group" :class="{ 'form-group--error': $v.region.$error }">
				                <label class="form__label" for="region">Region</label>
				                <select class="form__input" v-model.trim="$v.region.$model" id="region">
				                  <option value="">Choose...</option>
				                  <option>Dhaka</option>
				                  <option>Rajshahi</option>
				                  <option>Rangpur</option>
				                  <option>Khulna</option>
				                </select>
			                </div>
			                <div class="error" v-if="!$v.region.required"><p>Region is required</p></div>
			              </div>
			              <div class="col-md-4 mb-2">
			                <div class="form-group" :class="{ 'form-group--error': $v.city.$error }">
				                <label class="form__label" for="city">City</label>
				                <select class="form__input" v-model.trim="$v.city.$model" id="city">
				                  <option value="">Choose...</option>
				                  <option>Naogaon</option>
				                  <option>Bogura</option>
				                  <option>Nator</option>
				                </select>
			                </div>
			                <div class="error" v-if="!$v.city.required"><p>City is required</p></div>
			              </div>
			              <div class="col-md-4 mb-2">
			                <div class="form-group">
				                <label class="form__label" for="area">Area</label>
				                <select class="form__input" v-model.trim="$v.area.$model" id="area">
				                  <option value="">Choose...</option>
				                  <option>Naogaon</option>
				                  <option>Bogura</option>
				                  <option>Nator</option>
				                </select>
			                </div>
			              </div>
			            </div>
			            <div class="mb-2">
			            	<div class="form-group" :class="{ 'form-group--error': $v.address.$error }">
				              <label class="form__label" for="address">Address</label>
				              <input type="text" class="form__input" v-model.trim="$v.address.$model" id="address" placeholder="House#45, Nikunja-2, Khilkhet, Dhaka-1229">
			              	</div>
			              	<div class="error" v-if="!$v.address.required"><p>Address is required</p></div>
			            </div>
			            <hr class="mb-1">
			            <div class="custom-control custom-checkbox">
			              <input type="checkbox" v-model="same_address" class="custom-control-input" id="same-address">
			              <label class="custom-control-label" for="same-address">Shipping address is the same as my billing address</label>
			            </div>
			            <hr class="mb-1">
			            <div class="row">
			              <div class="col mb-2"> 
			              	<button class="button btn-block mt-4 text-md" type="submit" :disabled="submitStatus === 'PENDING'">Save</button>
			              	<p class="typo__p" v-if="submitStatus === 'OK'">Thanks for your submission!</p>
							<p class="typo__p" v-if="submitStatus === 'ERROR'">Please fill the form correctly.</p>
							<p class="typo__p" v-if="submitStatus === 'PENDING'">Sending...</p>
			              </div>
			            </div>
			          </form>
			        </div>
		        </div>
			</div>
		</div>
	</div>
</template>
<script>
import { validationMixin } from 'vuelidate';
import { required, minLength, email } from "vuelidate/lib/validators";
import { mapActions, mapGetters } from "vuex";
import _ from "lodash";
export default {
  name: "Checkout",
  data() {
    return {
      customer: '',
      region: '',
      city: '',
      area: '',
      address: '',
      same_address: '',
      user_type: 0,
      isLoggedIn: localStorage.getItem("eShop.token") != null,
      baseUrlPath: null,
      submitStatus: null
    };
  },
  mixins: [validationMixin],
  validations: {
    name: {
      required,
      minLength: minLength(4)
    },
    phone: {
      required,
      minLength: minLength(11)
    },
    email: {
      email
    },
    region: {
      required
    },
    city: {
      required
    },
    area: {
      required: false
    },
    address: {
      required
    }
  },
  mounted() {
    this.setDefaults();
    this.loadCustomer();
    this.baseUrlPath = axios.defaults.baseURL;
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
        	console.log(this.customer);
        })
        .catch(error => {
          this.$toasted.error("Errors !! -" + error.response.data.message, { 
                 theme: "outline", 
                 position: "top-right", 
                 duration : 9000
            });
        });
    },

    deliveryAddress() {
      this.$v.$touch()
      if (this.$v.$invalid) {
        this.submitStatus = 'ERROR'
      } else {
  		var formData = new FormData();
      	formData.append("name", this.name);
      	formData.append("phone", this.phone);
      	formData.append("email", this.email);
      	formData.append("region", this.region);
      	formData.append("city", this.city);
      	formData.append("area", this.area);
      	formData.append("address", this.address);
      	formData.append("same_address", this.same_address);
        this.submitStatus = 'PENDING'
        setTimeout(() => {
          this.submitStatus = 'OK'
        }, 900)
      }
    }
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