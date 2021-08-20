@extends('layouts.dashboard')

@section('title')
    Dashboard Store Transaction-details
@endsection

@section('content')
  		<!-- section-content -->
			<div class="section-content section-dashboard-home" data-aos="fade-up">
				<div class="container-fluid">
					<div class="dashboard-heading">
						<h2 class="dashboard-title">#STORE01</h2>
						<p class="dashboard-subtitle">
							Transaction Details
						</p>
					</div>
					<div class="dashboard-content" id="transactionDetails">
						<div class="row">
							<div class="col-12">
								<div class="card">
									<div class="card-body">
										<div class="row">
											<div class="col-12 col-md-4">
												<img src="/images/product-11.jpg" class="w-100 mb-3 border" alt="">
											</div>
											<div class="col-12 col-md-8">
												<div class="row">
													<div class="col-12 col-md-6">
														<div class="product-title">
															Customer Name
														</div>
														<div class="product-subtitle">
															Yusuf Alfi
														</div>
													</div>
													<div class="col-12 col-md-6">
														<div class="product-title">
															Product Name
														</div>
														<div class="product-subtitle">
															Tomato
														</div>
													</div>
													<div class="col-12 col-md-6">
														<div class="product-title">
															Date of Transaction
														</div>
														<div class="product-subtitle">
															02- January -2021
														</div>
													</div>
													<div class="col-12 col-md-6">
														<div class="product-title">
															Payment Status 
														</div>
														<div class="product-subtitle text-danger">
															Pending
														</div>
													</div>
													<div class="col-12 col-md-6">
														<div class="product-title">
															Total Amount
														</div>
														<div class="product-subtitle">
															$280,409
														</div>
													</div>
													<div class="col-12 col-md-6">
														<div class="product-title">
															Phone
														</div>
														<div class="product-subtitle">
															089543356546
														</div>
													</div>
												</div>
											</div>
										</div>
										<div class="col-12 mt-4">
											<h5>Shipping Information</h5>
										</div>
										<div class="col-12">
											<div class="row">
												<div class="col-12 col-md-6">
													<div class="product-title">
														Address 1
													</div>
													<div class="product-subtitle">
														Bekasi 
													</div>
												</div>
												<div class="col-12 col-md-6">
													<div class="product-title">
														Address II
													</div>
													<div class="product-subtitle">
														JL Raya.
													</div>
												</div>
												<div class="col-12 col-md-6">
													<div class="product-title">
														Province
													</div>
													<div class="product-subtitle">
														Jawa-Barat
													</div>
												</div>
												<div class="col-12 col-md-6">
													<div class="product-title">
														City
													</div>
													<div class="product-subtitle">
														Bekasi
													</div>
												</div>
												<div class="col-12 col-md-6">
													<div class="product-title">
														Postal Code
													</div>
													<div class="product-subtitle">
														17610
													</div>
												</div>
												<div class="col-12 col-md-6">
													<div class="product-title">
														Country
													</div>
													<div class="product-subtitle">
														Indonesia
													</div>
												</div>
												<div class="col-12 col-md-3">
													<div class="product-title">
														Shipping Status
													</div>
													<select name="status" id="status" class="form-control" v-model="status">
													
														<option value="PENDING">Pending</option>
														<option value="SHIPPING">Shipping</option>
														<option value="SUCCESS">Success</option>
													</select>
													</div>
													<template v-if="status == 'SHIPPING'">
														<div class="col-md-3">
															<div class="product-title"> Input Resi</div>
															<input type="text" class="form-control" name="resi" v-model="resi">
														</div>
														<div class="col-md-2">
															<button type="submit" class="btn btn-success btn-block mt-4 mb-4">
																Update Resi
															</button>
														</div>
													</template>
												
											</div>
										</div>
											<div class="row mt-4">
											  <div class="col-12 text-right">
												<button type="submit" class="btn btn-success btn-lg mt-4 mb-4">
												save
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
@endsection

@push('sesudah-script')
   <script src="/vendor/vue/vue.js"></script>
   <script>
	   var transactionDetails = new Vue( {
		   el: '#transactionDetails',
		   data: {
			   status: "SHIPPING",
			   resi: "987BG765A"
		   },
	   });
   </script>
@endpush