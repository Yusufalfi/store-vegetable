@extends('layouts.app')

@section('title')
    Store Cart
@endsection

@section('content')
    <div class="page-content page-cart">
		<section class="store-breadcrumbs" data-aos="fade-down" data-aos-delay="100">
			<div class="container">
				<div class="row">
					<div class="col-12">
						<nav>
							<ol class="breadcrumb">
								<li class="breadcrumb-item">
									<a href="index.html">Home</a>
								</li>
								<li class="breadcrumb-item active">
									Cart
								</li>
							</ol>
						</nav>
					</div>
				</div>
			</div>
		</section>

		<section class="store-cart">
			<div class="container">
				<div class="row" data-aos="fade-up" data-aos-delay="100">
					<div class="col-12 table-responsive">
						<table class="table table-borderless table-cart">
							<thead>
								<tr>
									<td>Image</td>
									<td>Name &amp; Seller</td>
									<td>Price</td>
									<td>Menu</td>
								</tr>
							</thead>
							<tbody>
								<tr>
									<td style="width: 29%;">
										<img src="./images/product-2.jpg" class="cart-image border">
									</td>
									<td style="width: 35%;">
										<div class="product-title">Buah Segar</div>
										<div class="product-subtitle">By malih</div>
									</td>
									<td style="width: 35%;">
										<div class="product-title">50.000</div>
										<div class="product-subtitle">USD</div>
									</td>
									<td style="width: 20%;">
										<a href="" class="btn btn-remove-cart">
											Remove
										</a>
									</td>
								</tr>
								<tr>
									<td style="width: 29%;">
										<img src="./images/product-3.jpg" class="cart-image border">
									</td>
									<td style="width: 35%;">
										<div class="product-title">Buah Segar</div>
										<div class="product-subtitle">By malih</div>
									</td>
									<td style="width: 35%;">
										<div class="product-title">50.000</div>
										<div class="product-subtitle">USD</div>
									</td>
									<td style="width: 20%;">
										<a href="" class="btn btn-remove-cart">
											Remove
										</a>
									</td>
								</tr>
								<tr>
									<td style="width: 29%;">
										<img src="./images/product-4.jpg" class="cart-image border">
									</td>
									<td style="width: 35%;">
										<div class="product-title">Buah Segar</div>
										<div class="product-subtitle">By malih</div>
									</td>
									<td style="width: 35%;">
										<div class="product-title">50.000</div>
										<div class="product-subtitle">USD</div>
									</td>
									<td style="width: 20%;">
										<a href="" class="btn btn-remove-cart">
											Remove
										</a>
									</td>
								</tr>
							</tbody>
						</table>
					</div>
				</div>
				<div class="row" data-aos="fade-up" data-aos-delay="150">
					<div class="col-12">
						<hr />
					</div>
					<div class="col-12">
						<h2 class="mb-4">Shipping Details</h2>
					</div>
				</div>
				<div class="row mb-2" data-aos="fade-up" data-aos-delay="200">
					<div class="col-md-6">
						<div class="form-group">
							<label for="addressOne">Address</label>
							<input type="text" class="form-control" id="addressOne" name="addressOne" value="Jl....">
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<label for="addressTwo">Blok / No</label>
							<input type="text" class="form-control" id="addressOne" name="addressOne" value="Blok Mawar / 06">
						</div>
					</div>
					<div class="col-md-4">
						<div class="form-group">
							<label for="province">Province</label>
							<select name="province" id="province" class="form-control">
								<option value="west java">West Java</option>
							</select>
						</div>
					</div>
					<div class="col-md-4">
						<div class="form-group">
							<label for="city">City</label>
							<select name="city" id="city" class="form-control">
								<option value="Bekasi">Bekasi</option>
							</select>
						</div>
					</div>
					<div class="col-md-4">
						<div class="form-group">
							<label for="postal code">Postal Code</label>
							<input type="text" class="form-control" id="postal code" name="postal code" value="ex 17510">
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<label for="negara">Negara</label>
							<input type="text" class="form-control" id="negara" name="negara" value="Indonesia">
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<label for="mobile">Phone</label>
							<input type="text" class="form-control" id="mobile" name="mobile" value="+620898979776">
						</div>
					</div>
				</div>
				<div class="row" data-aos="fade-up" data-aos-delay="150">
					<div class="col-12">
						<hr />
					</div>
					<div class="col-12">
						<h2 class="mb-1">Payment Information</h2>
					</div>
				</div>
				<div class="row mb-5" data-aos="fade-up" data-aos-delay="200">
					<div class="col-4 col-md-2">
						<div class="product-title">$1</div>
						<div class="product-subtitle">Country Tax</div>
					</div>
					<div class="col-4 col-md-3">
						<div class="product-title">$12</div>
						<div class="product-subtitle">Product Assurance</div>
					</div>
					<div class="col-4 col-md-2">
						<div class="product-title">$13</div>
						<div class="product-subtitle">Ship To Balli</div>
					</div>
					<div class="col-4 col-md-2">
						<div class="product-title text-success">$13</div>
						<div class="product-subtitle">Total</div>
					</div>
					<div class="col-8 col-md-3">
						<a href="/success.html" class="btn btn-success mt-4 px-4 btn-block">Check Now</a>
					</div>
				</div>
			</div>
		</section>
	</div>
@endsection