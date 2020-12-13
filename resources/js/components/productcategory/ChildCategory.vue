<template>
    <div>
        <div class="container">
            <div class="page-banner">
                <img
                    src="https://www.bluepixel.com.au/wp-content/uploads/2018/03/Blue-Pixel-Call-To-Action-Banner-Background.jpg"
                    alt=""
                />
            </div>
            <div class="breadcrumd-area">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <router-link :to="{ name: 'home' }">
                                Home
                            </router-link>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">
                            <router-link
                                :to="{
                                    name: 'subcategory',
                                    params: { id: this.$route.params.id }
                                }"
                            >
                                {{ mainCatname }}
                            </router-link>
                        </li>

                        <li class="breadcrumb-item active" aria-current="page">
                            {{ subCatname }}
                        </li>
                    </ol>
                </nav>
            </div>
            <div class="header-name">
                <h1>{{ subCatname }}</h1>
            </div>
            <div class="row">
                <div
                    v-for="(childCat, key) in childCategory"
                    :key="key"
                    class="col-md-2"
                >
                    <div class="childcategory-product">
                        <router-link
                            :to="{
                                name: 'child-product',
                                params: {
                                    id: childCat.id,
                                    slag: childCat.child_cat_slag
                                }
                            }"
                        >
                            <div class="childcategory-image">
                                <img
                                    :src="
                                        baseUrlPath +
                                            '/uploads/category/' +
                                            childCat.ccoverimage
                                    "
                                    class="img-fluid"
                                    alt=""
                                />
                            </div>
                            <div class="childcategory-title">
                                <a href="#">{{ childCat.cc_name }}</a>
                            </div>
                        </router-link>
                    </div>
                </div>
                <!--single-->
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "ChildCategory",
    data() {
        return {
            childCategory: "",
            baseUrlPath: null,
            subcategoryId: localStorage.getItem("subcategoryId"),
            maincategoryId: localStorage.getItem("maincategoryId")
        };
    },
    mounted() {
        this.loadChildCat();
        this.baseUrlPath = axios.defaults.baseURL;
    },
    methods: {
        // child Category
        loadChildCat() {
            axios
                .get(
                    `/api/childcategory/${this.subcategoryId}/${this.maincategoryId}`
                )
                .then(response => {
                    this.childCategory = response.data;
                })
                .catch(error => {
                    console.error(error);
                });
        }
    },

    computed: {
        subCatname() {
            let subc = this.childCategory;
            for (var i = 0; i < subc.length; i++) {
                return subc[i].sub_category_for_child.sc_name;
            }
        },
        mainCatname() {
            let mainc = this.childCategory;
            for (var i = 0; i < mainc.length; i++) {
                return mainc[i].main_category_for_child.mc_name;
            }
        }
    }
};
</script>

<style>
.childcategory-title {
    padding: 10px 5px;
    text-align: center;
}
.childcategory-title a {
    font-size: 14px;
    text-transform: capitalize;
}
.childcategory-product {
    background: #dee2e6;
    margin-bottom: 30px;
}
</style>
