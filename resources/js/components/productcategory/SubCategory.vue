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
              <router-link :to="{ name: 'home' }"> Home </router-link>
            </li>
            <li class="breadcrumb-item active" aria-current="page">
              {{ mainCatname }}
            </li>
          </ol>
        </nav>
      </div>
      <div class="header-name">
        <h1>{{ mainCatname }}</h1>
      </div>
      <div class="row">
        <div v-for="(subCat, key) in subCategory" :key="key" class="col-md-2">
          <div class="subcategory-product">
            <router-link
              @click.native="
                childcategoryhow(
                  subCat.id,
                  subCat.main_category_id,
                  subCat.sc_slug
                )
              "
              to=""
            >
              <div class="subcategory-image">
                <img
                  :src="baseUrlPath + '/uploads/category/' + subCat.scoverimage"
                  class="img-fluid"
                  alt=""
                />
              </div>
              <div class="subcategory-title">
                <router-link
                  @click.native="
                    childcategoryhow(
                      subCat.id,
                      subCat.main_category_id,
                      subCat.sc_slug
                    )
                  "
                  to=""
                  >{{ subCat.sc_name }}
                </router-link>
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
  name: "SubCategory",

  data() {
    return {
      subCategory: "",
      baseUrlPath: null,
      maincategoryId: localStorage.getItem("maincategoryId"),
    };
  },
  mounted() {
    this.loadSubCat();
    this.baseUrlPath = axios.defaults.baseURL;
  },
  methods: {
    // sub Category
    loadSubCat() {
      axios
        .get(`api/subcategory/${this.maincategoryId}`)
        .then((response) => {
          this.subCategory = response.data;
        })
        .catch((error) => {
          console.error(error);
        });
    },

    refreshData: function () {
      this.loadSubCat();
    },

    childcategoryhow(sid, mid, slug) {
      this.$router.push({
        name: "childcategory",
        params: { slug: slug },
      });
      localStorage.removeItem("subcategoryId");
      localStorage.removeItem("maincategoryId");
      localStorage.setItem("subcategoryId", sid);
      localStorage.setItem("maincategoryId", mid);
      //location.reload();
    },
  },

  computed: {
    mainCatname() {
      let mainc = this.subCategory;
      for (var i = 0; i < mainc.length; i++) {
        return mainc[i].main_category_for_sub.mc_name;
      }
    },
  },
};
</script>

<style>
.page-banner img {
  width: 100%;
  height: 200px;
}
.header-name h1 {
  text-align: center;
  margin-bottom: 35px;
  text-transform: capitalize;
  font-size: 17px;
}

.subcategory-title {
  padding: 10px 5px;
  text-align: center;
}
.subcategory-title a {
  font-size: 14px;
  text-transform: capitalize;
}
.subcategory-product {
  background: #dee2e6;
  margin-bottom: 30px;
}
/* .product-subcategory {
        margin-bottom: 30px;
        padding: 10px 0px;
        background: #ffffff;
        box-shadow: 0px 0px 25px rgba(0, 0, 0, 0.1);
        overflow: hidden;
    }
    .product-subcat-img {
        padding: 4px 5px 15px 5px;
        border-bottom: 1px solid #dfe5e9;
        -webkit-border-bottom: 1px solid #dfe5e9;
        -moz-border-bottom: 1px solid #dfe5e9;
    }
    .product-subcat-img img {
        transform: scale(1);
        -webkit-transform: scale(1);
        -moz-transform: scale(1);
        transition: all 0.5s;
        overflow: hidden;
    }
    .product-subcategory:hover .product-subcat-img img {
        transform: scale(1.1);
        -webkit-transform: scale(1.1);
        -moz-transform: scale(1.1);
    }

    .product-subcat-name {
        padding: 3px;
    }
    .product-subcat-name h1 {
        font-size: 13px;
        text-align: center;
    } */
</style>
