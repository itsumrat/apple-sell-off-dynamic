<template>
  <div>
    	<header id="header">
		    <div class="header-content clearfix">
		    	<router-link :to="{name: 'home'}" class="logo">
		    		<div class="sml-logo"></div>
		    	</router-link>
		    	<div class="menu-cart-wrapper">
					<div class="menuId"> <i class="fa fa-bars"></i>Menu</div>
					<a href="cart.php"><i style="font-size: 25px;" class="fa fa-shopping-cart"></i></a>
				</div>
		      	<nav class="navigation" role="navigation">
		      		<div class="closeIcon"><i class="fas fa-times"></i></div>
                    <ul id="primary-nav" class="primary-nav">
                        <li><router-link :to="{name: 'home'}">Home</router-link></li>
                        <li><router-link :to="{name: 'store'}">Apple</router-link></li>
                        <li><router-link :to="{name: 'audio'}">audio</router-link></li>
                        <li><router-link :to="{name: 'support'}">support</router-link></li>
                        <li v-if="UserInfo == false"><router-link :to="{name: 'login'}">Sign In</router-link></li>
                        <li v-if="UserInfo != false">
                            <a href="javascript:;">
                                <li class="dropdown account_menu">
                                    <button class="btn btn-lg btn-default dropdown-toggle" type="button" data-toggle="dropdown">MY ACCOUNT
                                        <span class="caret"></span></button>
                                    <ul class="dropdown-menu">
                                        <li><router-link :to="{name: 'my_profile'}">My Account</router-link></li>
                                        <li class="divider"></li>
                                        <li><a href="#">Cart</a></li>
                                        <li class="divider"></li>
                                        <li><a href="#">Checkout</a></li>
                                        <li class="divider"></li>
                                        <li><a href="#">Order Tracking</a></li>
                                        <li class="divider"></li>
                                        <li><a href="javascript:;" @click="logOut()">Logout</a></li>
                                    </ul>
                                </li>
                            </a>
                        </li>
                        <li><router-link :to="{name: 'cart'}"><i class="fas fa-shopping-cart"></i></router-link></li>
                    </ul>
		      	</nav>
		  	</div>
		</header>
	</div>
</template>
<script>
export default {
  name: "HomeHeader",
  data() {
    return {
      baseUrlPath: null,
      currentroute: null,
        UserInfo : {},
    };
  },
    methods : {
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
        logOut() {
            const _this = this;
            axios.get('/api/logout', _this.form)
                .then((response) => {
                    this.UserInfo = response.data.data
                    this.$router.push({name: 'login'});
                })
                .catch((error) => {
                    console.log(error);
                })
        },
    },
  mounted() {
         this.User();
  	    this.currentroute = this.$route.name;
        this.baseUrlPath = axios.defaults.baseURL;
  }
};
</script>
<style scoped>
.account_menu li a{
    padding: 0px;
    margin: 10px !important;
    color: #000 !important;
}
</style>
