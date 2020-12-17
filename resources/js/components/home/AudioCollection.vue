<template>
    <div>
    	<section id="audio-collection">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-title">
                        <h1> {{ home_page_settings.four_sec_main_heading }} </h1>
                        <p> {{ home_page_settings.four_sec_main_title }} </p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                    <div class="hovereffect">
                        <img class="img-responsive" :src="home_page_settings.four_sec_image_1" alt="">
                        <div class="overlay">
                           <h2> {{ home_page_settings.four_sect_title_1 }} </h2>
                           <!-- <a class="info" href="#">link here</a> -->
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                    <div class="hovereffect">
                        <img class="img-responsive" :src="home_page_settings.four_sec_image_2" alt="">
                        <div class="overlay">
                            <h2> {{ home_page_settings.four_sect_title_2 }} </h2>
                           <!-- <a class="info" href="#">link here</a> -->
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                    <div class="hovereffect">
                        <img class="img-responsive" :src="home_page_settings.four_sec_image_3" alt="">
                        <div class="overlay">
                            <h2> {{ home_page_settings.four_sect_title_3 }} </h2>
                           <!-- <a class="info" href="#">link here</a> -->
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
    props : ['home_page_settings'],
    name: 'AudioCollection',
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
