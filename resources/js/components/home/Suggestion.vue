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
                <div class="carousel-item active">
                  <div class="row">
                    <div class="col-md-3">
                      <div class="card mb-2">
                        <img class="card-img-top" :src="baseUrlPath + '/frontend/img/suggestion.png'"
                          alt="Card image cap">
                        <div class="card-body">
                          <p class="card-text">Apple 11" MacBook Air (Mid 2012) Intel Pentium III<span>$175.00</span></p>
                        </div>
                      </div>
                    </div>

                    <div class="col-md-3 clearfix d-none d-md-block">
                      <div class="card mb-2">
                        <img class="card-img-top" :src="baseUrlPath + '/frontend/img/suggestion.png'"
                          alt="Card image cap">
                        <div class="card-body">
                          <p class="card-text">Apple 11" MacBook Air (Mid 2012) Intel Pentium III<span>$175.00</span></p>
                        </div>
                      </div>
                    </div>

                    <div class="col-md-3 clearfix d-none d-md-block">
                      <div class="card mb-2">
                        <img class="card-img-top" :src="baseUrlPath + '/frontend/img/suggestion.png'"
                          alt="Card image cap">
                        <div class="card-body">
                          <p class="card-text">Apple 11" MacBook Air (Mid 2012) Intel Pentium III<span>$175.00</span></p>
                        </div>
                      </div>
                    </div>

                    <div class="col-md-3 clearfix d-none d-md-block">
                      <div class="card mb-2">
                        <img class="card-img-top" :src="baseUrlPath + '/frontend/img/suggestion.png'"
                          alt="Card image cap">
                        <div class="card-body">
                          <p class="card-text">Apple 11" MacBook Air (Mid 2012) Intel Pentium III<span>$175.00</span></p>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <!--/.First slide-->

                <!--Second slide-->
                <div class="carousel-item">
                  <div class="row">
                    <div class="col-md-3">
                      <div class="card mb-2">
                        <img class="card-img-top" :src="baseUrlPath + '/frontend/img/suggestion.png'"
                          alt="Card image cap">
                        <div class="card-body">
                          <p class="card-text">Apple 11" MacBook Air (Mid 2012) Intel Pentium III<span>$175.00</span></p>
                        </div>
                      </div>
                    </div>

                    <div class="col-md-3 clearfix d-none d-md-block">
                      <div class="card mb-2">
                        <img class="card-img-top" :src="baseUrlPath + '/frontend/img/suggestion.png'"
                          alt="Card image cap">
                        <div class="card-body">
                          <p class="card-text">Apple 11" MacBook Air (Mid 2012) Intel Pentium III<span>$175.00</span></p>
                        </div>
                      </div>
                    </div>

                    <div class="col-md-3 clearfix d-none d-md-block">
                      <div class="card mb-2">
                        <img class="card-img-top" :src="baseUrlPath + '/frontend/img/suggestion.png'"
                          alt="Card image cap">
                        <div class="card-body">
                          <p class="card-text">Apple 11" MacBook Air (Mid 2012) Intel Pentium III<span>$175.00</span></p>
                        </div>
                      </div>
                    </div>

                    <div class="col-md-3 clearfix d-none d-md-block">
                      <div class="card mb-2">
                        <img class="card-img-top" :src="baseUrlPath + '/frontend/img/suggestion.png'"
                          alt="Card image cap">
                        <div class="card-body">
                          <p class="card-text">Apple 11" MacBook Air (Mid 2012) Intel Pentium III<span>$175.00</span></p>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <!--/.Second slide-->

                <!--Third slide-->
                <div class="carousel-item">
                  <div class="row">
                    <div class="col-md-3">
                      <div class="card mb-2">
                        <img class="card-img-top" :src="baseUrlPath + '/frontend/img/suggestion.png'"
                          alt="Card image cap">
                        <div class="card-body">
                          <p class="card-text">Apple 11" MacBook Air (Mid 2012) Intel Pentium III<span>$175.00</span></p>
                        </div>
                      </div>
                    </div>

                    <div class="col-md-3 clearfix d-none d-md-block">
                      <div class="card mb-2">
                        <img class="card-img-top" :src="baseUrlPath + '/frontend/img/suggestion.png'"
                          alt="Card image cap">
                        <div class="card-body">
                          <p class="card-text">Apple 11" MacBook Air (Mid 2012) Intel Pentium III<span>$175.00</span></p>
                        </div>
                      </div>
                    </div>

                    <div class="col-md-3 clearfix d-none d-md-block">
                      <div class="card mb-2">
                        <img class="card-img-top" :src="baseUrlPath + '/frontend/img/suggestion.png'"
                          alt="Card image cap">
                        <div class="card-body">
                          <p class="card-text">Apple 11" MacBook Air (Mid 2012) Intel Pentium III<span>$175.00</span></p>
                        </div>
                      </div>
                    </div>

                    <div class="col-md-3 clearfix d-none d-md-block">
                      <div class="card mb-2">
                        <img class="card-img-top" :src="baseUrlPath + '/frontend/img/suggestion.png'"
                          alt="Card image cap">
                        <div class="card-body">
                          <p class="card-text">Apple 11" MacBook Air (Mid 2012) Intel Pentium III<span>$175.00</span></p>
                        </div>
                      </div>
                    </div>

                  </div>
                </div>
                <!--/.Third slide-->
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
    name: 'Suggestion',
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
