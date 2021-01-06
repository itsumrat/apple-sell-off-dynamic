<template>

<!--    <div>-->
        <section id="shop-now" :style="{ 'background-image': 'url(' + home_page_settings.third_sec_image + '); background-size: contain;' }">
            <div class="container">
                <div class="row">
                    <div class="col-lg-7 col-sm-12">
                        <div class="shop-now-content">
                            <p>{{ home_page_settings.third_sec_heading }} <span>{{ home_page_settings.third_sec_title }}</span></p>
                            <a href="store.php" class="btn">shop now</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
<!--    </div>-->
</template>

<script>
export default {
    props : ['home_page_settings'],
    name: 'ShopNow',

};
</script>

<style>

</style>
