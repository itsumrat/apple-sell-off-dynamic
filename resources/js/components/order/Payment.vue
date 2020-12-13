<template>
	<div class="container bg-white">
		<div class="card pt-3">
			<!-- <div class="card-head ml-3"><h5>Checkout form</h5></div> -->
			<div class="card-body">
				<div class="row text-sm">
			        <div class="col-md-5 order-md-3 mb-4 text-sm">
			          <div class="bg-light">
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
			            <li class="list-group-item d-flex justify-content-between">
			              <span>Shipping Charge (USD)</span>
			              <strong>৳ {{ shippingcharge }}</strong>
			            </li>
			          </ul>

			          <!-- <form class="card p-2">
			            <div class="input-group">
			              <input type="text" class="form-control" placeholder="Promo code">
			              <div class="input-group-append">
			                <button type="submit" class="btn btn-info">Redeem</button>
			              </div>
			            </div>
			          </form> -->
			          <div class="input-group">
			          	<button @click="checkOut(products)" type="submit" class="button btn-block">Proccess Continue</button>
			          </div>
			        </div>
			        <div class="col-md-7 order-md-1 text-sm">
			          <h4 class="mb-1">Payment Information</h4>
			            <div class="row my-3">
			              <div class="custom-control custom-radio form-check-inline">
			                <input id="credit" name="paymentMethod" type="radio" class="custom-control-input" checked required>
			                <label class="custom-control-label" for="credit"><i class="far fa-credit-card fa-lg text-info"></i></label>
			              </div>
			              <div class="custom-control custom-radio form-check-inline">
			                <input id="debit" name="paymentMethod" type="radio" class="custom-control-input" required>
			                <label class="custom-control-label" for="debit"><i class="fab fa-cc-visa fa-lg text-info"></i></label>
			              </div>
			              <div class="custom-control custom-radio form-check-inline">
			                <input id="paypal" name="paymentMethod" type="radio" class="custom-control-input" required>
			                <label class="custom-control-label" for="paypal"><i class="fab fa-cc-paypal fa-lg text-info"></i></label>
			              </div>
			            </div>
			            <div class="row">
			              <div class="col-md-6 mb-2">
			                <label for="cc-name">Name on card</label>
			                <input type="text" class="form-control" id="cc-name" placeholder="">
			                <small class="text-muted">Full name as displayed on card</small>
			                <div class="invalid-feedback">
			                  Name on card is required
			                </div>
			              </div>
			              <div class="col-md-6 mb-2">
			                <label for="cc-number">Credit card number</label>
			                <input type="text" class="form-control" id="cc-number" placeholder="">
			                <div class="invalid-feedback">
			                  Credit card number is required
			                </div>
			              </div>
			            </div>
			            <div class="row">
			              <div class="col-md-6 mb-2">
			                <label for="cc-expiration">Expiration</label>
			                <input type="text" class="form-control" id="cc-expiration" placeholder="">
			                <div class="invalid-feedback">
			                  Expiration date required
			                </div>
			              </div>
			              <div class="col-md-6 mb-2">
			                <label for="cc-expiration">CVV</label>
			                <input type="text" class="form-control" id="cc-cvv" placeholder="">
			                <div class="invalid-feedback">
			                  Security code required
			                </div>
			              </div>
			            </div>
			        </div>
		        </div>
			</div>
		</div>
	</div>
</template>
<script>
import { required, minLength, email } from "vuelidate/lib/validators";
import { mapActions, mapGetters } from "vuex";
import _ from "lodash";
export default {
  name: "Payment",
  data() {
    return {
      name: '',
      phone: '',
      email: '',
      address: '',
      user_type: 0,
      isLoggedIn: localStorage.getItem("eShop.token") != null,
      baseUrlPath: null,
      submitStatus: null,
      shippingcharge: localStorage.getItem("shippingamount") ? localStorage.getItem("shippingamount") : 0
    };
  },
  validations: {
    name: {
      required,
      minLength: minLength(4)
    },
    phone: {
      required,
      minLength: minLength(11)
    }
    ,
    email: {
      email
    }
    ,
    address: {
      required
    }
  },
  mounted() {
    this.setDefaults();
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

    checkOut(products) {
    	axios.post('api/orderPost/', { data: {orders: products, shipp: this.shippingcharge}})
        .then(response => {
        	if (response.data.length > 0) {
        		for (var i = 0; i < response.data.length; i++) {
        			this.$toasted.error(response.data[i], { 
		                theme: "outline", 
		                position: "top-right", 
		                duration : 9000
	            	});
        		}
        	} else {
            this.allProductRemoveCart();
            localStorage.removeItem('shippingamount');
        		this.$toasted.success("Success !! - Order Successfuly save!", { 
	                 theme: "outline", 
	                 position: "top-right", 
	                 duration : 9000
	            });
            this.$router.push({name: 'orderinvoice'});
        	}
        	
        })
        .catch(error => {
          this.$toasted.error("Errors !! -" + error.response.data.message, { 
                 theme: "outline", 
                 position: "top-right", 
                 duration : 9000
            });
        });
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