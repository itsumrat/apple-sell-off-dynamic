<template>
    <div>
        <section id="highlights">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3 col-3">
                        <div class="highlights-item">
                            <img :src="baseUrlPath + '/' + home_page_settings.first_sec_image_1">
                            <h5> {{ home_page_settings.first_sect_heading_1 }} </h5>
                            <p> {{ home_page_settings.first_sect_title_1 }} </p>
                        </div>
                    </div>
                    <div class="col-lg-3 col-3">
                        <div class="highlights-item">
                            <img :src="baseUrlPath + '/' + home_page_settings.first_sec_image_2">
                            <h5> {{ home_page_settings.first_sect_heading_2 }} </h5>
                            <p> {{ home_page_settings.first_sect_title_2 }} </p>
                        </div>
                    </div>
                    <div class="col-lg-3 col-3">
                        <div class="highlights-item">
                            <img :src="baseUrlPath + '/' + home_page_settings.first_sec_image_3">
                            <h5> {{ home_page_settings.first_sect_heading_3 }} </h5>
                            <p> {{ home_page_settings.first_sect_title_3 }} </p>
                        </div>
                    </div>
                    <div class="col-lg-3 col-3">
                        <div class="highlights-item">
                            <img :src="baseUrlPath + '/' + home_page_settings.first_sec_image_4">
                            <h5> {{ home_page_settings.first_sect_heading_4 }} </h5>
                            <p> {{ home_page_settings.first_sect_title_4 }} </p>
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
