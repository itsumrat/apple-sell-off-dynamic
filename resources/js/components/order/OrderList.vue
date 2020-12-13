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
        <!-- Main page content-->
        <div class="container mt-4">
            <!-- Account page navigation-->
            <nav class="nav nav-borders">
                <router-link class="nav-link" :to="{name: 'user-profile'}">Profile</router-link>
                <router-link class="nav-link" :to="{name: 'orderlist'}">Order List</router-link>
            </nav>
            <hr class="mt-0 mb-4" />
            <div class="row">
                 <div class="col-xl-12">
                    <!-- Account details card-->
                    <div class="card mb-4">
                        <div class="card-header text-info">My Order List</div>
                        <div class="card-body">
                            <div class="datatable">
                                <table v-if="orders.length >= 1" class="table table-bordered table-hover" id="dataTableOrderlist" width="100%">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Order No</th>
                                            <th>Prodoct Qnt</th>
                                            <th>Total Amount</th>
                                            <th>Status</th>
                                            <th>Aciton</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr v-for="(ord, index) in orders" :key="index">
                                            <td>{{ ++index }}</td>
                                            <td>#{{ord.order_no}}</td>
                                            <td>{{ord.total_count}}</td>
                                            <td>{{ord.total_price}}</td>
                                            <td>
                                                <span v-if="ord.order_status == 1" class="badge badge-primary badge-pill">Processing</span>
                                                <span v-if="ord.order_status == 2" class="badge badge-info badge-pill">Delivery</span>
                                                <span v-if="ord.order_status == 3" class="badge badge-success badge-pill">Complete</span>
                                                <span v-if="ord.order_status == 0" class="badge badge-warning badge-pill">Pending</span>
                                            </td>
                                            <td>
                                                <router-link :to="{name: 'vieworder',  params: { id: ord.id }}"><i class="fas fa-eye fa-sm"></i></router-link>
                                                <button class="btn btn-datatable btn-icon btn-transparent-dark"><i class="fas fa-trash-alt fa-sm"></i></button>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
	</div>
</template>
<script>
    export default {
        name: "OrderList",

        data() {
            return {
                orders: ''
            }
        },

        mounted() {
            this.loadOrders();
            this.baseUrlPath = axios.defaults.baseURL;
        },

        methods: {
            loadOrders() {
              axios.get('api/customerOrderlist/')
                .then(response => {
                  this.orders = response.data;
                })
                .catch(error => {
                  this.$toasted.error("Errors !! -" + error.response.data.message, { 
                         theme: "outline", 
                         position: "top-right", 
                         duration : 9000
                    });
                });
            }
            
        }

    };
</script>