<template>
    <div>
        <header class="nonindex-header">
            <div class="header-content clearfix">
                <router-link :to="{name: 'home'}" class="logo">
                    <div class="sml-logo"></div>
                </router-link>
                <div class="menu-cart-wrapper">
                    <div class="menuId"><i class="fa fa-bars"></i> Menu</div>
                    <router-link to="/cart">
                        <i style="font-size: 25px;" class="fa fa-shopping-cart"></i>
                        <span class="bg-danger text-white cart_count">0</span>
                    </router-link>
                </div>
                <nav class="navigation" role="navigation">
                    <div class="closeIcon"><i class="fas fa-times"></i></div>
                    <ul id="primary-nav" class="primary-nav">
                        <li>
                            <router-link :to="{name: 'home'}">Home</router-link>
                        </li>
                        <li>
                            <router-link :to="{name: 'store'}">Apple</router-link>
                        </li>
                        <li>
                            <router-link :to="{name: 'audio'}">audio</router-link>
                        </li>
                        <li>
                            <router-link :to="{name: 'support'}">support</router-link>
                        </li>
                        <li v-if="UserInfo == false">
                            <router-link :to="{name: 'login'}">Sign In</router-link>
                        </li>
                        <li  v-if="UserInfo != false" class="dropdown account_menu">
                            <a class="btn btn-lg btn-default dropdown-toggle" type="button" data-toggle="dropdown">MY
                                ACCOUNT
                                <span class="caret"></span>
                            </a>
                            <ul class="dropdown-menu">
                                <li>
                                    <router-link :to="{name: 'my_profile'}">My Account</router-link>
                                </li>
                                <li class="divider"></li>
                                <li>
                                    <router-link :to="{name: 'cart'}">Cart</router-link>
                                </li>
                                <li class="divider"></li>
                                <li><a href="#">Checkout</a></li>
                                <li class="divider"></li>
                                <li>
                                    <router-link :to="{name: 'order_tracking'}">Order Tracking</router-link>
                                </li>
                                <li class="divider"></li>
                                <li><a href="javascript:;" @click="logOut()">Logout</a></li>
                            </ul>
                        </li>
                        <li>
                            <router-link :to="{name: 'cart'}">
                                <i class="fas fa-shopping-cart"></i>
                                <span class="bg-danger text-white cart_count">0</span>
                            </router-link>
                        </li>
                    </ul>
                </nav>
            </div>
        </header>
    </div>
</template>
<script>
export default {
    name: "PageHeader",
    data() {
        return {
            baseUrlPath: null,
            currentroute: null,
            UserInfo: {},
        };
    },
    methods: {
        User() {
            const _this = this;
            axios.get('/api/user_info', _this.form)
                .then((response) => {
                    this.UserInfo = response.data.data
                })
                .catch((error) => {
                    console.log(error);
                })
        },
        cartList() {
            const _this = this;
            axios.get('/api/cart_list')
                .then((response) => {
                    $('.cart_count').text(response.data.cart_count);
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
    },
    mounted() {
        this.cartList();
        this.User();
        this.currentroute = this.$route.name;
        this.baseUrlPath = axios.defaults.baseURL;
    }
};
</script>
<style scoped>
    .account_menu .dropdown-menu li a {
        padding: 0px;
        display: block;
        margin: 10px 30px;
        text-transform: none;
        color: #000;
        font-size: 13px;
        line-height: 20.8px;
        font-size: 1rem;
        line-height: 1.3rem;
    }
</style>
