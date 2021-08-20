@extends('layouts.dashboard')

@section('title')
    Dashboard Store product Detail
@endsection

@section('content')
	<!-- section-content -->
			<div class="section-content section-dashboard-home" data-aos="fade-up">
				<div class="container-fluid">
					<div class="dashboard-heading">
						<h2 class="dashboard-title">Brokolli</h2>
						<p class="dashboard-subtitle">
							Product details
						</p>
					</div>
					<div class="dashboard-content">
						<div class="row">
							<div class="col-12">
								<form action="">
									<div class="card">
										<div class="card-body ">
											<div class="row">
												<div class="col-md-6 ">
													<div class="form-group" >
														<label>Product Name</label>
														<input type="text" class="form-control" value="brokolli" />
													</div>
												</div>
												<div class="col-md-6 ">
													<div class="form-group" >
														<label>Price</label>
														<input type="number" class="form-control"  value="200"/>
													</div>
												</div>
												<div class="col-md-12">
													<div class="form-group">
														<label>Category</label>
														<select name="category" class="form-control">
															<option value="" disabled>Select Category</option>
														</select>
													</div>
												</div>

												<div class="col-md-12 ">
													<div class="form-group" >
														<label>Description</label>
														<textarea name="editor"></textarea>
													</div>
												</div>

											
												
											</div>
											<div class="row">
												<div class="col text-right">
													<button type="submit" class="btn btn-success btn-block px-5">
														save
													</button>
												</div>
											</div>
										</div>
									</div>
								</form>
							</div>
						</div>
						<div class="row mt-3">
							<div class="col-12">
								<div class="card">
									<div class="card-body">
										<div class="row">
											<div class="col-md-4">
												<div class="gallery-container">
													<img src="/images/product-4.jpg" style="" class="w-100 border">
													<a href="" class="delete-gallery">
														<img src="/images/icon-delete.svg" alt="">
													</a>
												</div>
											</div>
											<div class="col-md-4">
												<div class="gallery-container">
													<img src="/images/product-4.jpg" style="" class="w-100 border">
													<a href="" class="delete-gallery">
														<img src="/images/icon-delete.svg" alt="">
													</a>
												</div>
											</div>
											<div class="col-md-4">
												<div class="gallery-container">
													<img src="/images/product-4.jpg" style="" class="w-100 border">
													<a href="" class="delete-gallery">
														<img src="/images/icon-delete.svg" alt="">
													</a>
												</div>
											</div>
											<div class="col-md-12">
												<input type="file" id="file" style="display: none;" multiple>
												<button class="btn btn-secondary btn-block mt-3" onclick="thisFileUpload()">
													Add Photo
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
	<script src="https://cdn.ckeditor.com/4.15.1/standard/ckeditor.js"></script>
	<script>
        CKEDITOR.replace('editor');
	</script>
	<script>
		function thisFileUpload() {
			document.getElementById("file").click();
		}
	</script>
@endpush