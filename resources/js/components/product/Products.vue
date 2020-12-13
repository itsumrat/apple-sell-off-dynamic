<template>
  <div>
    <section id="product_wrapper">
      <div class="section-header">
        <h1>Products</h1>
      </div>
      <div class="row">
        <div v-for="(product, key) in allproducts" :key="key" class="col-6 col-md-3">
          <div class="single-product">
            <div class="product-img">
              <router-link :to="{name: 'singleproduct', params:{id:product.id}}">
                <img v-if="product.feature_image === null" :src="baseUrlPath + '/uploads/product/821600589513.jpg'" class="img-fluid" alt="">
                <img v-else-if="product.feature_image != null" :src="baseUrlPath + '/uploads/product/' + product.feature_image" class="img-fluid" alt="ddd">

              </router-link>
            </div>
            <div class="product-labels">
              <span class="featured d-none">hot</span>
            </div>
            <div class="product-detail">
                <h3 class="product-name">
                    <router-link :to="{name: 'singleproduct', params:{id: product.id}}">
                        {{ product.name }}
                    </router-link>
                </h3>
              <span class="product-price-detail">
                <ins>
                  <span class="product-Price-amount amount">
                    <span class="product-Price-currencySymbol">৳</span>{{ product.stock_product.unit_price - ((product.stock_product.unit_price*product.stock_product.discount)/100) }}
                  </span>
                </ins>
                <del>
                  <span class="product-Price-amount">
                    <span class="Price-currencySymbol">৳</span>{{ product.stock_product.unit_price }}
                  </span>
                </del>
              </span>
              <div class="add-cart">
                <a @click="addtoCart(product)" class="btn btn-add-to-cart">Add To Cart</a>
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
  name: "AppleProducts",

  data() {
    return {
      allproducts: null,
      baseUrlPath: null,
    };
  },
  mounted() {
    this.loadProduct ();
    this.baseUrlPath = axios.defaults.baseURL;
  },
  methods: {
    // add to cart option
    ...mapActions({
      addProduct: "cart/addProduct",
      removeProduct: "cart/removeProduct"
    }),

    // allproducts show
    loadProduct () {
      axios.get("/api/products")
        .then((response) => {
          this.allproducts = response.data;
        })
        .catch((error) => {
          console.error(error);
        });
    },

    // add to cart option
    addtoCart(item) {
      if (this.countProduct(item.id) < (item.stock_product.stock_quantity - 1)) {
        this.addProduct(item);
      } else {
        this.$toasted.error("Product not available in stock!");
      }
      console.log(item);
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
      wproducts: "wishlist/wproducts"
    }),

    totalCount() {
      let sum = 0;
      _.each(this.products, p => {
        sum += p.count;
      });
      return sum;
    },

    totalPrice() {
      let sum = 0;
      _.each(this.products, p => {
        sum += p.count * p.price;
      });
      return sum;
    },

    totalWishlist() {
      let sum = 0;
      _.each(this.wproducts, wp => {
        sum += wp.wcount;
      });
      return sum;
    }
  }
};
</script>

<style>
    .veiw-all {
    text-align: center;
    margin: 0 auto;
    background: #555555;
    width: 116px;
    height: 41px;
    line-height: 42px;
    -webkit-transition: all 0.3s;
    -moz-transition: all 0.3s;
    transition: all 0.3s;
    }
    .veiw-all a {
    color: #fff;
    text-transform: uppercase;
    }
    .veiw-all:hover {
    background: #00A7AD   ;
    }
    .veiw-all.mb-10 {
    margin-bottom: 20px;
    }
    span.add-cart-icon a {
        cursor: pointer;
    }
    .product-cat-img {
        float: left;
        width: 30px;
        height: 30px;
        overflow: hidden;
        margin-top: 17px
    }

    span.product-Price-currencySymbol {
        font-size: 15px;
        font-weight: 800;
    }
    .product-cat-img img {
        width: 100%;
        height: 100%;
        -webkit-translate: all .5s;
        -moz-translate: all .5s;
        translate: all .5s
    }

    .product-subcat-name {
        margin-top: 6px
    }

    .product-category {
        border: 1px solid #d3d3d3;
        height: 81px;
        margin-bottom: 15px;
        padding: 10px;
        box-shadow: 0 0 25px rgba(0, 0, 0, .1);
        -moz-box-shadow: 0 0 25px rgba(0, 0, 0, .1);
        -webkit-box-shadow: 0 0 25px rgba(0, 0, 0, .1)
    }

    .product-category:hover .product-cat-img img {
        transform: scale(1.1);
        -webkit-transform: scale(1.1);
        -moz-transform: scale(1.1)
    }

    .product-cat-img {
        transition: all .5s;
        transform: scale(1);
        -webkit-transform: scale(1);
        -moz-transform: scale(1);
        overflow: hidden
    }

    .section-header {
        margin: 18px 0 30px 0
    }

    .section-header h1 {
        text-align: left;
        position: relative;
        border-bottom: 2px solid #e6e6e6;
        font-size: 20px;
        font-weight: 400;
        padding-bottom: 15px
    }

    .section-header h1:before {
        content: "";
        border-left: 188px solid #00cfd5;
        position: absolute;
        left: 0;
        top: auto;
        height: 2px;
        bottom: -2px
    }

    .menu-list span {
        float: right;
        margin-right: 6px
    }

    .single-product {
        transition: box-shadow .3s ease-in-out;
        padding: 0px 0px 5px 0px;
        position: relative;
        margin-bottom: 30px;
        background: #fff
    }



    .single-product:hover {
        box-shadow: 0 0 10px rgba(0, 0, 0, .15);
        z-index: 91
    }

    .single-product .product-labels {
        position: absolute;
        top: 7px;
        left: 5px;
        background: #00cfd5   ;
        color: #fff;
        font-size: 10px;
        padding: 2px 7px;
        text-align: center;
        text-transform: uppercase;
        line-height: 15px
    }

    .single-product .star-rating {
        margin-bottom: 5px
    }

    .single-product .star-rating svg {
        color: #00cfd5   ;
        font-size: 13px
    }

    .product-detail {
        padding: 10px 2px;
        text-align: center;
        position: relative;
        margin-bottom: 13px;
    }

    span.product-Price-amount.amount {
        margin-right: 12px;
        text-decoration: none
    }

    .product-detail .add-cart {
        margin-top: 6px
    }

    a.btn.btn-add-to-cart.buy-now {
        margin-right: 15px;
    }

    .product-detail a.btn.btn-add-to-cart {
        background: #00cfd5;
        padding: 4px 10px;
        font-size: 12px;
        text-align: center;
        text-transform: capitalize;
        color: #fff;
        transition: .3s;
        -webkit-transition: .3s;
        -moz-transition: .3s;
        -o-transition: .3s;
        border-radius: none;
        border-radius: inherit;
        margin-top: 2px;
    }

    .single-product h3.product-name {
        font-size: 13px;
        line-height: 20px;
        margin-top: 14px;
        font-weight: 400;
        margin-bottom: 5px;
        text-transform: capitalize;
    }

    .single-product:hover a.btn.btn-add-to-cart {
        background: #00A7AD;
    }

    .product-button-hover {
        position: absolute;
        top: -24px;
        left: 0;
        right: 0;
        justify-content: center;
        margin: 0 auto;
        -webkit-transition: all .3s ease;
        -moz-transition: all .3s ease;
        transition: all .3s ease;
        -moz-transform: translateY(15px);
        -webkit-transform: translateY(15px);
        transform: translateY(15px);
        visibility: hidden;
        z-index: 9
    }

    .single-product:hover .product-button-hover {
        opacity: 1;
        visibility: visible;
        -moz-transform: translate(0);
        -webkit-transform: translate(0);
        transform: translate(0)
    }

    .product-button-hover span {
        border-right: 1px solid #d3d3d3;
        background-color: #fff;
        margin-top: -10px
    }

    .product-button-hover span.add-cart-icon svg {
        font-family: 15px
    }

    .product-button-hover span {
        padding: 5px 10px
    }

    span.add-cart-icon:last-child {
        border-right: none
    }

    .product-button-hover span:hover {
        /* background: #00A7AD */
        color: #00A7AD;
    }

    .product-button-hover span:hover svg {
        color: #fff
    }
</style>
