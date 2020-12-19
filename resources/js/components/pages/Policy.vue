<template>
    <div>
    	<section id="banner-support">
        </section>
        <div class="container">
            <div class="row">
                <div class="col-12 page-title">
                    <h1>policy</h1>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-xs-12">
                    <div class="nav flex-column policy-page nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                        <a class="nav-link active" id="communication-tab" data-toggle="pill" href="#communication" role="tab" aria-controls="communication" aria-selected="true">acceptable communication</a>
                        <a class="nav-link" id="use-tab" data-toggle="pill" href="#use" role="tab" aria-controls="use" aria-selected="false">acceptable use</a>
                        <a class="nav-link" id="cookie-tab" data-toggle="pill" href="#cookie" role="tab" aria-controls="cookie" aria-selected="true">cookie</a>
                        <a class="nav-link" id="privacy-tab" data-toggle="pill" href="#privacy" role="tab" aria-controls="privacy" aria-selected="false">privacy</a>
                        <a class="nav-link" id="warranty-tab" data-toggle="pill" href="#warranty" role="tab" aria-controls="warranty" aria-selected="false">warranty & return</a>
                    </div>
                </div>
                <div class="col-lg-9 col-xs-12">
                    <div class="tab-content" id="v-pills-tabContent">
                        <div class="tab-pane fade show active" id="communication" role="tabpanel" aria-labelledby="communication-tab" v-html="general_setting.acceptable_communication">

                        </div>
                        <div class="tab-pane fade" id="use" role="tabpanel" aria-labelledby="use-tab" v-html="general_setting.acceptable_use">

                        </div>
                        <div class="tab-pane fade" id="cookie" role="tabpanel" aria-labelledby="cookie-tab" v-html="general_setting.cookie">

                        </div>
                        <div class="tab-pane fade" id="privacy" role="tabpanel" aria-labelledby="privacy-tab" v-html="general_setting.privacy_policy">

                        </div>
                        <div class="tab-pane fade" id="warranty" role="tabpanel" aria-labelledby="warranty-tab" v-html="general_setting.warranty_and_return">

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <section id="subscription" style="margin-top: 12rem">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 offset-lg-2">
                        <div class="subscribe-box">
                            <p>Join our newsletter for the latest Apple stock</p>
                            <input type="email" class="form-control subscribe-input" placeholder="Enter Your Email Here">
                            <button class="btn subscribe-btn">Subscribe</button>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="social-links">
                            <ul>
                                <li><a href="#"><i class="fab fa-instagram-square"></i></a></li>
                                <li><a href="#"><i class="fab fa-facebook-square"></i></a></li>
                                <li><a href="#"><i class="fab fa-twitter-square"></i></a></li>
                                <li><a href="#"><i class="fab fa-pinterest-square"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</template>

<script>
export default {
        name: 'Policy',
        data() {
        return {
            baseUrlPath: null,
            general_setting : {}
        };
  },

  methods : {
      getGeneralSetting () {
          const _this = this;
          axios.get(`/api/general_setting`)
              .then((response) => {
                  _this.general_setting = response.data;
              });
      }
  },

  mounted() {
            this.getGeneralSetting();
        this.baseUrlPath = axios.defaults.baseURL;
  },

};
</script>

<style>
</style>
