@extends('layouts.app')

@section('title')
    Store Detail
@endsection


@section('content')
    
<div class="page-content page-details">
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
									Product Details
								</li>
							</ol>
						</nav>
					</div>
				</div>
			</div>
		</section>


		<section class="store-gallery mb-5" id="gallery">
			<div class="container">
				<div class="row">
					<div class="col-lg-8" data-aos="zoom-in">
						<transition name="slide-fade" mode="out-in">
							<img :src="photos[activePhoto].url" :key="photos[activePhoto].id" class="w-100 main-image">
						</transition>
					</div>
					<div class="col-lg-2 mt-2">
						<div class="row">
							<div class="col-3 col-lg-12 mt-2 mt-lg-0" 
							v-for="(photo, index) in photos" 
							:key="photo.id"
							data-aos="zoom-in"
							data-aos-delay="100">
							<a href="#" @click="changeActive(index)">
								<img :src="photo.url" class="w-100 thumbnail-image" :class="{ active: index == activePhoto }" alt="" srcset="">
							</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>

		<div class="store-details-container" data-aos="fade-up">
			<section class="store-heading">
				<div class="container">
					<div class="row">
						<div class="col-lg-8">
							<h1>{{ $products->name }}</h1>
							<div class="owner">By {{ $products->user->name}}</div>
							<div class="price">Rp {{number_format($products->price) }}</div>
						</div>
						<div class="col-lg-2" data-aos="zoom-in">
							@auth

								<form action="{{ route('detail-add', $products->id) }}" method="POST" enctype="multipart/form-data">
									@csrf
									<button type="submit" class="btn btn-success px-4 text-white btn-block mb-3">
										Add to Cart
									</button>
								</form>
								@else
								<a href="{{ route('login') }}" class="btn btn-success px-4 text-white btn-block mb-3">
									 Login to add
								</a>

							@endauth
						
						</div>
					</div>
				</div>
			
			</section>
			<section class="store-description">
				<div class="container">
					<div class="row">
						<div class="col-12 col-lg-8">
							{!! $products->description !!}
						</div>
					</div>
				</div>
			</section>

			<section class="store-review">
				<div class="container">
					<div class="row">
						<div class="col-12">
							<div class="col-lg-8 mt-3 mb-3">
								<h5>Customer Review (3)</h5>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-12 col-lg-8">
							<ul class="list-unstyled">
								<li class="media">
									<img src="/images/person_2.jpg" class="mr-3 rounded-circle">
									<div class="media-body">
										<h5 class="mt-2 mb-1">Bambang</h5>
										good vege always fress
									</div>
								</li>
								<li class="media">
									<img src="/images/person_3.jpg" class="mr-3 rounded-circle">
									<div class="media-body">
										<h5 class="mt-2 mb-1">Sodikin</h5>
										 mantap jos
									</div>
								</li>
								<li class="media">
									<img src="/images/person_1.jpg" class="mr-3 rounded-circle">
									<div class="media-body">
										<h5 class="mt-2 mb-1">Maemunah</h5>
										beli 2 gratis 1
									</div>
								</li>
								
							</ul>
						</div>
					</div>
				</div>
			</section>
		</div>
	</div>

@endsection

@push('sesudah-script')
    <script src="/vendor/vue/vue.js"></script>
	<script>
		var gallery = new Vue({
			el: "#gallery", 
			mounted() {
				AOS.init();
			},
			data: {
				activePhoto: 0,
				photos: [
					@foreach( $products->galleries as $gallery)

						{
						id:  {{ $gallery->id }},
						url: "{{ Storage::url($gallery->photos) }}",
						},

					@endforeach
				],
			},
			methods: {
				changeActive(id) {
					this.activePhoto = id;
				},
			},
		});
	</script>
    {{-- <script src="/script/navbar-scroll.js"></script> --}}
@endpush