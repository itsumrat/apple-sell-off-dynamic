<template>
    <div>
        <div class="container">
            <!-- Filter for store contents-->
            <div id="exNavigator" class="exNavigator">
                <i class="toggleIcon fas fa-2x fa-bars"></i>
            </div>
            <div class="storeSidebar">
                <div class="sidebar-content-wrapper">
                    <div class="sidebarClose">
                        <i class="fas fa-times"></i>
                    </div>
                    <div class="col-lg-3" style="margin-top: 70px;">
                        <div class="refineby">
                            <span style="font-size: 14px;">Refine By</span>
                            <a href="javascript:;">Clear All</a><br><br>
                            <span style="font-size: 15px;">STATUS: <b>In Stock</b></span>
                            <a href="javascript:;"><img class="mb-2" :src="'/frontend/img/close.png'"
                                                        @click="refineBy(mainCat.id, 'category', 1)"></a><br>
                            <hr>
                        </div>
                        <div class="stock-filter">
                            <h5>stock status</h5>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                                <label class="form-check-label" for="defaultCheck1">
                                    In Stock
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                                <label class="form-check-label" for="defaultCheck1">
                                    Coming Soon
                                </label>
                            </div>
                            <hr>
                        </div>
                        <div class="condition-filter">
                            <h5>Condition</h5>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                                <label class="form-check-label" for="defaultCheck1">
                                    New
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                                <label class="form-check-label" for="defaultCheck1">
                                    Approved Used
                                </label>
                            </div>
                            <hr>
                        </div>
                        <div class="category-filter">
                            <h5>categories</h5>
                            <div v-for="(mainCat, key) in maincategory" :key="key" class="form-check">
                                <input class="form-check-input" type="checkbox" value="" :id="mainCat.id"
                                       @click="filterAdd($event, 'category', mainCat.id)">
                                <label class="form-check-label" :for="mainCat.id">
                                    {{ mainCat.mc_name }}
                                </label>
                            </div>
                            <hr>
                        </div>
                        <div class="size-filter">
                            <h5>size</h5>
                            <div v-for="(size, key) in sizes" :key="key" class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="defaultCheck2"
                                       @click="filterAdd($event, 'size', size.id)">
                                <label class="form-check-label" for="defaultCheck2">
                                    {{ size.size }} inch
                                </label>
                            </div>
                            <hr>
                        </div>
                        <div class="year-filter">
                            <h5>year</h5>
                            <button type="submit" @click="filterAdd($event, 'year', 2021)">2021</button>
                            <button type="submit" @click="filterAdd($event, 'year', 2020)">2020</button>
                            <button type="submit" @click="filterAdd($event, 'year', 2019)">2019</button>
                            <button type="submit" @click="filterAdd($event, 'year', 2018)">2018</button>
                            <hr>
                        </div>
<!--                        <div class="price-filter">-->
<!--                            <h5>Price ($)</h5>-->
<!--                            <ul>-->
<!--                                <li>-->
<!--                                    <div class="form-group clearfix">-->
<!--                                        <div id="slider-container"></div>-->
<!--                                    </div>-->
<!--                                </li>-->
<!--                                <li class="clearfix">-->
<!--                                    <div class="form-group clearfix">-->
<!--                                        <div class="amount-box">-->
<!--                                            <div class="row">-->
<!--                                                <div class="col-sm-6">-->
<!--                                                    <input type="text" id="amount-from"-->
<!--                                                           onkeypress="return isNumberKey(event)" value="200">-->
<!--                                                </div>-->
<!--                                                <div class="col-sm-6">-->
<!--                                                    <input type="tel" id="amount-to"-->
<!--                                                           onkeypress="return isNumberKey(event)" value="33000">-->
<!--                                                </div>-->
<!--                                            </div>-->
<!--                                        </div>-->
<!--                                    </div>-->
<!--                                </li>-->
<!--                            </ul>-->
<!--                            <hr>-->
<!--                        </div>-->
                        <div class="processor-filter">
                            <h5>processor type</h5>
                            <div v-for="(processor, key) in processors" :key="key" class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="defaultCheck1"
                                       @click="filterAdd($event, 'processor', processor.id)">
                                <label class="form-check-label" for="defaultCheck1">
                                    {{ processor.processors_type }}
                                </label>
                            </div>
                            <hr>
                        </div>
                        <div class="harddrive-filter">
                            <h5>ram</h5>
                            <div v-for="(ram, key) in rams" :key="key" class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="defaultCheck1"
                                       @click="filterAdd($event, 'ram', ram.id)">
                                <label class="form-check-label" for="defaultCheck1">
                                    {{ ram.ram_size }} GB
                                </label>
                            </div>
                            <hr>
                        </div>
                        <div class="harddrive-filter">
                            <h5>hard drive</h5>
                            <div v-for="(harddrive, key) in harddrives" :key="key" class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="defaultCheck1"
                                       @click="filterAdd($event, 'harddrive', harddrive.id)">
                                <label class="form-check-label" for="defaultCheck1">
                                    {{ harddrive.hard_drive_size }} GB SSD
                                </label>
                            </div>
                            <hr>
                        </div>
                        <div class="graphicscard-filter">
                            <h5>Graphics Card</h5>
                            <div v-for="(graphicscard, key) in graphicscards" :key="key" class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="defaultCheck1"
                                       @click="filterAdd($event, 'graphics_card', graphicscard.id)">
                                <label class="form-check-label" for="defaultCheck1">
                                    {{ graphicscard.graphics_card_size }}
                                </label>
                            </div>
                            <hr>
                        </div>
                        <div class="color-filter">
                            <h5>color</h5>
                            <div v-for="(color, key) in colors" :key="key" class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="defaultCheck1"
                                       @click="filterAdd($event, 'color', color.id)">
                                <label class="form-check-label" for="defaultCheck1">
                                    {{ color.color_name }}
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Store contents-->
            <div class="row" style="margin-left: 0px; margin-right: 0px;">
                <div class="col-lg-6 col-sm-12">
                    <h5 class="store-title">Products</h5>
                </div>
                <div class="col-lg-6 col-sm-12">
                    <select class="form-control product-filtering" v-model="product_filtering_option">
                        <option value="">Select</option>
                        <option value="best-selling">Best Selling</option>
<!--                        <option value="featured">Featured</option>-->
                        <option value="price-ascending">Price: Low to High</option>
                        <option value="price-descending">Price: High to Low</option>
                        <option value="title-ascending">Alphabetically: A-Z</option>
                        <option value="title-descending">Alphabetically: Z-A</option>
                        <option value="created-descending">Date: New to Old</option>
                        <option value="created-ascending">Date: Old to New</option>
                    </select>
                </div>
                <div class="desktop-filter col-lg-3">
                    <div class="">
                        <div class="refineby">
                            <span style="font-size: 14px;">Refine By</span> <a href="javascript:;" @click="clearAll()">Clear
                            All</a><br><br>
                            <div v-for="(mainCat, index) in maincategory" v-if="refineBy(mainCat.id, 'category')">
                                <span style="font-size: 15px;">Category : <b>{{ mainCat.mc_name }}</b></span>
                                <a href="javascript:;"><img class="mb-2" :src="'/frontend/img/close.png'"
                                                            @click="refineBy(mainCat.id, 'category', 1)"></a><br>
                            </div>
                            <div v-for="(size, index) in sizes" v-if="refineBy(size.id, 'size')">
                                <span style="font-size: 15px;">Size : <b>{{ size.size }} inch</b></span>
                                <a href="javascript:;"><img class="mb-2" :src="'/frontend/img/close.png'"
                                                            @click="refineBy(size.id, 'size', 1)"></a><br>
                            </div>
                            <div v-if="year != ''">
                                <span style="font-size: 15px;">Year : <b>{{ year }}</b></span>
                                <a href="javascript:;"><img class="mb-2" :src="'/frontend/img/close.png'"
                                                            @click="refineBy(0, 'year', 1)"></a><br>
                            </div>
                            <div v-if="refineBy(1, 'stock')">
                                <span style="font-size: 15px;">Stock : <b>In Stock</b></span>
                                <a href="javascript:;"><img class="mb-2" :src="'/frontend/img/close.png'"
                                                            @click="refineBy(1, 'stock', 1)"></a><br>
                            </div>
                            <div v-if="refineBy(2, 'stock')">
                                <span style="font-size: 15px;">Stock : <b>Comming Soon</b></span>
                                <a href="javascript:;"><img class="mb-2" :src="'/frontend/img/close.png'"
                                                            @click="refineBy(2, 'stock', 1)"></a><br>
                            </div>
                            <div v-if="refineBy(1, 'condition')">
                                <span style="font-size: 15px;">Condition : <b>New</b></span>
                                <a href="javascript:;"><img class="mb-2" :src="'/frontend/img/close.png'"
                                                            @click="refineBy(1, 'condition', 1)"></a><br>
                            </div>
                            <div v-if="refineBy(2, 'condition')">
                                <span style="font-size: 15px;">Condition : <b>Used Used</b></span>
                                <a href="javascript:;"><img class="mb-2" :src="'/frontend/img/close.png'"
                                                            @click="refineBy(2, 'condition', 1)"></a><br>
                            </div>
                            <div v-if="refineBy(0, 'condition')">
                                <span style="font-size: 15px;">Condition : <b>Approved Used</b></span>
                                <a href="javascript:;"><img class="mb-2" :src="'/frontend/img/close.png'"
                                                            @click="refineBy(0, 'condition', 1)"></a><br>
                            </div>
                            <div v-for="(processor, key) in processors" v-if="refineBy(processor.id, 'processor')">
                                <span style="font-size: 15px;">Processor : <b>{{ processor.processors_type }}</b></span>
                                <a href="javascript:;"><img class="mb-2" :src="'/frontend/img/close.png'"
                                                            @click="refineBy(processor.id, 'processor', 1)"></a><br>
                            </div>
                            <div v-for="(ram, key) in rams" v-if="refineBy(ram.id, 'ram')">
                                <span style="font-size: 15px;">RAM : <b>{{ ram.ram_size }} GB</b></span>
                                <a href="javascript:;"><img class="mb-2" :src="'/frontend/img/close.png'"
                                                            @click="refineBy(ram.id, 'ram', 1)"></a><br>
                            </div>
                            <div v-for="(harddrive, key) in harddrives" v-if="refineBy(harddrive.id, 'hard_drive')">
                                <span style="font-size: 15px;">Hard Drive : <b>{{
                                        harddrive.hard_drive_size
                                    }} GB SSD</b></span>
                                <a href="javascript:;"><img class="mb-2" :src="'/frontend/img/close.png'"
                                                            @click="refineBy(harddrive.id, 'hard_drive', 1)"></a><br>
                            </div>
                            <div v-for="(graphicscard, key) in graphicscards"
                                 v-if="refineBy(graphicscard.id, 'graphics_card')">
                                <span style="font-size: 15px;">Graphics Card : <b>{{
                                        graphicscard.graphics_card_size
                                    }}</b></span>
                                <a href="javascript:;"><img class="mb-2" :src="'/frontend/img/close.png'"
                                                            @click="refineBy(graphicscard.id, 'graphics_card', 1)"></a><br>
                            </div>
                            <div v-for="(color, key) in colors" v-if="refineBy(color.id, 'color')">
                                <span style="font-size: 15px;">Color : <b>{{ color.color_name }}</b></span>
                                <a href="javascript:;"><img class="mb-2" :src="'/frontend/img/close.png'"
                                                            @click="refineBy(color.id, 'color', 1)"></a><br>
                            </div>
                            <hr>
                        </div>
                        <div class="stock-filter">
                            <h5>stock status</h5>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="stock1"
                                       @click="filterAdd($event, 'stock', 1)">
                                <label class="form-check-label" for="stock1">
                                    In Stock
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="stock2"
                                       @click="filterAdd($event, 'stock', 2)">
                                <label class="form-check-label" for="stock2">
                                    Coming Soon
                                </label>
                            </div>
                            <hr>
                        </div>
                        <div class="condition-filter">
                            <h5>Condition</h5>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="condition1"
                                       @click="filterAdd($event, 'condition', 1)">
                                <label class="form-check-label" for="condition1"> New </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="condition2"
                                       @click="filterAdd($event, 'condition', 2)">
                                <label class="form-check-label" for="condition2"> Used Used </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="condition0"
                                       @click="filterAdd($event, 'condition', 0)">
                                <label class="form-check-label" for="condition0"> Approved Used </label>
                            </div>
                            <hr>
                        </div>
                        <div class="category-filter">
                            <h5>categories</h5>
                            <div v-for="(mainCat, key) in maincategory" :key="key" class="form-check">
                                <input class="form-check-input" type="checkbox" value="" :id="'category'+mainCat.id"
                                       @click="filterAdd($event, 'category', mainCat.id)">
                                <label class="form-check-label" :for="'category'+mainCat.id">
                                    {{ mainCat.mc_name }}
                                </label>
                            </div>
                            <hr>
                        </div>
                        <div class="size-filter">
                            <h5>size</h5>
                            <div v-for="(size, key) in sizes" :key="key" class="form-check">
                                <input class="form-check-input" type="checkbox" value="" :id="'size'+size.id"
                                       @click="filterAdd($event, 'size', size.id)">
                                <label class="form-check-label" :for="'size'+size.id">
                                    {{ size.size }} inch
                                </label>
                            </div>
                            <hr>
                        </div>
                        <div class="year-filter">
                            <h5>year</h5>
                            <button type="submit" @click="filterAdd($event, 'year', 2021)">2021</button>
                            <button type="submit" @click="filterAdd($event, 'year', 2020)">2020</button>
                            <button type="submit" @click="filterAdd($event, 'year', 2019)">2019</button>
                            <button type="submit" @click="filterAdd($event, 'year', 2018)">2018</button>
                            <hr>
                        </div>
                        <div class="price-filter">
                            <h5>Price ($)</h5>
                            <ul>
                                <li>
                                    <div class="form-group clearfix">
                                        <div id="slider-container" @mouseup="loadProduct()"></div>
                                    </div>
                                </li>
                                <li class="clearfix">
                                    <div class="form-group clearfix">
                                        <div class="amount-box">
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <input type="text" v-model="amount_from" id="amount-from"
                                                           @input="loadProduct()" value="">
                                                </div>
                                                <div class="col-sm-6">
                                                    <input type="text" v-model="amount_to" id="amount-to"
                                                           @input="loadProduct()" value="">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                            <hr>
                        </div>
                        <div class="processor-filter">
                            <h5>processor type</h5>
                            <div v-for="(processor, key) in processors" :key="key" class="form-check">
                                <input class="form-check-input" type="checkbox" value="" :id="'processor'+processor.id"
                                       @click="filterAdd($event, 'processor', processor.id)">
                                <label class="form-check-label" :for="'processor'+processor.id">
                                    {{ processor.processors_type }}
                                </label>
                            </div>
                            <hr>
                        </div>
                        <div class="ram-filter">
                            <h5>ram</h5>
                            <div v-for="(ram, key) in rams" :key="key" class="form-check">
                                <input class="form-check-input" type="checkbox" value="" :id="'ram'+ram.id"
                                       @click="filterAdd($event, 'ram', ram.id)">
                                <label class="form-check-label" :for="'ram'+ram.id">
                                    {{ ram.ram_size }} GB
                                </label>
                            </div>
                            <hr>
                        </div>
                        <div class="harddrive-filter">
                            <h5>hard drive</h5>
                            <div v-for="(harddrive, key) in harddrives" :key="key" class="form-check">
                                <input class="form-check-input" type="checkbox" value="" :id="'hard_drive'+harddrive.id"
                                       @click="filterAdd($event, 'hard_drive', harddrive.id)">
                                <label class="form-check-label" :for="'hard_drive'+harddrive.id">
                                    {{ harddrive.hard_drive_size }} GB SSD
                                </label>
                            </div>
                            <hr>
                        </div>
                        <div class="graphicscard-filter">
                            <h5>Graphics Card</h5>
                            <div v-for="(graphicscard, key) in graphicscards" :key="key" class="form-check">
                                <input class="form-check-input" type="checkbox" value="" :id="'graphics_card'+graphicscard.id"
                                       @click="filterAdd($event, 'graphics_card', graphicscard.id)">
                                <label class="form-check-label" :for="'graphics_card'+graphicscard.id">
                                    {{ graphicscard.graphics_card_size }}
                                </label>
                            </div>
                            <hr>
                        </div>
                        <div class="color-filter">
                            <h5>color</h5>
                            <div v-for="(color, key) in colors" :key="key" class="form-check">
                                <input class="form-check-input" type="checkbox" value="" :id="'color'+color.id"
                                       @click="filterAdd($event, 'color', color.id)">
                                <label class="form-check-label" :for="'color'+color.id">
                                    {{ color.color_name }}
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-9">
                    <div class="row">
                        <div v-for="(product, key) in allproducts" :key="key" class="col-lg-4">

                            <div class="product-item">
                                <img v-if="product.feature_image != null"
                                     :src="'/uploads/product/' + product.feature_image"
                                     class="image"
                                     alt="No Image" style="width:100%">
                                <div class="text">
                                    <a href="javascript:;" class="btn" data-toggle="modal" :data-target="'#exampleModalCenter' + product.id">Quick View</a>
                                </div>
                                <router-link :to="{name: 'product-details', params: {id: product.id}}">
                                    <div class="overlay">
                                    </div>
                                </router-link>
                            </div>

<!--                            <div class="product-item">-->
<!--                                &lt;!&ndash; <img :src="'/frontend/img/macbookpro.png'" alt="Avatar" class="image" style="width:100%"> &ndash;&gt;-->
<!--                                <img-->
<!--                                    v-if="product.feature_image === null"-->
<!--                                    :src="'/uploads/product/821600589513.jpg'"-->
<!--                                    class="image"-->
<!--                                    alt="" style="width:100%"-->
<!--                                />-->
<!--                                <img-->
<!--                                    v-else-if="product.feature_image != null"-->
<!--                                    :src="'/uploads/product/' + product.feature_image"-->
<!--                                    class="image"-->
<!--                                    alt="No Image" style="width:100%"-->
<!--                                />-->
<!--                                <div class="overlay">-->
<!--                                    <div class="text">-->
<!--                                        <a href="javascript:;" class="btn" data-toggle="modal"-->
<!--                                           :data-target="'#exampleModalCenter' + product.id">Quick View</a>-->
<!--                                    </div>-->
<!--                                </div>-->
<!--                            </div>-->
<!--                            -->
                            <router-link :to="{name: 'product-details', params: {id: product.id}}" class="product-name">
                                <h6>{{ product.name }}</h6>
                                <p class="product-price">${{ product.stock_product.unit_price }}</p>
                            </router-link>
                            <!-- Modal -->
                            <div class="modal fade" :id="'exampleModalCenter' + product.id" tabindex="-1" role="dialog"
                                 aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalCenterTitle"></h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body" style="padding-bottom: 2rem">
                                            <div class="container-fluid">
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <img
                                                            v-if="product.feature_image === null"
                                                            :src="'/uploads/product/821600589513.jpg'"
                                                            class="image"
                                                            alt="" style="width:100%"
                                                        />
                                                        <img
                                                            v-else-if="product.feature_image != null"
                                                            :src="
							                    '/uploads/product/' + product.feature_image
							                  "
                                                            class="image"
                                                            alt="No Image" style="width:100%"
                                                        />
                                                    </div>
                                                    <div class="col-md-8">
                                                        <h6 style="font-weight: 600">{{ product.name }}</h6>
                                                        <span>${{ product.stock_product.unit_price }}</span><br>
                                                        <div class="device-specification">
                                                            <div>
                                                                <span>Year</span><b>{{ product.year }}</b>
                                                            </div>
                                                            <div>
                                                                <span>Category</span><b>{{ product.main_category.mc_name }}</b>
                                                            </div>
                                                            <div>
                                                                <span>Charger</span><b>Charger</b>
                                                            </div>
                                                        </div>
<!--                                                        <button type="button" class="btn"-->
<!--                                                                style="float: right;background: linear-gradient(rgb(66, 161, 236), rgb(0, 112, 201));border: 0;color: #fff">-->
<!--                                                            Buy Now-->
<!--                                                        </button>-->
                                                        <button @click="addToCart(product)" type="button" class="btn"
                                                                style="float: right;background: linear-gradient(rgb(66, 161, 236), rgb(0, 112, 201));border: 0;margin-right: 1rem;color: #fff">
                                                            Add to Cart
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
import {mapActions, mapGetters} from "vuex";

export default {
    name: "Store",

    data() {
        return {
            maincategory: "",
            sizes: "",
            processors: "",
            rams: "",
            harddrives: "",
            graphicscards: "",
            colors: "",
            allproducts: null,
            baseUrlPath: null,
            product_filtering_option: '',

            category: [],
            size: [],
            year: '',
            price: [],
            processor: [],
            ram: [],
            hard_drive: [],
            graphics_card: [],
            color: [],
            condition: [],
            stock: [],
            amount_from: 20,
            amount_to: 33000,
        };
    },
    watch:{
        'product_filtering_option'(newVal){
            const _this = this;
            _this.loadProduct();
        },
    },
    mounted() {
        this.loadMainCategory();
        this.loadSize();
        this.loadProcessor();
        this.loadRam();
        this.loadHarddrive();
        this.loadGraphicscard();
        this.loadColors();
        this.loadProduct();
        // this.sliderActive();
        this.baseUrlPath = axios.defaults.baseURL;

    },
    // ready() {  },
    methods: {
        // add to cart option
        ...mapActions({
            addProduct: "cart/addProduct",
            removeProduct: "cart/removeProduct",
        }),

        sliderActive() {
            const _this = this;
            var minValue = 1000;
            var maxValue = 50000;
            $("#slider-container").slider({
                range: true,
                min: minValue,
                max: maxValue,
                values: [_this.amount_from, _this.amount_to],
                create: function () {
                    $("#amount-from").val(_this.amount_from);
                    $("#amount-to").val(_this.amount_to);
                },
                slide: function (event, ui) {
                    $("#amount-from").val(ui.values[0]);
                    $("#amount-to").val(ui.values[1]);

                    _this.amount_from = $("#amount-from").val();
                    _this.amount_to = $("#amount-to").val();
                }
            });
        },

        addToCart(item) {
            const _this = this;
            item['price'] = item.stock_product.unit_price;
            item['price_array'] = [];
            axios.post('/api/add_to_cart', item)
                .then((response) => {
                    this.$toasted.success("Product Added To Cart!");
                    $('.cart_count').text(response.data.cart_count);
                })
                .catch((error) => {
                    console.log(error);
                })
        },

        // allproducts show
        loadProduct() {
            const _this = this;
            axios.get('/api/appleproducts?category=' + _this.category + '&size=' + _this.size + '&year=' + _this.year + '&price=' + _this.price + '&processor=' + _this.processor + '&ram=' + _this.ram + '&hard_drive=' + _this.hard_drive + '&graphics_card=' + _this.graphics_card + '&color=' + _this.color + '&amount_from=' + _this.amount_from + '&amount_to=' + _this.amount_to + '&condition=' + _this.condition + '&stock=' + _this.stock+ '&product_filtering_option=' + _this.product_filtering_option)
            .then((response) => {
                this.allproducts = response.data;

            })
            .catch((error) => {
                console.error(error);
            });
        },

        clearAll() {
            const _this = this;
            _this.category = [];
            _this.size = [];
            _this.year = '';
            _this.price = [];
            _this.processor = [];
            _this.ram = [];
            _this.hard_drive = [];
            _this.graphics_card = [];
            _this.color = [];
            _this.condition = [];
            _this.stock = [];
            _this.amount_from = 20;
            _this.amount_to = 33000;
            $('.stock-filter input:checkbox'). prop('checked', false);
        },

        refineBy(id, type, clean = 0) {
            const _this = this;
            if (type == 'category') {
                var category = _this.category.indexOf(id);
                if (clean == 1) {
                    _this.category.splice(category, id);
                    $('#category'+id). prop('checked', false);
                } else {
                    if (category != -1) {
                        return true;
                    } else {
                        return false;
                    }
                }
            }
            if (type == 'year') {
                var year = _this.year.indexOf(value);
                if (clean == 1) {
                    _this.year.splice(year, id);
                } else {
                    if (year != -1) {
                        return true;
                    } else {
                        return false;
                    }
                }
            }
            if (type == 'ram') {
                var ram = _this.ram.indexOf(id);
                if (clean == 1) {
                    _this.ram.splice(ram, id);
                    $('#ram'+id). prop('checked', false);
                } else {
                    if (ram != -1) {
                        return true;
                    } else {
                        return false;
                    }
                }
            }
            if (type == 'size') {
                var size = _this.size.indexOf(id);
                if (clean == 1) {
                    _this.size.splice(size, id);
                    $('#size'+id). prop('checked', false);
                } else {
                    if (size != -1) {
                        return true;
                    } else {
                        return false;
                    }
                }
            }
            if (type == 'processor') {
                var processor = _this.processor.indexOf(id);
                if (clean == 1) {
                    _this.processor.splice(processor, id);
                    $('#processor'+id). prop('checked', false);
                } else {
                    if (processor != -1) {
                        return true;
                    } else {
                        return false;
                    }
                }
            }
            if (type == 'hard_drive') {
                var hard_drive = _this.hard_drive.indexOf(id);
                if (clean == 1) {
                    _this.hard_drive.splice(hard_drive, id);
                    $('#hard_drive'+id). prop('checked', false);
                } else {
                    if (hard_drive != -1) {
                        return true;
                    } else {
                        return false;
                    }
                }
            }
            if (type == 'graphics_card') {
                var graphics_card = _this.graphics_card.indexOf(id);
                if (clean == 1) {
                    _this.graphics_card.splice(graphics_card, id);
                    $('#graphics_card'+id). prop('checked', false);
                } else {
                    if (graphics_card != -1) {
                        return true;
                    } else {
                        return false;
                    }
                }
            }
            if (type == 'color') {
                var color = _this.color.indexOf(id);
                if (clean == 1) {
                    _this.color.splice(color, id);
                    $('#color'+id). prop('checked', false);
                } else {
                    if (color != -1) {
                        return true;
                    } else {
                        return false;
                    }
                }
            }
            if (type == 'condition') {
                var condition = _this.condition.indexOf(id);
                if (clean == 1) {
                    _this.condition.splice(condition, id);
                    $('#condition'+id). prop('checked', false);
                } else {
                    if (condition != -1) {
                        return true;
                    } else {
                        return false;
                    }
                }
            }
            if (type == 'stock') {
                var stock = _this.stock.indexOf(id);
                if (clean == 1) {
                    _this.stock.splice(stock, id);
                    $('#stock'+id). prop('checked', false);
                } else {
                    if (stock != -1) {
                        return true;
                    } else {
                        return false;
                    }
                }
            }
            _this.loadProduct();
        },

        filterAdd(event, type, value) {
            const _this = this;
            if (type == 'category') {
                if (event.target.checked) {
                    _this.category.push(value);
                } else {
                    var category = _this.category.indexOf(value);
                    _this.category.splice(category, 1);
                }
            }
            if (type == 'year') {
                _this.year = value;
            }
            if (type == 'ram') {
                if (event.target.checked) {
                    _this.ram.push(value);
                } else {
                    var ram = _this.ram.indexOf(value);
                    _this.ram.splice(ram, 1);
                }
            }
            if (type == 'size') {
                if (event.target.checked) {
                    _this.size.push(value);
                } else {
                    var size = _this.size.indexOf(value);
                    _this.size.splice(size, 1);
                }
            }
            if (type == 'processor') {
                if (event.target.checked) {
                    _this.processor.push(value);
                } else {
                    var processor = _this.processor.indexOf(value);
                    _this.processor.splice(processor, 1);
                }
            }
            if (type == 'hard_drive') {
                if (event.target.checked) {
                    _this.hard_drive.push(value);
                } else {
                    var hard_drive = _this.hard_drive.indexOf(value);
                    _this.hard_drive.splice(hard_drive, 1);
                }
            }
            if (type == 'graphics_card') {
                if (event.target.checked) {
                    _this.graphics_card.push(value);
                } else {
                    var graphics_card = _this.graphics_card.indexOf(value);
                    _this.graphics_card.splice(graphics_card, 1);
                }
            }
            if (type == 'color') {
                if (event.target.checked) {
                    _this.color.push(value);
                } else {
                    var color = _this.color.indexOf(value);
                    _this.color.splice(color, 1);
                }
            }
            if (type == 'condition') {
                if (event.target.checked) {
                    _this.condition.push(value);
                } else {
                    var condition = _this.condition.indexOf(value);
                    _this.condition.splice(condition, 1);
                }
            }
            if (type == 'stock') {
                if (event.target.checked) {
                    _this.stock.push(value);
                } else {
                    var stock = _this.stock.indexOf(value);
                    _this.stock.splice(stock, 1);
                }
            }

            this.loadProduct();
        },

        // main Category
        loadMainCategory() {
            const _this = this;
            axios.get("/api/main-category-menu")
                .then((response) => {
                    this.maincategory = response.data;
                    setTimeout(function(){
                        _this.sliderActive();
                    }, 1000);
                })
                .catch((error) => {
                    console.error(error);
                });
        },

        // size
        loadSize() {
            axios.get("/api/get-size-filter")
                .then((response) => {
                    this.sizes = response.data;
                })
                .catch((error) => {
                    console.error(error);
                });
        },

        // size
        loadProcessor() {
            axios.get("/api/get-processor-filter")
                .then((response) => {
                    this.processors = response.data;
                })
                .catch((error) => {
                    console.error(error);
                });
        },

        // size
        loadRam() {
            axios.get("/api/get-ram-filter")
                .then((response) => {
                    this.rams = response.data;
                })
                .catch((error) => {
                    console.error(error);
                });
        },

        // size
        loadHarddrive() {
            axios.get("/api/get-harddrive-filter")
                .then((response) => {
                    this.harddrives = response.data;
                })
                .catch((error) => {
                    console.error(error);
                });
        },

        // size
        loadGraphicscard() {
            axios.get("/api/get-graphicscard-filter")
                .then((response) => {
                    this.graphicscards = response.data;
                })
                .catch((error) => {
                    console.error(error);
                });
        },

        // size
        loadColors() {
            axios.get("/api/get-color-filter")
                .then((response) => {
                    this.colors = response.data;
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

        singleProductShow(id, slug) {
            this.$router.push({
                name: "singleproduct",
                params: {slug: slug},
            });
            localStorage.removeItem("productId");
            localStorage.setItem("productId", id);
            // location.reload();
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
