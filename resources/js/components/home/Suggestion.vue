<template>
    <div>
    	<section id="suggestions">
        <div class="section-title">
            <h1>our suggestions</h1>
        </div>
        <div class="container my-4">
            <!--Carousel Wrapper-->
            <div id="multi-item-example" class="carousel slide carousel-multi-item" data-ride="carousel">
                <!--Controls-->
                <div class="controls-top">
                    <a class="btn-floating" href="#multi-item-example" data-slide="prev">
                        <img :src="baseUrlPath + '/frontend/img/left-arrow.png'">
                    </a>
                    <a class="btn-floating" href="#multi-item-example" data-slide="next">
                        <img :src="baseUrlPath + '/frontend/img/right-arrow.png'">
                    </a>
                </div>
                <!--/.Controls-->
                <!--Indicators-->
                <ol class="carousel-indicators">
                    <li data-target="#multi-item-example" data-slide-to="0" class="active"></li>
                    <li data-target="#multi-item-example" data-slide-to="1"></li>
                    <li data-target="#multi-item-example" data-slide-to="2"></li>
                </ol>
                <!--/.Indicators-->

              <!--Slides-->
              <div class="carousel-inner" role="listbox">
                <!--First slide-->

                <div v-for="(chunk, index) in chunkedItems" :class="index == 0 ? 'carousel-item active' : 'carousel-item'">
                    <div class="row">
                        <div class="col-md-3" v-for="value in chunk">
                            <div class="card mb-2">
                                <router-link :to="{name: 'product-details', params: {id: value.id}}">
                                    <img class="card-img-top" :src="'/uploads/product/'+value.feature_image" alt="Card image cap">
                                    <div class="card-body">
                                        <p class="card-text">{{ value.name }}<span>${{ value.stock_product.unit_price }}</span></p>
                                    </div>
                                </router-link>
                            </div>
                        </div>
                    </div>
                </div>
                <!--/.First slide-->
              </div>
              <!--/.Slides-->
            </div>
            <!--/.Carousel Wrapper-->
        </div>
    </section>
    </div>
</template>

<script>
export default {
    props : ['suggested_product'],
    name: 'Suggestion',
    data() {
    return {
      baseUrlPath: null
    };
  },

  mounted() {
    this.baseUrlPath = axios.defaults.baseURL;
  },

  computed: {
        chunkedItems () {
            return _.chunk(this.suggested_product,4)
        }
    }

};
</script>

<style scoped>
    a:hover {
        color: #0056b3;
        text-decoration: none;
    }
</style>
