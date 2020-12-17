<template>
    <div>
    	<section id="about-home" :style="{ 'background-image': 'url(' + home_page_settings.fifth_sec_image + ')' }">
            <div class="container">
                <div class="row">
                    <div class="offset-lg-5 col-lg-7">
                        <div class="about-home-content">
                            <h1>{{ home_page_settings.fifth_sec_heading }}</h1>
                            <p>{{ home_page_settings.fifth_sec_title }}</p>
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
    props : ['home_page_settings'],
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
