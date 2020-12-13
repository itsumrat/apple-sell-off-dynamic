<template>
  <div>
    	<header class="nonindex-header">
		    <div class="header-content clearfix">
		    	<router-link :to="{name: 'home'}" class="logo">
		    		<div class="sml-logo"></div>
		    	</router-link>
				<div class="menu-cart-wrapper">
					<div class="menuId"> <i class="fa fa-bars"></i> Menu</div>
					<a href="cart.php"><i style="font-size: 25px;" class="fa fa-shopping-cart"></i></a>
				</div>
		      	<nav class="navigation" role="navigation">
					<div class="closeIcon"><i class="fas fa-times"></i></div>
			        <ul id="primary-nav" class="primary-nav">
			          <li><router-link :to="{name: 'home'}">Home</router-link></li>
			          <li><router-link :to="{name: 'store'}">Apple</router-link></li>
			          <li><router-link :to="{name: 'audio'}">audio</router-link></li>
			          <li><router-link :to="{name: 'support'}">support</router-link></li>
			          <li><router-link :to="{name: 'login'}">Sign In</router-link></li>
			          <li><router-link :to="{name: 'cart'}"><i class="fas fa-shopping-cart"></i></router-link></li>
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
      currentroute: null
    };
  },
  mounted() {
  	this.currentroute = this.$route.name;
    this.baseUrlPath = axios.defaults.baseURL;
  }
};
</script>
<style>
</style>
