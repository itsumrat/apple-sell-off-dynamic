<template>
    <div class="section-space">
        <div class="section-header text-center">
            <h1>Product Categories</h1>
        </div>
        <div class="row">
            <div
                v-for="(mainCat, key) in maincategory"
                :key="key"
                class="col-6 col-md-3"
            >
                <div class="product-category">
                    <router-link
                        @click.native="
                            subcategoryshow(mainCat.id, mainCat.mc_slug)
                        "
                        to=""
                    >
                        <div class="product-cat-img">
                            <img
                                :src="
                                    baseUrlPath +
                                        '/uploads/category/' +
                                        mainCat.mcoverimage
                                "
                                class="img-fluid"
                                alt=""
                            />
                        </div>
                        <div class="product-cat-name">
                            <h1>{{ mainCat.mc_name }}</h1>
                        </div>
                    </router-link>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
export default {
    name: "MainCategory",
    data() {
        return {
            maincategory: null,
            baseUrlPath: null
        };
    },
    mounted() {
        this.loadMianCategory();
        this.baseUrlPath = axios.defaults.baseURL;
    },
    methods: {
        // Main category
        loadMianCategory() {
            axios
                .get("/api/main-category-menu")
                .then(response => {
                    this.maincategory = response.data;
                })
                .catch(error => {
                    console.error(error);
                });
        },

        subcategoryshow(id, slug) {
            this.$router.push({ name: "subcategory", params: { slug: slug } });
            localStorage.removeItem("maincategoryId");
            localStorage.setItem("maincategoryId", id);
            //location.reload();
        }
    }
};
</script>
<style>
.product-cat-name h1 {
    font-size: 15px;
    text-align: center;
    line-height: 63px;
    text-transform: capitalize;
    font-weight: 400;
    color: #615e55;
}
</style>
