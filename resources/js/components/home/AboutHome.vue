<template>
    <div>
    	<section id="about-home">
            <div class="container">
                <div class="row">
                    <div class="offset-lg-5 col-lg-7">
                        <div class="about-home-content">
                            <h1>We combine luxury fashion  with innovative</h1>
                            <p>
                                We combine luxury fashion with innovative performance
                                technology to create outerwear that’s as useful as it is beautiful.
                                Our raincoat collection boast a stylish minimalism,
                                Olympic-level waterproof fabric, and incredible breathability
                            </p>
                            <a href="#" class="btn">learn more</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</template>

<script>
export default {
    name: 'AboutHome',
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
#about-home {
    padding: 5% 0% 15%;
}
</style>
