<template>
    <div>
        <div class="container">
            <div class="row">
                <div class="col-12 page-title">
                    <h1>cart items</h1>
                </div>
            </div>
        </div>

        <section id="cart-details">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8">
                        <div class="cart-items">
                            <table class="table table-borderless">
                                <thead>
                                <tr class="table-header">
                                    <th scope="col">product</th>
                                    <th scope="col">price</th>
                                    <th scope="col">qty</th>
                                    <th scope="col">total</th>
                                    <th scope="col"></th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr v-for="(value, index) in cart_list.data">
                                    <th scope="row" style="display: flex; width: 350px;">
                                        <img :src="baseUrlPath + '/frontend/img/macbookpro.png'" width="130px">
                                        <div class="product-brief">
                                            <span class="device-name">{{ value.name }}</span>
                                        </div>
                                    </th>
                                    <th>${{ value.price }}</th>
                                    <th>
                                        <button class="btn btn-light" @click="increaseQuantity(value.quantity, value.id, 'increase')">+</button>
                                        <button class="btn btn-light">{{value.quantity}}</button>
                                        <button class="btn btn-light" @click="increaseQuantity(value.quantity, value.id, 'decrease')">-</button>
                                    </th>
                                    <th>${{ parseFloat(value.price) * parseFloat(value.quantity) }}</th>
                                    <td><a @click="removeCartItem(value)" href="#"><i class="fas fa-trash-alt"></i></a></td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="cart-total">
                            <h6>cart total</h6>
                            <p>Subtotal</p> ${{ cart_list.total }} <br>
                            <p class="shipping-charge">Shipping</p> Free<br> <a href="#" class="shipping-calculator">calculate
                            shipping</a>
                            <hr>
                            <p>Total</p> ${{ cart_list.total }}
                            <div class="button-grp">
<!--                                <a href="#" class="btn cart-update-btn">update cart</a>-->
                                <router-link to="checkout" class="btn btn-block checkout-btn" v-if="cart_list.data.length != 0">proceed to checkout</router-link>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</template>
<script>
export default {
    name: "Store",
    data() {
        return {
            baseUrlPath : null,
            cart_list : {},
        };
    },

    methods : {
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
        removeCartItem(item) {
            const _this = this;
            axios.get('/api/remove_cart_item/'+item.id)
            .then((response) => {
                _this.cart_list = response.data;
            })
            .catch((error) => {
                console.log(error);
            })
        },

        increaseQuantity(qty, id, type){
            const _this = this;
            if ( 100 > qty) {
                axios.get('/api/increase_quantity/'+ id + '/' + type)
                    .then((response) => {
                        _this.cart_list = response.data;
                    })
                    .catch((error) => {
                        console.log(error);
                    })
            } else {
                this.$toasted.error("Enter Valid Quantity!");
            }
        },
    },


    mounted() {
        this.cartList();
        this.baseUrlPath = axios.defaults.baseURL;
    },

};
</script>
<style>
.parentclass span.inc {
    position: absolute;
    margin-top: 2px;
    margin-left: -17px;
    /*display: none;*/
}

.parentclass span.dec {
    position: absolute;
    margin-top: 5px;
    margin-left: -17px;
    /*display: none;*/
}

svg.svg-inline--fa.fa-sort-up.fa-w-10 {
    color: #878786;
}

svg.svg-inline--fa.fa-sort-down.fa-w-10 {
    color: #878786;
}

/*.parentclass span.inc:hover {
    color: green;
    display: block;
}
.parentclass span.dec:hover {
    color: red;
    display: block;
}*/
</style>
