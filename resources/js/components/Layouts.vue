<template>
    <div>
        <Navbar></Navbar>
        <router-view></router-view>
        <Footer></Footer>
    </div>
</template>

<script>
import Navbar from "./partial/Navbar.vue";
import Footer from "./partial/Footer.vue";

    export default {
    	components: {
    		Navbar,
            Footer
    	},
        mounted() {
        }
    };
</script>
