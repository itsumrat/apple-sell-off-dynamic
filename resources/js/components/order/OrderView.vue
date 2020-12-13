<template>
	<div>
		<header class="page-header page-header-compact page-header-light border-bottom bg-white mb-4">
            <div class="container-fluid">
                <div class="page-header-content">
                    <div class="row align-items-center justify-content-between pt-3">
                        <div class="col-auto mb-3">
                            <h1 class="page-header-title">
                                <div class="page-header-icon"><i data-feather="user"></i></div>
                                My Account - Profile
                            </h1>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <div class="container mt-2">
        <!-- Account page navigation-->
            <nav class="nav nav-borders">
                <router-link class="nav-link" :to="{name: 'user-profile'}">Profile</router-link>
                <router-link class="nav-link" :to="{name: 'orderlist'}">Order List</router-link>
            </nav>
            <hr class="mt-0 mb-1" />
      <div class="card invoice">
          <div class="card-header pl-3 pr-3 pb-0 border-bottom-0 bg-light text-black-50">
              <div class="row justify-content-between align-items-center">
                  <div class="col-12 col-lg-auto mb-lg-0 text-center text-lg-left">
                      <div class="h5 text-info"><a @click="downLoad(order.id)">Invoice <i class="fas fa-arrow-alt-circle-down"></i></a></div>
                      <p class="text-sm mb-1">#{{ order.order_no }}</p>
                      <p class="text-sm">{{ orderDate }}</p>
                  </div>
                  <div class="col-12 col-lg-auto text-lg-right">
                    <div class="h5 text-info">Invoice Status</div>
                    <span v-if="order.order_status == 1" class="badge badge-primary badge-pill">Processing</span>
                    <span v-if="order.order_status == 2" class="badge badge-info badge-pill">Delivery</span>
                    <span v-if="order.order_status == 3" class="badge badge-success badge-pill">Complete</span>
                    <span v-if="order.order_status == 0" class="badge badge-warning badge-pill">Pending</span>
                  </div>
              </div>
          </div>
          <div class="card-body pl-4 pr-4 pt-1">
              <div class="table-responsive">
                  <table class="table table-borderless mb-0">
                      <thead class="border-bottom">
                          <tr class="small text-uppercase text-muted">
                              <th scope="col">Products</th>
                              <th class="text-right" scope="col">Quantity</th>
                              <th class="text-right" scope="col">Rate</th>
                              <th class="text-right" scope="col">Amount</th>
                          </tr>
                      </thead>
                      <tbody>
                          <tr v-for="(ord, index) in order.order_items" :key="index" class="border-bottom">
                              <td>
                                  <div class="text-sm">{{ ord.pro_name ? ord.pro_name.name : '' }}</div>
                              </td>
                              <td class="text-right text-sm">{{ ord.count }}</td>
                              <td class="text-right text-sm">${{ ord.unit_price }}</td>
                              <td class="text-right text-sm">${{ ord.sub_price }}</td>
                          </tr>
                          <tr>
                              <td class="text-right pb-0" colspan="3"><div class="text-uppercase small font-weight-700 text-muted">Shipping Amount:</div></td>
                              <td class="text-right pb-0"><div class="h5 mb-0 font-weight-700 text-green">${{ order.shipping_charge }}</div></td>
                          </tr>
                          <tr>
                              <td class="text-right pb-0" colspan="3"><div class="text-uppercase small font-weight-700 text-muted">Total Amount:</div></td>
                              <td class="text-right pb-0"><div class="h5 mb-0 font-weight-700 text-green">${{ order.total_price }}</div></td>
                          </tr>
                      </tbody>
                  </table>
              </div>
          </div>
          <div class="card-footer p-4 p-lg-5 border-top-0">
              <div class="row">
                  <div class="col-md-6 col-lg-3 mb-4 mb-lg-0">
                      <div class="small text-muted text-uppercase font-weight-700 mb-2">To</div>
                      <div class="h6 mb-1">ESHOP Ltd.</div>
                      <div class="small">0987456231</div>
                      <div class="small">Nikunja, Dhaka</div>
                  </div>
                  <div class="col-md-6 col-lg-3 mb-4 mb-lg-0">
                      <div class="small text-muted text-uppercase font-weight-700 mb-2">From</div>
                      <div class="h6 mb-0">{{ customer.customeraddress ? customer.customeraddress.bname : customer.name}}</div>
                      <div class="small">{{ customer.customeraddress ? customer.customeraddress.bphone : customer.phone}}</div>
                      <div class="small">{{ customer.customeraddress ? customer.customeraddress.baddress : customer.address}}</div>
                  </div>
                  <div class="col-lg-6">
                      <div class="small text-muted text-uppercase font-weight-700 mb-2">Note</div>
                      <div class="small mb-0">Payment is due 15 days after receipt of this invoice. Please make checks or money orders out to Company Name, and include the invoice number in the memo. We appreciate your business, and hope to be working with you again very soon!</div>
                  </div>
              </div>
          </div>
      </div>
  	</div>
	</div>
</template>
<script>
	import moment from 'moment';
	export default {
		name: "OrderView",
		data() {
			return {
				order: '',
				customer: ''
			}
		},

		created() {
	      axios.get(`api/viewOrderlist/${this.$route.params.id}`)
	        .then(response => {
	          this.order = response.data;
	        })
	        .catch(error => {
	          this.$toasted.error("Errors !! -" + error.response.data.message, { 
	                 theme: "outline", 
	                 position: "top-right", 
	                 duration : 9000
	            });
	        });
		 },

		 mounted() {
		 	this.baseUrlPath = axios.defaults.baseURL;
		 },

		methods: {
		    loadCustomer() {
		      axios.get('api/customer/')
		        .then(response => {
		          this.customer = response.data;
		        })
		        .catch(error => {
		          this.$toasted.error("Errors !! -" + error.response.data.message, { 
		                 theme: "outline", 
		                 position: "top-right", 
		                 duration : 9000
		            });
		        });
		    },

        downLoad(id) {
        axios.get('api/invoiceOrderPdf/' + id)
          .then(response => {
            this.orderpdf = response.data;
            console.log(this.orderpdf);
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
		    orderDate() {
		        return moment(this.order.created_at).format('DD MMM Y');
	    	}
		}
	};
</script>