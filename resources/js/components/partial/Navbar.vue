<template>
  <div>
		<div v-if="this.$route.name == 'home'">
		    <HomeHeader />
		</div>
		<div v-else>
		    <PageHeader />
		</div>
	</div>	
</template>
<script>
import HomeHeader from "./HomeHeader.vue";
import PageHeader from "./PageHeader.vue";
export default {
  name: "Navbar",
  components: {
        HomeHeader,
		PageHeader
	},
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
