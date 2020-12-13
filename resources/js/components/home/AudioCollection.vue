<template>
    <div>
    	<section id="audio-collection">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-title">
                        <h1>audio collection</h1>
                        <p>We combine luxury fashion with innovative performance technology to create outerwear that’s as useful as it is beautiful. Our raincoat collection boast a stylish minimalism, Olympic-level waterproof fabric, and incredible breathability to create</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                    <div class="hovereffect">
                        <img class="img-responsive" :src="baseUrlPath + '/frontend/img/speaker.jpg'" alt="">
                        <div class="overlay">
                           <h2>Speakers</h2>
                           <!-- <a class="info" href="#">link here</a> -->
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                    <div class="hovereffect">
                        <img class="img-responsive" :src="baseUrlPath + '/frontend/img/accessories.jpg'" alt="">
                        <div class="overlay">
                           <h2>Accessories</h2>
                           <!-- <a class="info" href="#">link here</a> -->
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                    <div class="hovereffect">
                        <img class="img-responsive" :src="baseUrlPath + '/frontend/img/amplifier.jpg'" alt="">
                        <div class="overlay">
                           <h2>Power Amplifiers</h2>
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
