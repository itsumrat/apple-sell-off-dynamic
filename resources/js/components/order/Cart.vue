<template>
    <div class="container">
        <div class="row">
            <div class="col mt-2">
                <div class="card">
                    <div class="card-header text-uppercase text-info">
                        Product cart list
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table
                                v-if="products.length >= 1"
                                class="table table-borderless text-sm"
                            >
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Image</th>
                                        <th>Name</th>
                                        <th>Quantity</th>
                                        <th>Price</th>
                                        <th>S.total</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr
                                        v-for="(pro, index) in products"
                                        :key="index"
                                        class="product-cart-table"
                                    >
                                        <th scope="row">{{ ++index }}</th>
                                        <td>
                                            <img
                                                :src="
                                                    baseUrlPath +
                                                        '/uploads/product/' +
                                                        pro.image
                                                "
                                                class="img img-fluid img-thumbnail"
                                                width="50"
                                                height="50"
                                            />
                                        </td>
                                        <td>{{ pro.name }}</td>
                                        <td>
                                            <span class="text-black">
                                                <a @click="removeFromCart(pro)">
                                                    <i
                                                        style="color:red"
                                                        class="fa fa-minus-circle fa-sm pr-2"
                                                    ></i>
                                                </a>
                                                {{ pro.count }}
                                                <a @click="addtoCart(pro)">
                                                    <i
                                                        style="color:green"
                                                        class="fa fa-plus-circle fa-sm pl-2"
                                                    ></i>
                                                </a>
                                            </span>
                                        </td>
                                        <td>{{ pro.price }}</td>
                                        <td>{{ pro.price * pro.count }}</td>
                                        <td>
                                            <a
                                                class="shopcart-remove"
                                                @click="
                                                    removeProductAll(pro.id)
                                                "
                                            >
                                                <i
                                                    class="fas fa-trash-alt fa-sm"
                                                ></i>
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th colspan="5" class="text-right">
                                            <b>Total :</b>
                                        </th>
                                        <th>
                                            <b>৳ {{ totalPrice }}</b>
                                        </th>
                                        <!-- <td>
                                    <router-link :to="{ name: 'checkout' }">View Checkout</router-link>
                                </td> -->
                                    </tr>
                                </tbody>
                            </table>
                            <h5
                                v-else
                                class="text-center justify-center text-uppercase text-info"
                            >
                                No item add to cart!
                            </h5>
                        </div>
                        <div
                            v-if="products.length >= 1"
                            class="view-checkout text-right text-info"
                        >
                            <router-link
                                :to="{ name: 'checkout' }"
                                class="text-white p-1 bg-info"
                                >Checkout</router-link
                            >
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
import { mapActions, mapGetters } from "vuex";
import _ from "lodash";
export default {
    name: "Cart",
    data() {
        return {
            user_type: 0,
            isLoggedIn: localStorage.getItem("eShop.token") != null,
            baseUrlPath: null
        };
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
            if (this.countProduct(item.id) < this.quantityStock(item.id) - 1) {
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
tr.product-cart-table {
    border-bottom: 1px solid #f7f7f8;
}
.product-cart-table:last-child {
    border-bottom: none !important;
}
</style>
