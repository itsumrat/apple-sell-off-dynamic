<template>
  <div>
    <section id="slider">
        <HomeSlider></HomeSlider>
    </section>
    <HighLights :home_page_settings="home_page_settings"></HighLights>
    <Category :categories_product="categories_product"></Category>
    <ShopNow :home_page_settings="home_page_settings"></ShopNow>
    <AudioCollection :home_page_settings="home_page_settings"></AudioCollection>
    <AboutHome :home_page_settings="home_page_settings"></AboutHome>
    <Suggestion :suggested_product="suggested_product"></Suggestion>
    <Subscription :home_page_settings="home_page_settings"></Subscription>
  </div>
</template>
<script>
    import HomeSlider from "./home/HomeSlider.vue";
    import HighLights from "./home/HighLights.vue";
    import Category from "./home/Category.vue";
    import ShopNow from "./home/ShopNow.vue";
    import AudioCollection from "./home/AudioCollection.vue";
    import AboutHome from "./home/AboutHome.vue";
    import Suggestion from "./home/Suggestion.vue";
    import Subscription from "./home/Subscription.vue";

    export default {
        name: "HomeContent",
        data() {
            return {
                suggested_product : {},
                home_page_settings : {},
                categories_product : {},
            };
        },

        methods : {
            getHomePageSetting () {
                const _this = this;
                axios.get(`/api/home_page_setting`)
                .then((response) => {
                    _this.home_page_settings = response.data;
                    console.log(_this.home_page_settings);
                });
            },
            getSuggestedProduct () {
                const _this = this;
                axios.get(`/api/suggested_product`)
                .then((response) => {
                    _this.suggested_product = response.data;
                });
            },
            getCateagoriesProduct () {
                const _this = this;
                axios.get(`/api/categories_product`)
                .then((response) => {
                    _this.categories_product = response.data;
                });
            },
        },

        created() {
            this.getHomePageSetting();
            this.getSuggestedProduct();
            this.getCateagoriesProduct();
        },

        components: {
            HomeSlider,
            HighLights,
            Category,
            ShopNow,
            AudioCollection,
            AboutHome,
            Suggestion,
            Subscription
        },
    };
</script>
