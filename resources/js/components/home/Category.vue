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
							<li class="nav-item">
							    <a class="nav-link active" id="macbookpro-tab" data-toggle="pill" href="#macbookpro" role="tab" aria-controls="macbookpro" aria-selected="true">MacBook Pro</a>
							</li>
							<li class="nav-item">
							    <a class="nav-link" id="macbookair-tab" data-toggle="pill" href="#macbookair" role="tab" aria-controls="macbookair" aria-selected="false">MacBook Air</a>
							</li>
							<li class="nav-item">
							    <a class="nav-link" id="imac-tab" data-toggle="pill" href="#imac" role="tab" aria-controls="imac" aria-selected="false">iMac</a>
							</li>
							<li class="nav-item">
							    <a class="nav-link" id="mac-tab" data-toggle="pill" href="#mac" role="tab" aria-controls="mac" aria-selected="false">Mac</a>
							</li>
						</ul>
						<div class="tab-content" id="pills-tabContent">
							<div class="tab-pane fade show active" id="macbookpro" role="tabpanel" aria-labelledby="macbookpro-tab">
								<div class="row">
									<div class="col-lg-4">
										<div class="item">
											<img :src="baseUrlPath + '/frontend/img/macbookpro.png'">
											<div class="caption">
												<h2>MacBook Pro 2020</h2>
												<p>$535</p>
											</div>
											<a href="#" class="icon--shop"></a>
										</div>
									</div>
									<div class="col-lg-4">
										<div class="item">
											<img :src="baseUrlPath + '/frontend/img/macbookpro.png'">
											<div class="caption">
												<h2>MacBook Pro 2020</h2>
												<p>$535</p>
											</div>
											<a href="#" class="icon--shop"></a>
										</div>
									</div>
									<div class="col-lg-4">
										<div class="item">
											<img :src="baseUrlPath + '/frontend/img/macbookpro.png'">
											<div class="caption">
												<h2>MacBook Pro 2020</h2>
												<p>$535</p>
											</div>
											<a href="#" class="icon--shop"></a>
										</div>
									</div>
								</div>
							</div>
							<div class="tab-pane fade" id="macbookair" role="tabpanel" aria-labelledby="macbookair-tab">
								<div class="row">
									<div class="col-lg-4">
										<div class="item">
											<img :src="baseUrlPath + '/frontend/img/macbookpro.png'">
											<div class="caption">
												<h2>MacBook Pro 2020</h2>
												<p>$535</p>
											</div>
											<a href="#" class="icon--shop"></a>
										</div>
									</div>
									<div class="col-lg-4">
										<div class="item">
											<img :src="baseUrlPath + '/frontend/img/macbookpro.png'">
											<div class="caption">
												<h2>MacBook Pro 2020</h2>
												<p>$535</p>
											</div>
											<a href="#" class="icon--shop"></a>
										</div>
									</div>
									<div class="col-lg-4">
										<div class="item">
											<img :src="baseUrlPath + '/frontend/img/macbookpro.png'">
											<div class="caption">
												<h2>MacBook Pro 2020</h2>
												<p>$535</p>
											</div>
											<a href="#" class="icon--shop"></a>
										</div>
									</div>
								</div>
							</div>
							<div class="tab-pane fade" id="imac" role="tabpanel" aria-labelledby="imac-tab">
								<div class="row">
									<div class="col-lg-4">
										<div class="item">
											<img :src="baseUrlPath + '/frontend/img/macbookpro.png'">
											<div class="caption">
												<h2>MacBook Pro 2020</h2>
												<p>$535</p>
											</div>
											<a href="#" class="icon--shop"></a>
										</div>
									</div>
									<div class="col-lg-4">
										<div class="item">
											<img :src="baseUrlPath + '/frontend/img/macbookpro.png'">
											<div class="caption">
												<h2>MacBook Pro 2020</h2>
												<p>$535</p>
											</div>
											<a href="#" class="icon--shop"></a>
										</div>
									</div>
									<div class="col-lg-4">
										<div class="item">
											<img :src="baseUrlPath + '/frontend/img/macbookpro.png'">
											<div class="caption">
												<h2>MacBook Pro 2020</h2>
												<p>$535</p>
											</div>
											<a href="#" class="icon--shop"></a>
										</div>
									</div>
								</div>
							</div>
							<div class="tab-pane fade" id="mac" role="tabpanel" aria-labelledby="mac-tab">
								<div class="row">
									<div class="col-lg-4">
										<div class="item">
											<img :src="baseUrlPath + '/frontend/img/macbookpro.png'">
											<div class="caption">
												<h2>MacBook Pro 2020</h2>
												<p>$535</p>
											</div>
											<a href="#" class="icon--shop"></a>
										</div>
									</div>
									<div class="col-lg-4">
										<div class="item">
											<img :src="baseUrlPath + '/frontend/img/macbookpro.png'">
											<div class="caption">
												<h2>MacBook Pro 2020</h2>
												<p>$535</p>
											</div>
											<a href="#" class="icon--shop"></a>
										</div>
									</div>
									<div class="col-lg-4">
										<div class="item">
											<img :src="baseUrlPath + '/frontend/img/macbookpro.png'">
											<div class="caption">
												<h2>MacBook Pro 2020</h2>
												<p>$535</p>
											</div>
											<a href="#" class="icon--shop"></a>
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
