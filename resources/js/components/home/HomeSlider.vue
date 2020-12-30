<template>
  <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
    <div class="carousel-inner">
      <div
        v-for="(slider, key) in homeslider"
        :key="key"
        class="carousel-item"
        :class="{ active: key === 0 }"
      >
        <img
          v-if="slider.slider_img === null"
          :src="baseUrlPath + '/uploads/slider/821600589513.jpg'"
          class="d-block w-100"
          alt=""
        />
        <img
          v-else-if="slider.slider_img != null"
          :src="baseUrlPath + '/uploads/slider/' + slider.slider_img"
          class="d-block w-100"
          alt="slider"
        />
        <!-- <img src="img/slider1.jpg" class="d-block w-100" alt="slider 1"> -->
        <div class="slider-contents">
          <h1>{{slider.slider_title}}</h1>
          <p>{{ slider.slider_description }}</p>
          <a href="store.php" class="btn">shop now</a>
        </div>
      </div>
    </div>
    <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>
</template>

<script>
export default {
  name: "HomeSlider",
  data() {
    return {
      homeslider: "",
      baseUrlPath: null,
    };
  },

  mounted() {
    this.loadHomeSlider();
    this.baseUrlPath = axios.defaults.baseURL;
  },

  methods: {
    // Main category
    loadHomeSlider() {
      axios
        .get("/api/slider")
        .then((response) => {
          this.homeslider = response.data;
        })
        .catch((error) => {
          console.error(error);
        });
    },
  },
};
</script>

<style>
/* .carousel-control-prev-icon, .carousel-control-next-icon{
        background-image: none;
    }
    span.carousel-control-prev-icon, span.carousel-control-next-icon {
        font-size: 32px;
    }
    .carousel-control-prev i.fas.fa-angle-left, .carousel-control-next i.fas.fa-angle-right {
        border: 2px solid #e6e6e6;
        color: #00cfd5;
        padding: 4px 10px;
        opacity: 0.9;
    } */
</style>
