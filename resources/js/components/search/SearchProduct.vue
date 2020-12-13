<template>
  <div>
    <section id="product_wrapper">
      <div class="section-header">
        <h1>Products</h1>
      </div>
      <div class="row">
        <div
          v-for="(product, key) in searchproduct"
          :key="key"
          class="col-6 col-md-3"
        >
          <div class="single-product">
            <div class="product-img">
              <router-link
                :to="{ name: 'singleproduct', params: { slug: product.slug } }"
              >
                <img
                  v-if="product.feature_image === null"
                  :src="baseUrlPath + '/uploads/product/821600589513.jpg'"
                  class="img-fluid"
                  alt=""
                />
                <img
                  v-else-if="product.feature_image != null"
                  :src="
                    baseUrlPath + '/uploads/product/' + product.feature_image
                  "
                  class="img-fluid"
                  alt="ddd"
                />
              </router-link>
            </div>
            <div class="product-labels">
              <span class="featured d-none">hot</span>
            </div>
            <div class="product-detail">
              <h3 class="product-name">
                <router-link
                  :to="{
                    name: 'singleproduct',
                    params: { slug: product.slug },
                  }"
                >
                  {{ product.name }}
                </router-link>
              </h3>
              <span class="product-price-detail">
                <ins>
                  <span class="product-Price-amount amount">
                    <span class="product-Price-currencySymbol">৳</span
                    >{{
                      product.stock_product.unit_price -
                      (product.stock_product.unit_price *
                        product.stock_product.discount) /
                        100
                    }}
                  </span>
                </ins>
                <del>
                  <span class="product-Price-amount">
                    <span class="Price-currencySymbol">৳</span
                    >{{ product.stock_product.unit_price }}
                  </span>
                </del>
              </span>
              <div class="add-cart">
                <a @click="addtoCart(product)" class="btn btn-add-to-cart"
                  >Add To Cart</a
                >
              </div>
              <div class="product-block-outer">
                <div class="product-button-hover">
                  <span class="add-cart-icon">
                    <a href="#">
                      <i class="far fa-heart"></i>
                    </a>
                  </span>
                  <span class="add-cart-icon">
                    <a href="#">
                      <i class="fas fa-cart-plus"></i>
                    </a>
                  </span>
                  <span class="add-cart-icon">
                    <a href="#">
                      <i class="fas fa-eye"></i>
                    </a>
                  </span>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
</template>

<script>
import { mapActions, mapGetters } from "vuex";
export default {
  name: "SearchProduct",

  data() {
    return {
      searchproduct: null,
      baseUrlPath: null,
      productSearch: localStorage.getItem("searchproduct"),
    };
  },
  mounted() {
    this.loadProduct();
    this.baseUrlPath = axios.defaults.baseURL;
  },
  methods: {
    // add to cart option
    ...mapActions({
      addProduct: "cart/addProduct",
      removeProduct: "cart/removeProduct",
    }),

    // searchproduct show
    loadProduct() {
      axios
        .get(`api/search-products/${this.productSearch}`)
        .then((response) => {
          this.searchproduct = response.data;
          console.log(this.productSearch);
        })
        .catch((error) => {
          console.error(error);
        });
    },

    // add to cart option
    addtoCart(item) {
      if (this.countProduct(item.id) < item.stock_product.stock_quantity - 1) {
        this.addProduct(item);
      } else {
        this.$toasted.error("Product not available in stock!");
      }
    },

    countProduct(id) {
      let pro = this.products;
      if (!pro) {
        return 0;
      }
      for (var i = 0; i < pro.length; i++) {
        if (pro[i].id == id) {
          return pro[i].count;
        }
      }
      return 0;
    },

    removeFromCart(item) {
      this.removeProduct(item);
    },

    removeProductAll(id) {
      this.allProductRemove(id);
    },
  },

  computed: {
    ...mapGetters({
      products: "cart/products",
      tokenHeader: "authcheck/token",
      wproducts: "wishlist/wproducts",
    }),

    totalCount() {
      let sum = 0;
      _.each(this.products, (p) => {
        sum += p.count;
      });
      return sum;
    },

    totalPrice() {
      let sum = 0;
      _.each(this.products, (p) => {
        sum += p.count * p.price;
      });
      return sum;
    },

    totalWishlist() {
      let sum = 0;
      _.each(this.wproducts, (wp) => {
        sum += wp.wcount;
      });
      return sum;
    },
  },
};
</script>

<style>
</style>
