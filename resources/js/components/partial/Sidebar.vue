<template>
    <div id="layoutSidenav_nav">
        <nav class="sidenav shadow-right sidenav-light">
            <div class="sidenav-menu">
                <div class="nav accordion" id="accordionSidenav">
                    <a class="nav-link mt-1" href="asasa">
                        <i class="fab fa-buffer mr-1"></i>
                        <span>Offers</span
                        ><span
                            ><button class="btn btn-sm btn-info offer-btn ml-2">
                                25
                            </button></span
                        >
                    </a>
                    <a class="nav-link" href="sasa">
                        <i class="fas fa-hamsa mr-1"></i>Covid-19 Protection
                    </a>
                    <a class="nav-link" href="asasa">
                        <i class="fas fa-bullhorn mr-1"></i>New Arrival
                    </a>
                    <a class="nav-link" href="asasa">
                        <i class="fas fa-dolly-flatbed mr-1"></i>Flash Sales
                    </a>
                    <a class="nav-link" href="asasas">
                        <i class="fas fa-ruble-sign mr-1"></i>Popular
                    </a>
                    <div v-for="(mainCat, key) in maincategory" :key="key">
                        <a
                            class="nav-link collapsed"
                            @click="
                                subcategoryshow(mainCat.id, mainCat.mc_slug)
                            "
                            href="javascript:void(0);"
                            data-toggle="collapse"
                            :data-target="'#mainmenu' + mainCat.id"
                            aria-expanded="false"
                            :aria-controls="'mainmenu' + mainCat.id"
                        >
                            <img
                                :src="
                                    baseUrlPath +
                                        '/uploads/category/' +
                                        mainCat.mc_icon
                                "
                                alt="Not Image"
                                class="img-fluid rounded mr-1"
                                width="15"
                                height="15"
                            />{{ mainCat.mc_name }}
                            <div class="sidenav-collapse-arrow">
                                <i class="fas fa-angle-down"></i>
                            </div>
                        </a>
                        <div
                            class="collapse"
                            :id="'mainmenu' + mainCat.id"
                            data-parent="#accordionSidenav"
                        >
                            <nav
                                class="sidenav-menu-nested nav accordion"
                                id="accordionSidenavPagesMenu"
                            >
                                <div
                                    v-for="(subCat, key) in mainCat.subcategory"
                                    :key="key"
                                >
                                    <a
                                        class="nav-link collapsed"
                                        href="javascript:void(0);"
                                        data-toggle="collapse"
                                        :data-target="'#submenu' + subCat.id"
                                        aria-expanded="false"
                                        :aria-controls="'submenu' + subCat.id"
                                    >
                                        {{ subCat.sc_name }}
                                        <div class="sidenav-collapse-arrow">
                                            <i class="fas fa-angle-down"></i>
                                        </div>
                                    </a>
                                    <div
                                        class="collapse"
                                        :id="'submenu' + subCat.id"
                                        data-parent="#accordionSidenavPagesMenu"
                                    >
                                        <nav class="sidenav-menu-nested nav">
                                            <a
                                                v-for="(chCat,
                                                key) in subCat.childcategory"
                                                :key="key"
                                                class="nav-link"
                                                href="#"
                                                >{{ chCat.cc_name }}</a
                                            >
                                        </nav>
                                    </div>
                                </div>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
            <div class="sidenav-footer">
                <div class="sidenav-footer-content">
                    <div class="sidenav-footer-subtitle"></div>
                    <div class="sidenav-footer-title"></div>
                </div>
            </div>
        </nav>
    </div>
</template>
<script>
export default {
    name: "Sidebar",

    data() {
        return {
            maincategory: "",
            baseUrlPath: null
        };
    },

    mounted() {
        this.loadMainCategory();
        this.baseUrlPath = axios.defaults.baseURL;
    },

    methods: {
        // main Category
        loadMainCategory() {
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
            location.reload();
        }
    }
};
</script>
<style>
button.btn.btn-sm.btn-info.offer-btn.ml-2 {
    border-radius: inherit;
    width: 30px;
    height: 27px;
}
</style>
