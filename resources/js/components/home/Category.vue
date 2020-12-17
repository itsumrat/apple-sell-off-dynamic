<template>
    <div>
    	<section id="categories">
    	<div class="container">
    		<div class="row">
    			<div class="col-12">
    				<div class="section-title">
    					<h1>shop by category</h1>
    				</div>
    				<div class="category-content">
    					<ul class="nav nav-pills nav-fill" id="pills-tab" role="tablist">
							<li class="nav-item" v-for="(value, index) in categories_product">
							    <a :class="index == 0 ? 'nav-link active' : 'nav-link'" :id="value.mc_slug+'-tab'" data-toggle="pill" :href="'#'+value.mc_slug" role="tab" :aria-controls="value.mc_slug" aria-selected="true">{{ value.mc_name }}</a>
							</li>
						</ul>
						<div class="tab-content" id="pills-tabContent">
							<div v-for="(value, index) in categories_product" :class="index == 0 ? 'tab-pane fade show active' : 'tab-pane fade'" :id="value.mc_slug" role="tabpanel" :aria-labelledby="value.mc_slug+'-tab'">
								<div class="row">
									<div v-for="(data_value, key) in value.product" v-if="key < 3" class="col-lg-4">
										<div class="item">

                                            <router-link :to="{name: 'product-details', params: {id: data_value.id}}">
											<img :src="'/uploads/product/'+data_value.feature_image">
											<div class="caption">
												<h2>{{ data_value.name }}</h2>
												<p>${{ data_value.stock_product.unit_price }}</p>
											</div>
                                            </router-link>
<!--											<a href="#" class="icon&#45;&#45;shop"></a>-->
										</div>
									</div>
								</div>
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

export default {
    name: "Category",
    props : ['categories_product'],
    data() {
    return {
      baseUrlPath: null
    };
  },

  mounted() {
    this.baseUrlPath = axios.defaults.baseURL;
  },
};
</script>

<style>
</style>
