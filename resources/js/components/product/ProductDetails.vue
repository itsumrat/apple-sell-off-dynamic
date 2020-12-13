<template>
	<div>
		<div class="container">
		    <div class="row">
		        <div class="col-md-6 col-sm-12">
		            <div class="product-detail-left">
		                <div class="product-slider">
		                    <div id="carousel" class="carousel slide" data-ride="carousel">
		                        <div class="carousel-inner">
		                            <div v-for="(galley, key) in product.image_gallery_edit" :key="key" class="carousel-item" :class="{ active: key === 0 }" :id="'carousel' + galley.id"> <img v-if="galley.image_gallery != null" :src="baseUrlPath + '/uploads/product/' + galley.image_gallery" class="image" alt=""> </div>
		                        </div>
		                    </div>
		                    <div class="clearfix">
		                        <div id="thumbcarousel" class="carousel slide" data-interval="false">
		                            <div class="carousel-inner">
		                                <div v-for="(galley, key) in product.image_gallery_edit" :key="key" class="carousel-item" :class="{ active: key === 0 }">
		                                    <!-- <div data-target="#carousel" data-slide-to="0" class="thumb"><img v-if="galley.image_gallery === null" :src="baseUrlPath + '/frontend/img/macbookpro.png'" alt=""></div> -->
		                                    <div :data-target="'#carousel' + galley.id"  data-slide-to="0" class="thumb"><img v-if="galley.image_gallery != null" :src="baseUrlPath + '/uploads/product/' + galley.image_gallery" class="image" alt=""></div>
		                                </div>
		                            </div>
		                            <!-- /carousel-inner -->
		                            <a class="left carousel-control" href="#thumbcarousel" role="button" data-slide="prev"> <i class="fa fa-angle-left" aria-hidden="true"></i> </a> <a class="right carousel-control" href="#thumbcarousel" role="button" data-slide="next"><i class="fa fa-angle-right" aria-hidden="true"></i> </a>
		                        </div>
		                        <!-- /thumbcarousel -->
		                    </div>
		                </div>
		            </div>
		        </div>
		        <div class="col-md-6 col-sm-12">
		            <div class="product-detail-right">
		                <h2>{{ product.name }}</h2>
		                <h5>Description</h5>
		                <p>{{ description }}</p>
		                <hr>
		                <div class="processor">
                            <b>Processor</b>
                            <div class="configuration-item-active rounded p-4 mt-1 mb-5 processor_default" @click="additional_price_set(4, 0, 'processor_default')">
                                <b>{{product.pro_processor.processors_type}}</b>
                            </div>
                            <!--Additional-->
                            <div v-for="(value, index) in product.additional_processor" :class="'configuration-item rounded p-4 mt-1 mb-5 processor_additional'+index" @click="additional_price_set(4, value.price, 'processor_additional'+index)">
                                <b>{{value.processor.processors_type}}</b>
                                <span style="float: right; margin: 18px -12px 0px 10px;">+{{value.price}}$</span>
                            </div>
                        </div>

                        <div class="ram">
                            <b>RAM</b>
                            <div class="configuration-item-active rounded p-4 mt-1 mb-5 ram_default" @click="additional_price_set(1, 0, 'ram_default')">
                                <b>{{product.pro_ram.ram_size}} GB</b>
                            </div>
                            <!--Additional-->
                            <div v-for="(value, index) in product.additional_ram" :class="'configuration-item rounded p-4 mt-1 mb-5 additional_ram'+index" @click="additional_price_set(1, value.price, 'additional_ram'+index)">
                                <b>{{value.ram.ram_size +' '+ value.ram.ram_sign}} </b>
                                <span style="float: right; margin: 18px -12px 0px 10px;">+{{value.price}}$</span>
                            </div>
                        </div>

		                <b>Graphics</b>
                        <div class="graphics">
                            <div class="configuration-item-active rounded p-4 mt-1 mb-5 graphics_default" @click="additional_price_set(3, 0, 'graphics_default')">
                                <b>{{product.pro_graphicscard.graphics_card_size}} GB</b>
                            </div>
                            <!--Additional-->
                            <div v-for="(value, index) in product.additional_graphics_card" :class="'configuration-item rounded p-4 mt-1 mb-5 graphics_additional'+index" @click="additional_price_set(3, value.price, 'graphics_additional'+index)">
                                <b>{{value.graphics_card.graphics_card_size}} GB</b>
                                <span style="float: right; margin: 18px -12px 0px 10px;">+{{value.price}}$</span>
                            </div>
                        </div>

                        <div class="storage">
                            <b>Storage</b>
                            <div class="configuration-item-active rounded p-4 mt-1 mb-5 storage_default" @click="additional_price_set(2, 0, 'storage_default')">
                                <b>{{product.pro_harddrive.hard_drive_size}} GB</b>
                            </div>
                            <!--Additional-->
                            <div v-for="(value, index) in product.additional_hard_drive" :class="'configuration-item rounded p-4 mt-1 mb-5 storage_additional'+index" @click="additional_price_set(2, value.price, 'storage_additional'+index)">
                                <b>{{value.hard_drive.hard_drive_size}} GB</b>
                                <span style="float: right; margin: 18px -12px 0px 10px;">+{{value.price}}$</span>
                            </div>
                        </div>

		                <b>Keyboard Language</b>
		                <select class="form-control mt-1 mb-5" style="height: calc(3.9em + 0.75rem + -19px)">
		                    <option> Backlit Keyboard - US English </option>
		                    <option> Backlit Keyboard - Arabic </option>
		                    <option> Backlit Keyboard - British </option>
		                </select>
		                <h4><b>Pre-Installed Software</b></h4>
		                <h6><b>None</b></h6>
		                <div class="configuration-item rounded p-4 mt-1 mb-5">
		                    <b>1TB FUSION</b>
		                </div>
		                <h6><b>Adobe XD 2019</b></h6>
		                <div class="more-software">
		                    <div class="rounded p-3 pt-4">None</div>
		                    <div class="rounded p-3">
		                        <b class="mb-1">Adobe XD 2019</b><br>
		                        <span>+ $300</span>
		                    </div>
		                </div>
		            </div>
		        </div>
		        <div class="col-12">
		            <hr>
		            <div class="inside-box">
		                <h4><b>What's in the Box?</b></h4>
		                <div class="box_item" style="display: inline-flex;">
                            <figure v-for="(value, index) in product.box_item" style="margin: 10px;">
                                <img :src="baseUrlPath + '/uploads/product/' + value.image" :alt="value.name">
                                <figcaption>{{ value.name }}</figcaption>
                            </figure>
                        </div>
		            </div>
		        </div>
		    </div>
		</div>
		<div class="price-box">
		    <div class="container">
		        <div class="row">
		            <div class="col-12">
		                <div class="price-box-contents">
		                    <h1>${{ unit_price }} <span>Your product price</span></h1>
		                    <button type="submit" class="btn mb-5" style="border: 1px solid rgb(0, 119, 204);color: #fff;background: linear-gradient(rgb(66, 161, 236), rgb(0, 112, 201));">Add to basket</button>
		                </div>
		            </div>
		        </div>
		    </div>
		</div>
	</div>
</template>
<script>
import { mapActions, mapGetters } from "vuex";
export default {
    name: "ProductDetails",
    data() {
    	return {
    		product: {},
	      	baseUrlPath: null,
            unit_price : 0,

            ram_price : 0,
            hard_drive_price : 0,
            graphics_card_price : 0,
            processor_price : 0,

            ram_price_set : false,
            hard_drive_price_set : false,
            graphics_card_price_set : false,
            processor_price_set : false,
	    };
	},

	mounted() {
		this.loadProduct();
	    this.baseUrlPath = axios.defaults.baseURL;
	},

	methods: {
		loadProduct() {
		    const _this = this;
		    axios.get(`/api/product/${this.$route.params.id}`).then((response) => {
                _this.product = response.data;
                _this.unit_price = _this.product.stock_product.unit_price;
		    });
	    },

        additional_price_set(device_type, price, id_class) {
		    console.log(device_type);
		    const _this = this;
            if (device_type == 1){
                if (_this.ram_price != 0) {
                    _this.unit_price = parseInt(_this.unit_price) - parseInt(_this.ram_price)
                }
                _this.ram_price = price;
                $('.ram').find('.configuration-item-active').removeClass('configuration-item-active').addClass('configuration-item');
            }
            if (device_type == 2){
                if (_this.hard_drive_price != 0) {
                    _this.unit_price = parseInt(_this.unit_price) - parseInt(_this.hard_drive_price)
                }
                _this.hard_drive_price = price;
                $('.storage').find('.configuration-item-active').removeClass('configuration-item-active').addClass('configuration-item');
            }
            if (device_type == 3){
                if (_this.graphics_card_price != 0) {
                    _this.unit_price = parseInt(_this.unit_price) - parseInt(_this.graphics_card_price)
                }
                _this.graphics_card_price = price;
                $('.graphics').find('.configuration-item-active').removeClass('configuration-item-active').addClass('configuration-item');
            }
            if (device_type == 4){
                if (_this.processor_price != 0) {
                    _this.unit_price = parseInt(_this.unit_price) - parseInt(_this.processor_price)
                }
                _this.processor_price = price;
                $('.processor').find('.configuration-item-active').removeClass('configuration-item-active').addClass('configuration-item');
            }

            _this.unit_price = parseInt(_this.unit_price) + parseInt(_this.ram_price) + parseInt(_this.hard_drive_price) + parseInt(_this.graphics_card_price) + parseInt(_this.processor_price);
            $('.'+id_class).addClass('configuration-item-active');
        },

        // additional_price() {
        //     const _this = this;
        // }
	},

	computed: {
        ...mapGetters({
          products: "cart/products",
    }),
    totalPrice() {
          let sum = 0;
          _.each(this.products, (p) => {
            sum += p.count * p.price;
          });
          return sum;
    },

    productCount() {
          let pro = this.products;
          if (!pro) {
                return 0;
          }
          for (var i = 0; i < pro.length; i++) {
                if (pro[i].id == this.product.id) {
                    return pro[i].count;
                }
          }
          return 0;
    },

    description() {
          let regex = /(<([^>]+)>)/gi;
          let des = this.product.product_description;
          if (des !== null) {
                return des.replace(regex, "");
          }
    },
  },
};
</script>
