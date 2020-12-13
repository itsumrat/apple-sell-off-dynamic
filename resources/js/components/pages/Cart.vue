<template>
	<div>
		<div class="container">
		<div class="row">
			<div class="col-12 page-title">
				<h1>cart items</h1>
			</div>
		</div>
	</div>

	<section id="cart-details">
		<div class="container">
			<div class="row">
				<div class="col-lg-8">
					<div class="cart-items">
						<table class="table table-borderless">
							<thead>
							    <tr class="table-header">
							      	<th scope="col">product</th>
							      	<th scope="col"></th>
							      	<th scope="col">qty</th>
							      	<th scope="col">total</th>
							      	<th scope="col"></th>
							    </tr>
							</thead>
							<tbody>
							    <tr>
							      	<th scope="row" style="display: flex;">
							      		<img :src="baseUrlPath + '/frontend/img/macbookpro.png'" width="130px">
							      		<div class="product-brief">
							      			<span class="device-name">Apple 15" MackbookAir (Mid 2015)</span>
							      			<small>Shipping 4-5 working days</small>
							      		</div>
							      	</th>
							      	<th>$300</th>
							      	<th><input type="number" value="1"></th>
							      	<th>$3000</th>
							      	<td><a href="#"><i class="fas fa-trash-alt"></i></a></td>
							    </tr>
							    <tr>
							      	<th scope="row" style="display: flex;">
							      		<img :src="baseUrlPath + '/frontend/img/macbookpro.png'" width="130px">
							      		<div class="product-brief">
							      			<span class="device-name">Apple 15" MackbookAir (Mid 2015)</span>
							      			<small>Shipping 4-5 working days</small>
							      		</div>
							      	</th>
							      	<th>$300</th>
							      	<th><input type="number" value="1"></th>
							      	<th>$3000</th>
							      	<td><a href="#"><i class="fas fa-trash-alt"></i></a></td>
							    </tr>
							    <tr>
							      	<th scope="row" style="display: flex;">
							      		<img :src="baseUrlPath + '/frontend/img/macbookpro.png'" width="130px">
							      		<div class="product-brief">
							      			<span class="device-name">Apple 15" MackbookAir (Mid 2015)</span>
							      			<small>Shipping 4-5 working days</small>
							      		</div>
							      	</th>
							      	<th>$300</th>
							      	<th>
							      		<div class="parentclass">
							      			<input type="number" value="1">
								      		<span class="inc"><i class="fas fa-sort-up"></i></span>
								      		<span class="dec"><i class="fas fa-sort-down"></i></span>
							      		</div>
							      	</th>
							      	<th>$3000</th>
							      	<td><a href="#"><i class="fas fa-trash-alt"></i></a></td>
							    </tr>
							</tbody>
						</table>
					</div>
				</div>
				<div class="col-lg-4">
					<div class="cart-total">
						<h6>cart total</h6>
						<p>Subtotal</p> $3000 <br>
						<p class="shipping-charge">Shipping</p> Free<br> <a href="#" class="shipping-calculator">calculate shipping</a>
						<hr>
						<p>Total</p> $3000
						<div class="button-grp">
							<a href="#" class="btn cart-update-btn">update cart</a>
							<a href="checkout.php" class="btn checkout-btn">proceed to checkout</a>
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
		name: "Store",
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
	.parentclass span.inc {
	    position: absolute;
	    margin-top: 2px;
	    margin-left: -17px;
	    /*display: none;*/
	}
	.parentclass span.dec {
	    position: absolute;
	    margin-top: 5px;
	    margin-left: -17px;
	    /*display: none;*/
	}

	svg.svg-inline--fa.fa-sort-up.fa-w-10 {
	    color: #878786;
	}

	svg.svg-inline--fa.fa-sort-down.fa-w-10 {
	    color: #878786;
	}
	/*.parentclass span.inc:hover {
	    color: green;
	    display: block;
	}
	.parentclass span.dec:hover {
	    color: red;
	    display: block;
	}*/
</style>