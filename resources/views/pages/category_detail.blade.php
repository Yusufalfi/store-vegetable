@extends('layouts.app')

@section('title')
    Store detail Category
@endsection

@section('content')
    
<div class="page-content page-shop">
       <section class="hero">
			<div class="hero-wrap hero-bread" style="background-image: url('/images/bg_2.jpg'); height: 300px;">
				{{-- <img src="/images/bg_001.jpg" alt="gak ada gambar" srcset=""> --}}
				
			</div>
		</section>

		<section class="ftco-section mt-5">
    	<div class="container">

			<div class="row">
				<div class="col-12 col-md-12 mt-4 mb-4 d-flex justify-content-center">
						<ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
							<li class="nav-item" role="presentation">
								<a class="nav-link" >All</a>
							</li>
								@foreach ($categories as $category)
								<li class="nav-item" role="presentation">
									<a href="{{route('categories-detail', $category->slug)}}" class="nav-link">{{$category->name}}</a>
								</li>
								@endforeach
							 {{-- <li class="nav-item" role="presentation">
								<a class="nav-link" id="pills-contact-tab" data-toggle="pill" href="#pills-contact" role="tab" aria-controls="pills-contact" aria-selected="false">Fruits</a>
							</li>
							<li class="nav-item" role="presentation">
								<a class="nav-link" id="pills-y-tab" data-toggle="pill" href="#pills-y" role="tab" aria-controls="pills-y" aria-selected="false">Juice</a>
							</li>
							<li class="nav-item" role="presentation">
								<a class="nav-link" id="pills-z-tab" data-toggle="pill" href="#pills-z" role="tab" aria-controls="pills-z" aria-selected="false">Dried</a>
							</li>  --}}
						</ul>
				</div>
			</div>


		
			
    		<div class="row d-flex justify-content-center">
    			<div class="col-12 col-md-12 mb-4 text-center ">
				<div class="tab-content" id="pills-tabContent">
				<div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
					<div class="row">

						@forelse ($products as $item)
                    <div class=" col-6 col-md-6 col-lg-3 ftco-animate" >
                        <div class="product" >
                            <a href="{{ route('detail', $item->slug)}}" class="img-prod">
                                {{-- jika photonyamya ada tampilkan dan ambil data gallery pertama --}}
                                @if ($item->galleries->count())
                                 <img class="img-fluid" src="{{Storage::url($item->galleries->first()->photos)}}" alt="" style="height: 200px;">
                                @else
                                   <p class="mt-5 text-center">No Photo</p>
                                @endif
                                <span class="status">30%</span>
                                <div class="overlay"></div>
                            </a>
                            <div class="text py-3 pb-4 px-3 text-center">
                                <h3><a href="#"> {{$item->name}}</a></h3>
                                <div class="d-flex">
                                    <div class="pricing">
                                        <p class="price"><span class="mr-2 price-dc">$120.00</span><span class="price-sale">$ {{number_format($item->price)}} </span></p>
                                    </div>
                                </div>
                                <div class="bottom-area d-flex px-3">
                                    <div class="m-auto d-flex">
                                        <a href="#" class="add-to-cart d-flex justify-content-center align-items-center text-center">
                                            <span><i class="ion-ios-menu"></i></span>
                                        </a>
                                        <a href="#" class="buy-now d-flex justify-content-center align-items-center mx-1">
                                            <span><i class="ion-ios-cart"></i></span>
                                        </a>
                                        <a href="#" class="heart d-flex justify-content-center align-items-center ">
                                            <span><i class="ion-ios-heart"></i></span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                   @empty
                       
                   @endforelse
						{{-- <div class="col-6 col-md-6 col-lg-3 ftco-animate">
							<div class="product">
								<a href="details.html" class="img-prod"><img class="img-fluid" src="images/product-1.jpg" >
									<span class="status">30%</span>
									<div class="overlay"></div>
								</a>
								<div class="text py-3 pb-4 px-3 text-center">
									<h3><a href="#">Bell Pepper</a></h3>
									<div class="d-flex">
										<div class="pricing">
											<p class="price"><span class="mr-2 price-dc">$120.00</span><span class="price-sale">$80.00</span></p>
										</div>
									</div>
								
								</div>
							</div>
						</div> --}}
					
					

						
					</div>
				</div>
				{{-- <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
					<div class="row">
						<div class="col-6 col-md-6 col-lg-3 ftco-animate">
							<div class="product">
								<a href="details.html" class="img-prod"><img class="img-fluid" src="images/product-1.jpg" >
									<span class="status">30%</span>
									<div class="overlay"></div>
								</a>
								<div class="text py-3 pb-4 px-3 text-center">
									<h3><a href="#">Bell Pepper</a></h3>
									<div class="d-flex">
										<div class="pricing">
											<p class="price"><span class="mr-2 price-dc">$120.00</span><span class="price-sale">$80.00</span></p>
										</div>
									</div>
								
								</div>
							</div>
						</div>
					
								
    				</div>
				</div> --}}
				{{-- <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">
					<div class="row">
						<div class="col-6 col-md-6 col-lg-3 ftco-animate">
							<div class="product">
								<a href="#" class="img-prod"><img class="img-fluid" src="images/product-5.jpg" >
									<span class="status">30%</span>
									<div class="overlay"></div>
								</a>
								<div class="text py-3 pb-4 px-3 text-center">
									<h3><a href="#">Tomatoe</a></h3>
									<div class="d-flex">
										<div class="pricing">
											<p class="price"><span class="mr-2 price-dc">$120.00</span><span class="price-sale">$80.00</span></p>
										</div>
									</div>
								
								</div>
							</div>
						</div>
					
				

					
					
						</div>
					</div> --}}

					{{-- <div class="tab-pane fade" id="pills-y" role="tabpanel" aria-labelledby="pills-y-tab">
						<div class="col-6 col-md-6 col-lg-3 ftco-animate">
							<div class="product">
								<a href="#" class="img-prod"><img class="img-fluid" src="images/product-9.jpg" >
									<span class="status">30%</span>
									<div class="overlay"></div>
								</a>
								<div class="text py-3 pb-4 px-3 text-center">
									<h3><a href="#">Onion</a></h3>
									<div class="d-flex">
										<div class="pricing">
											<p class="price"><span class="mr-2 price-dc">$120.00</span><span class="price-sale">$80.00</span></p>
										</div>
									</div>
									
								</div>
							</div>
						</div>
					</div> --}}
					{{-- <div class="tab-pane fade" id="pills-z" role="tabpanel" aria-labelledby="pills-z-tab"><div class="col-6 col-md-6 col-lg-3 ftco-animate">
							<div class="product">
								<a href="#" class="img-prod"><img class="img-fluid" src="images/product-12.jpg" >
									<div class="overlay"></div>
								</a>
								<div class="text py-3 pb-4 px-3 text-center">
									<h3><a href="#">Chilli</a></h3>
									<div class="d-flex">
										<div class="pricing">
											<p class="price"><span>$120.00</span></p>
										</div>
									</div>
									
								</div>
							</div>
						</div>
					</div> --}}
				</div>
    			</div>
    		</div>
    		
    		<div class="row mt-5 mb-5 ">
          <div class="col-12 d-flex justify-content-center text-center">
				{{$products->links()}}
          </div>
        </div>
    	</div>
    </section>
     

     
    </div>
  

@endsection