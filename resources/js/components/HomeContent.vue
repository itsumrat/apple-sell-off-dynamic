<template>
  <div>
    <section id="slider">
    <HomeSlider></HomeSlider>
    </section>
    <HighLights></HighLights>
    <Category></Category>
    <ShopNow></ShopNow>
    <AudioCollection></AudioCollection>
    <AboutHome></AboutHome>
    <Suggestion></Suggestion>
    <Subscription></Subscription>
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
