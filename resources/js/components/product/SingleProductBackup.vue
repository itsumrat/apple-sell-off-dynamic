<template>
    <div class="container">
        <Breadcrumb></Breadcrumb>
        <div class="row">
            <div class="col-12 col-md-4">
                <div class="product-single">
                    <div class="product-img pzoomimg">
                        <ProductZoomer
                            :base-images="images"
                            :base-zoomer-options="zoomerOptions"
                        />
                        <!-- <img
              :src="
                    baseUrlPath + '/uploads/product/' + product.feature_image
                  "
              alt="Not Image"
              class="img-fluid"
            /> -->
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-6 product-description">
                <div class="product-detail text-left">
                    <h3 class="product-name">{{ product.name }}</h3>
                    <div class="product-ratting">
                        <div class="singlestar-rating">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                        </div>
                        <div class="ratting-count">
                            <a href="#">21 Rattings |</a>
                            <a href="#">18 Answered Questions</a>
                        </div>
                        <div class="product-share">
                            <div class="share">
                                <a href="#">
                                    <i class="fas fa-share-alt"></i>
                                </a>
                                <a href="#">
                                    <i class="fas fa-heart"></i>
                                </a>
                            </div>
                        </div>
                        <div class="product-tag">
                            <h4>
                                Tag:
                                <a href="#">{{ product.tag }}</a>
                            </h4>
                        </div>
                        <div class="product-brand">
                            <!-- <h4>Brand: <a href="">Bata</a> | <a href="">More men from Bata</a></h4> -->
                            <h4>
                                Brand:
                                <a href="#">{{
                                    product.product_brand
                                        ? product.product_brand.brand_id
                                        : "None"
                                }}</a>
                            </h4>
                        </div>
                    </div>
                    <span class="product-price-detail">
                        <ins>
                            <span class="product-Price-amount amount">
                                <span class="product-Price-currencySymbol"
                                    >৳</span
                                >
                            </span>
                        </ins>
                        <del>
                            <span class="product-Price-amount">
                                <span class="Price-currencySymbol">৳</span>
                            </span>
                        </del>
                    </span>
                    <div class="cart-option">
                        <div class="add-cart single-cart">
                            <div
                                class="bookmark"
                                v-if="countProduct(product.id) < 1"
                            >
                                <a
                                    @click="addtoCart(product)"
                                    class="btn btn-add-to-cart buy-now singe-btn"
                                    >Add to Cart</a
                                >
                            </div>
                            <div
                                class="read-more"
                                v-if="countProduct(product.id) >= 1"
                            >
                                <div class="number">
                                    <a @click="removeFromCart(product)">
                                        <i
                                            style="margin-right:20px; color:red"
                                            class="fa fa-minus-circle fa-lg"
                                        ></i>
                                    </a>
                                    <span class="btn btn-sm btn-success">
                                    </span>
                                    <a @click="addtoCart(product)">
                                        <i
                                            style="margin-left:20px; color:green"
                                            class="fa fa-plus-circle fa-lg"
                                        ></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                    <div class="short-description">
                        <h3 class="short-description-title"></h3>
                        <div class="short-feature">
                            <h4>
                                Availability:
                                <b>In stock</b>
                            </h4>
                            <h4>Sku:</h4>
                            <h4>Product Type: Sneakers</h4>
                            <h4>Color: Black</h4>
                            <h4>Main Material: Fabric</h4>
                            <h4>Gender: Men</h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="single-product-description">
                    <h3 class="product-des">Description</h3>
                    <p></p>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
import { mapActions, mapGetters } from "vuex";
import Breadcrumb from "../partial/Breadcrumb.vue";

export default {
    name: "SingleProduct",
    components: {
        Breadcrumb
    },

    data() {
        return {
            quantity: 1,
            product: {},
            baseUrlPath: null,
            productId: localStorage.getItem("productId"),
            firstImg: "",
            secondImg: "",
            thirdImg: "",
            fourthImg: "",
            variantImages: { thumbs: [], normal_size: [] },
            zoomerOptions: {
                zoomFactor: 3,
                pane: "pane",
                hoverDelay: 300,
                namespace: "zoomer-bottom",
                move_by_click: false,
                scroll_items: 2,
                choosed_thumb_border_color: "#dd2c00",
                scroller_position: "bottom",
                zoomer_pane_position: "right"
            }
        };
    },

    created() {
        axios.get(`/api/product/${this.productId}`).then(response => {
            this.product = response.data;
            console.log(this.product);
            //  let imageGallery = this.product.image_gallery_edit;
            //     for (let i = 0; i < imageGallery.length; i++) {
            //     this.variantImages.thumbs = [{'id': imageGallery[i].id, 'url' : this.baseUrlPath + '/uploads/product/' + imageGallery[i].image_gallery}],
            //     this.variantImages.normal_size = [{'id': imageGallery[i].id, 'url' : this.baseUrlPath + '/uploads/product/' + imageGallery[i].image_gallery}]
            //     }

            // this.variantImages.thumbs = [
            //     {
            //     'id': 1,
            //     'url': 'https://demo.fantasticplugins.com/woocommerce-product-image-watermark/wp-content/uploads/sites/68/2018/06/p-5.jpg'
            //     },
            //     {
            //     'id': 2,
            //     'url': 'https://galen.edu.bz/wp-content/uploads/2014/07/jpeg-13.jpg'
            //     }
            // ],
            // this.variantImages.normal_size = [
            //     {
            //     'id': 1,
            //     'url': 'https://demo.fantasticplugins.com/woocommerce-product-image-watermark/wp-content/uploads/sites/68/2018/06/p-5.jpg'
            //     },
            //     {
            //     'id': 2,
            //     'url': 'https://galen.edu.bz/wp-content/uploads/2014/07/jpeg-13.jpg'
            //     }
            // ]
        });
    },

    mounted() {
        this.baseUrlPath = axios.defaults.baseURL;

        // this.loadCustomer();
    },

    methods: {
        // add to cart option
        ...mapActions({
            addProduct: "cart/addProduct",
            removeProduct: "cart/removeProduct"
        }),

        // add to cart option
        addtoCart(item) {
            this.addProduct(item);
            //console.log(item);
        },
        removeFromCart(item) {
            this.removeProduct(item);
        },

        removeProductAll(id) {
            this.allProductRemove(id);
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
        }

        // loadCustomer() {
        //     axios
        //         .get("api/customer")
        //         .then(response => {
        //             this.customer = response.data;
        //             console.log(response.data);
        //         })
        //         .catch(err => {
        //             console.error(err);
        //         });
        //     }
    },

    computed: {
        ...mapGetters({
            products: "cart/products"
        }),
        totalPrice() {
            let sum = 0;
            _.each(this.products, p => {
                sum += p.count * p.price;
            });
            return sum;
        },

        proImage() {
            // let imageGallery = this.product.image_gallery_edit;
            // for (var i = 0; i < imageGallery.length; i++) {
            //     return {
            //         thumbs: [
            //             {
            //             id: imageGallery[i].id,
            //             url: this.baseUrlPath + '/uploads/product/' + imageGallery[i].image_gallery
            //             }
            //         ],
            //         normal_size: [
            //             {
            //             id: imageGallery[i].id,
            //             url: this.baseUrlPath + '/uploads/product/' + imageGallery[i].image_gallery
            //             }
            //         ]
            //     }
            // }
        },

        images() {
            // return {
            //     'thumbs': [
            //         {
            //         'id': this.firstImg.id,
            //         'url': this.baseUrlPath + '/uploads/product/' + this.firstImg.image_gallery
            //         },
            //         {
            //         'id': this.secondImg.id,
            //         'url': this.baseUrlPath + '/uploads/product/' + this.secondImg.image_gallery
            //         },
            //         {
            //         'id': this.thirdImg.id,
            //         'url': this.baseUrlPath + '/uploads/product/' + this.thirdImg.image_gallery
            //         },
            //         {
            //         'id': this.fourthImg.id,
            //         'url': this.baseUrlPath + '/uploads/product/' + this.fourthImg.image_gallery
            //         }
            //     ],
            //     'normal_size': [
            //         {
            //         'id': this.firstImg.id,
            //         'url': this.baseUrlPath + '/uploads/product/' + this.firstImg.image_gallery
            //         },
            //         {
            //         'id': this.secondImg.id,
            //         'url': this.baseUrlPath + '/uploads/product/' + this.secondImg.image_gallery
            //         },
            //         {
            //         'id': this.thirdImg.id,
            //         'url': this.baseUrlPath + '/uploads/product/' + this.thirdImg.image_gallery
            //         },
            //         {
            //         'id': this.fourthImg.id,
            //         'url': this.baseUrlPath + '/uploads/product/' + this.fourthImg.image_gallery
            //         }
            //     ]
            // }
            return {
                thumbs: [
                    {
                        id: 1,
                        url:
                            "https://demo.fantasticplugins.com/woocommerce-product-image-watermark/wp-content/uploads/sites/68/2018/06/p-5.jpg"
                    },
                    {
                        id: 2,
                        url:
                            "https://galen.edu.bz/wp-content/uploads/2014/07/jpeg-13.jpg"
                    },
                    {
                        id: 3,
                        url:
                            "https://demo.fantasticplugins.com/woocommerce-product-image-watermark/wp-content/uploads/sites/68/2018/06/p-5.jpg"
                    },
                    {
                        id: 4,
                        url:
                            "https://galen.edu.bz/wp-content/uploads/2014/07/jpeg-13.jpg"
                    }
                ],
                normal_size: [
                    {
                        id: 1,
                        url:
                            "https://demo.fantasticplugins.com/woocommerce-product-image-watermark/wp-content/uploads/sites/68/2018/06/p-5.jpg"
                    },
                    {
                        id: 2,
                        url:
                            "https://galen.edu.bz/wp-content/uploads/2014/07/jpeg-13.jpg"
                    },
                    {
                        id: 3,
                        url:
                            "https://demo.fantasticplugins.com/woocommerce-product-image-watermark/wp-content/uploads/sites/68/2018/06/p-5.jpg"
                    },
                    {
                        id: 4,
                        url:
                            "https://galen.edu.bz/wp-content/uploads/2014/07/jpeg-13.jpg"
                    }
                ]
            };
        }
    }
};
</script>

<style>
.product-img.pzoomimg img {
    width: 328px;
    margin-top: -110px !important;
}
.thumb-list {
    width: 332px !important;
    margin-top: -192px !important;
}

.thumb-list {
    height: 376px;
    width: 76.6px;
    grid-template-rows: calc(100% / 6 / 2) repeat(4, auto) calc(100% / 6 / 2);
    visibility: visible !important;
}

.btn-secondary:not(:disabled):not(.disabled),
.btn-secondary:not(:disabled):not(.disabled).active,
.show > .btn-secondary.dropdown-toggle {
    color: #000;
    background-color: #fff;
    border-color: #ff9f00;
    margin-right: 8px;
}

button.btn.comment-btn.btn-secondary {
    background-color: #ff9f00;
    color: #fff;
}

.btn-secondary:not(:disabled):not(.disabled):active,
.btn-secondary:not(:disabled):not(.disabled).active,
.show > .btn-secondary.dropdown-toggle {
    color: #fff;
    background-color: #ff9f00;
    border-color: #ff9f00;
}

.comment-view {
    margin-top: 17px;
    margin-bottom: 30px;
}

.comment-view h3 {
    font-size: 17px;
}

.commentview-rating svg {
    font-size: 18px;
    margin: 0px 5px;
    color: #ff9f00;
}

.comment-name {
    float: left;
    margin-right: 15px;
}

.comment-name p {
    line-height: 15px;
}

.product-comment p {
    margin-top: -10px;
    position: absolute;
    font-size: 14px;
}

.commentview-rating {
    margin-bottom: 5px;
}

.customer-verified p {
    color: green;
    line-height: 15px;
}

.prouct-qty {
    float: left;
    margin-right: 5px;
}

a.btn.btn-add-to-cart.buy-now.singe-btn {
    width: 124px;
    height: 47px;
    line-height: 36px;
    font-size: 13px;
    margin-right: 5px;
}

.prouct-qty h4 {
    font-size: 15px;
    line-height: 35px;
    padding-top: 5px;
    padding-right: 5px;
}

pre {
    background: #eee;
    padding: 1rem;
    border-radius: 5px;
}

.quantity-toggle {
    display: -webkit-box;
    display: flex;
}

.quantity-toggle input {
    border: 0;
    border-top: 2px solid #ddd;
    border-bottom: 2px solid #ddd;
    width: 2.5rem;
    text-align: center;
    padding: 0 0.5rem;
}

.quantity-toggle button {
    border: 2px solid #ddd;
    padding: 0.5rem;
    background: #f5f5f5;
    color: #888;
    font-size: 1rem;
    cursor: pointer;
}

button.btn.comment-btn {
    background: #ff9f00;
    padding: 9px 25px;
    border: none;
}

.reviewresult {
    position: relative;
}

.reviewresult:after {
    position: absolute;
    content: "";
    top: 0;
    right: -37px;
    width: 3px;
    height: 100%;
    background: #ddd;
}

a.cwriten-btn {
    background: #ff9f00;
    padding: 12px 25px;
    color: #fff;
    margin-bottom: 10px;
}

.comment-writen {
    margin-top: 52px;
    margin-left: 48px;
}

.comment-writen p {
    margin-top: 12px;
    line-height: 14px;
}

.review-result {
    margin-bottom: 15px;
}

.checked {
    color: orange;
}

/* Three column layout */

.side {
    float: left;
    width: 15%;
    margin-top: 10px;
}

.middle {
    margin-top: 10px;
    float: left;
    width: 70%;
}

/* Place text to the right */

.right {
    text-align: right;
}

.bar-container {
    width: 100%;
    background-color: #f1f1f1;
    text-align: center;
    color: white;
}

/* Individual bars */

.bar-5 {
    width: 60%;
    height: 18px;
    background-color: #e1e1e1;
}

.bar-4 {
    width: 30%;
    height: 18px;
    background-color: #e1e1e1;
}

.bar-3 {
    width: 10%;
    height: 18px;
    background-color: #e1e1e1;
}

.bar-2 {
    width: 4%;
    height: 18px;
    background-color: #e1e1e1;
}

.bar-1 {
    width: 15%;
    height: 18px;
    background-color: #e1e1e1;
}

/* Responsive layout - make the columns stack on top of each other instead of next to each other */

@media (max-width: 400px) {
    .side,
    .middle {
        width: 100%;
    }
    .right {
        display: none;
    }
}

.totatrating-result {
    padding-top: 51px;
}

.r-result h1 {
    font-size: 50px;
}

.review-result h2 {
    font-size: 17px;
    text-transform: capitalize;
    margin-bottom: 1px;
}

.r-result {
    float: left;
    margin-right: 10px;
}

.rating-result {
    position: absolute;
    margin-top: -1px;
    margin-left: 42px;
    font-size: 13px;
}

h2.customer-head {
    font-size: 19px;
    text-transform: capitalize;
    margin-bottom: 10px;
}

.reviews {
    margin-bottom: 18px;
}

.customer-reviews svg:not(:root).svg-inline--fa {
    overflow: visible;
    margin: 2px;
}

.customer-reviews {
    background: #fcfcfc;
    padding: 10px 15px;
}

.customer-reviews h2 {
    font-size: 17px;
    margin-bottom: 2px;
}

.review-ratingname h4 {
    float: left;
    font-size: 13px;
    font-weight: 600;
    width: 88px;
    margin-top: 10px;
}

reviews-rating svg.svg-inline--fa.fa-star.fa-w-18 {
    /* line-height: 37px; */
    margin-top: 6px;
}

.product-size h4 {
    font-size: 15px;
}

.prouct-qty h4 {
    font-size: 15px;
}

.custom-control-input:checked ~ .custom-control-label::before {
    color: #fff;
    border-color: #ff9f00;
    background-color: #ff9f00;
}

.product-color h4 {
    font-size: 15px;
    margin-bottom: 0px;
}

.custom-control-input:checked ~ .custom-control-label::before {
    color: #fff;
    border-color: #ff9f00;
    background-color: #ff9f00;
}

.custom-control-input:not(:disabled):active ~ .custom-control-label::before {
    color: #fff;
    background-color: #f19b10;
    border-color: #f19b10;
}

.share a {
    margin-left: 28px;
}

.ratting-count a {
    font-size: 15px;
}

.ratting-count {
    float: left;
}

h3.product-des {
    font-size: 17px;
    padding-bottom: 0px;
    margin-bottom: 0px;
}

.product-brand h4 {
    font-size: 15px;
}

.product-brand a {
    font-size: 15px;
    color: #1d9db8;
}

.product-tag h4 {
    font-size: 15px;
    margin-bottom: 0px;
}

.product-tag a {
    font-size: 15px;
    color: #1d9db8;
}

.product-brand a {
    color: #1d9db8;
}

.product-brand a:hover {
    color: #13c5eb;
}

.product-detail {
    padding: 2px 5px;
    text-align: center;
    position: relative;
}

.product-detail h3 {
    font-size: 18px;
    margin-bottom: 1px;
}

.cart-option a.btn.btn-add-to-cart.buy-now {
    float: left;
}

.short-description {
    margin-top: 10px;
}

.short-description h3.short-description-title {
    font-size: 16px;
    text-transform: capitalize;
}

.short-description h3 {
    margin: 0px;
}

.short-feature h4 {
    margin: 0px;
    font-size: 15px;
    padding: 0px;
    line-height: 24px;
}

.product-single {
    margin-bottom: 30px;
}

.add-cart.single-cart {
    margin-top: 10px;
}

.singlestar-rating {
    margin-top: -5px;
}

.singlestar-rating svg {
    color: #ff9f00;
    font-size: 19px;
    margin-right: 5px;
}

.ratting-count a {
    color: #1d9db8;
}

.ratting-count a:hover {
    color: #13c5eb;
}

.product-ratting {
    margin-bottom: 10px;
}
</style>
