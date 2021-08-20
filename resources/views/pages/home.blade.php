@extends('layouts.app')

@section('title')
    Store HomePage
@endsection

@section('content')
    <div class="page-content page-home" style="">
        @if(count($banners)>0)
        <section class="store-carousel" style="overflow-x: hidden; ">
            <!-- <div class="container"> -->
            <div class="row">
                <div class="col-lg-12">
                <div id="storeCarousel" class="carousel slide" data-ride="carousel" data-interval="4000">

                    <ol class="carousel-indicators">
                  
                                
                        <li class="active" data-target="storeCarousel" data-slide-to="0">
                        </li>
                        <li data-target="storeCarousel" data-slide-to="1">
                        </li>

                        <li data-target="storeCarousel" data-slide-to="2">
                        </li>
                   
                    </ol>
               <div class="carousel-inner" >
                   @foreach ($banners as $key => $banner)
                    <div class="carousel-item  {{$key == 0 ? 'active' : '' }}">
                        <img src=" {{Storage::url($banner->photo)}}" alt="" class="d-block  img-fluid ">
                        <div class="carousel-caption d-none d-md-block text-left">
                            <h1 style="font-size: 4rem; color: #F7941D">{{$banner->title}}</h1>
                            <p class="text-dark" style=" font-weight: bold; font-size: 1.5rem;">{!! html_entity_decode($banner->description) !!}</p>
                            <a class="btn btn-md btn-success" href="" role="button">Shop Now<i class="far fa-arrow-alt-circle-right"></i></i></a>
                        </div>
                    </div>
                    {{-- <div class="carousel-item">
                        <img src="./images/bg_001.jpg" alt="" class="d-block w-100">
                    </div>
                    <div class="carousel-item">
                        <img src="./images/bg_003.jpg" alt="" class="d-block w-100">
                    </div> --}}
                   @endforeach
                    </div>
                </div>
                </div>
            </div>
            </div>
        </section>
        @endif

        <section class="store-trend-categories mt-4">
            <div class="container">
            
                <div class="row no-gutters ftco-services dflex justify-content-center">
                    <div class="col-4 col-lg-2 col-md-4 text-center d-flex align-self-stretch ftco-animate"  data-aos="fade-up" data-aos-delay="100" >
                        <div class="media block-6 services mb-md-0 mb-4">
                            <div class="icon bg-color-1 active d-flex justify-content-center align-items-center mb-2">
                                    <a href="#" class="nav-link">
                                    <img src="./images/shipping-truck.png" alt="" srcset="">
                                </a>
                            </div>
                            <div class="media-body ">
                                <h3 class="heading">Free Shipping</h3>
                                <span>On order over $100</span>
                                
                            </div>
                        </div>      
                    </div>
            
                    <div class="col-4 col-md-4 col-lg-2 text-center d-flex align-self-stretch ftco-animate"  data-aos="fade-up" data-aos-delay="200">
                        <div class="media block-6 services mb-md-0 mb-4">
                            <div class="icon bg-color-2 d-flex justify-content-center align-items-center mb-2">
                                    <a href="#" class="nav-link">
                                    <img src="./images/diet.png" alt="" srcset="">
                                </a>
                            </div>
                            <div class="media-body">
                                <h3 class="heading">Always Fresh</h3>
                                <span>Product well package</span>
                            
                            </div>
                        </div>    
                    </div>
           
                    <div class="col-4 col-md-4 col-lg-2 text-center d-flex align-self-stretch ftco-animate"  data-aos="fade-up" data-aos-delay="300">
                        <div class="media block-6 services mb-md-0 mb-4">
                            <div class="icon bg-color-3 d-flex justify-content-center align-items-center mb-2">
                                    <a href="#" class="nav-link">
                                    <img src="./images/medal.png" alt="" srcset="">
                                </a>
                            </div>
                            <div class="media-body">
                                <h3 class="heading">Superior Quality</h3>
                                <span>Quality Products</span>
                            </div>
                        </div>      
                    </div>
                    
                    <div class="col-4 col-md-4 col-lg-2 text-center d-flex align-self-stretch ftco-animate "  data-aos="fade-up" data-aos-delay="400">
                        <div class="media block-6 services mb-md-0 mb-4">
                            <div class="icon bg-color-4 d-flex justify-content-center align-items-center mb-2">
                                    <a href="#" class="nav-link">
                                    <img src="./images/customer-service.png" alt="" srcset="">
                                </a>
                            </div>
                            <div class="media-body">
                                <h3 class="heading">Extra Support</h3>
                                <span>24/7 Support</span>
                            </div>
                        </div>      
                    </div>
           
                 </div>
            </div>
        </section>


        <section class="ftco-section ftco-category ftco-no-pt mt-5 mb-2">
                <div class="container">
                    <div class="row">
                                    
                <div class="col-12" data-aos="fade-up">
                <h5 class="ml-2">Trend Category</h5>
                </div>
                        <div class="col-md-12 mb-3">
                            <div class="row">
                               
                                @forelse ($categories as $category)
                                  <div class="col-md-6">
                                    <div class="category-wrap ftco-animate img mb-3 d-flex align-items-end mt-4" 
                                    style="background-image: url( {{ Storage::url($category->photo)}})">
                                        <div class="text px-3 py-1">
                                            <h2 class="mb-0">
                                                <a href="{{route('categories-detail', $category->slug)}}"> {{ $category->name}}</a></h2>
                                        </div>
                                    </div>
                                   
                                </div>
                                    
                                @empty
                                    <div class="col-12 text-center-py-3">
                                        Categories Not found
                                    </div>
                                @endforelse                              
                            </div>
                        </div>

                    </div>
                </div>
        </section>
    


        <section class="ftco-section mt-3 mb-5">
            <div class="container">
                <div class="row justify-content-center mb-3 pb-3">
                    <div class="col-md-12 heading-section text-center ftco-animate">
                        <span class="subheading text-success">Featured Products</span>
                        <h3 class="mb-3 bold">Our Products</h3>
                        {{-- <p class="text-secondary">Far far away, behind the word mountains, far from the countries Vokalia and Consonantia</p> --}}
                    </div>
                </div>   		        
            </div>
            <div class="container">
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
                    
                  
                </div>
            </div>
        </section>
    </div>
@endsection
@push('sesudah-style')
<style>
    .carousel-item img {
    height: 70vh;
    width: 100%;
    background-repeat: no-repeat;

    /* background-position: center center; */
    background-size: cover;
  }
</style>
  @endpush