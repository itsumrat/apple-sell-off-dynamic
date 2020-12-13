<template>
    <div>
    	<section id="subscription">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 offset-lg-2">
                    <div class="subscribe-box">
                        <p>Join our newsletter for the latest Apple stock</p>
                        <input type="email" class="form-control subscribe-input" placeholder="Enter Your Email Here">
                        <button class="btn subscribe-btn">Subscribe</button>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="social-links">
                        <ul>
                            <li><a href="#"><i class="fab fa-instagram-square"></i></a></li>
                            <li><a href="#"><i class="fab fa-facebook-square"></i></a></li>
                            <li><a href="#"><i class="fab fa-twitter-square"></i></a></li>
                            <li><a href="#"><i class="fab fa-pinterest-square"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    </div>
</template>

<script>
export default {
    name: 'Subscription',
    data() {
    return {
      baseUrlPath: null
    };
  },

  mounted() {
    this.baseUrlPath = axios.defaults.baseURL;
  },
        
};
</script>

<style>

</style>
