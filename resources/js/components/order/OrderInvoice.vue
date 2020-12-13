<template>
  <div class="container mt-4">
      <div class="card invoice">
          <div class="card-header pl-3 pr-3 border-bottom-0 bg-light text-black-50">
              <div class="row justify-content-between align-items-center">
                  <div class="col-12 col-lg-auto mb-5 mb-lg-0 text-center text-lg-left">
                      <div class="text-xs-center">
                        <h5 class="display-4 text-info">Thank You!</h5>
                        <p class="">For purchase product from here.</p>
                        </div>
                  </div>
                  <div class="col-12 col-lg-auto text-center text-lg-right">
                      <div class="h3 text-info"><a @click="downLoad(order.id)">Invoice <i class="fas fa-arrow-alt-circle-down"></i></a></div>
                      #{{ order.order_no }}
                      <br />
                      {{ orderDate }}
                  </div>
              </div>
          </div>
          <div class="card-body p-4 p-md-5">
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
                                  <div class="font-weight-bold">{{ ord.pro_name ? ord.pro_name.name : '' }}</div>
                              </td>
                              <td class="text-right font-weight-bold">{{ ord.count }}</td>
                              <td class="text-right font-weight-bold">${{ ord.unit_price }}</td>
                              <td class="text-right font-weight-bold">${{ ord.sub_price }}</td>
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
</template>
<script>
import moment from 'moment';
export default {
  name: "OrderInvoice",
  data() {
    return {
      customer: '',
      order: '',
      orderpdf: ''
    };
  },
  mounted() {
    this.baseUrlPath = axios.defaults.baseURL;
    this.loadCustomer();
    this.loadInvoice();
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
    loadInvoice() {
    	axios.get('api/invoiceOrder/')
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

    downLoad(id) {
      axios.get('api/invoiceOrderPdf/' + id)
        .then(response => {
          this.orderpdf = response.data;
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

<style>
</style>