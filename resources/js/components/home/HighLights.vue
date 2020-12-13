<template>
    <div>
        <section id="highlights">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3 col-3">
                        <div class="highlights-item">
                            <img :src="baseUrlPath + '/frontend/img/delivery.png'">
                            <h5>Delivery</h5>
                            <p>Free Shipping for all UK orders</p>
                        </div>
                    </div>
                    <div class="col-lg-3 col-3">
                        <div class="highlights-item">
                            <img :src="baseUrlPath + '/frontend/img/value.png'">
                            <h5>value</h5>
                            <p>Competitive Pricing</p>
                        </div>
                    </div>
                    <div class="col-lg-3 col-3">
                        <div class="highlights-item">
                            <img :src="baseUrlPath + '/frontend/img/reliability.png'">
                            <h5>reliability</h5>
                            <p>Quality Apple Products</p>
                        </div>
                    </div>
                    <div class="col-lg-3 col-3">
                        <div class="highlights-item">
                            <img :src="baseUrlPath + '/frontend/img/choice.png'">
                            <h5>choice</h5>
                            <p>Wide Range of Apple Products</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</template>
<script>

export default {
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
