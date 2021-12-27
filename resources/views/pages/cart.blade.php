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
                                    <td>Harga</td>
                                    <td>Menu</td>
                                </tr>
                            </thead>
                            <tbody>
                                {{-- menghitung total --}}
                                @php
                                    $totalPrice = 0;
                                @endphp
                                @foreach ($carts as $cart)
                                    <tr>
                                        <td style="width: 29%;">
                                            {{-- cek  jika galleri ada --}}
                                            @if ($cart->product->galleries)
                                                <img src="{{ Storage::url($cart->product->galleries->first()->photos) }}"
                                                    class="cart-image border">
                                            @endif
                                        </td>
                                        <td style="width: 35%;">
                                            <div class="product-title"> {{ $cart->product->name }}</div>
                                            <div class="product-subtitle"> By {{ $cart->product->user->store_name }}</div>
                                        </td>
                                        <td style="width: 35%;">
                                            <div class="product-title"> Rp {{ number_format($cart->product->price) }}
                                            </div>
                                            {{-- <div class="product-subtitle">Rp</div> --}}
                                        </td>
                                        <td style="width: 20%;">
                                            <form action=" {{ route('cart-delete', $cart->id) }}" method="post">
                                                @method('DELETE')
                                                @csrf
                                                <button type="submit" class="btn btn-remove-cart">
                                                    Hapus
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                    @php
                                        $totalPrice += $cart->product->price;
                                        
                                    @endphp

                                @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="row" data-aos="fade-up" data-aos-delay="150">
                    <div class="col-12">
                        <hr />
                    </div>
                    <div class="col-12">
                        <h2 class="mb-4">Alamat Pengirim</h2>
                    </div>
                </div>
                <form action=" {{ route('checkout') }}" id="locations" method="post" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="total_price" value="{{ $totalPrice }}">
                    <div class="row mb-2" data-aos="fade-up" data-aos-delay="200">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="address_one">Alamat / jalan </label>
                                <input type="text" class="form-control" id="address_one" name="address_one" value="" placeholder="jl setia darma">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="address_two">Blok / No</label>
                                <input type="text" class="form-control" id="address_two" name="address_two"
                                    value="" placeholder="mawar blok 5 N0.5">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="provinces_id">Provinsi</label>
                                <select name="provinces_id" id="provinces_id" class="form-control" v-if="provinces" v-model="provinces_id">
                                    <option v-for="province in provinces" :value="province.id">@{{ province.name }}</option>
                                </select>
								<select v-else class="form-control"></select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="regencies_id">Kota</label>
								<select name="regencies_id" id="regencies_id" class="form-control" v-if="regencies" v-model="regencies_id">
                                    <option v-for="regency in regencies" :value="regency.id">@{{ regency.name }}</option>
                                </select>
								<select v-else class="form-control"></select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="zip_code">postal_code</label>
                                <input type="text" class="form-control" id="zip_code" name="zip_code"
                                    value="">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="country">Negara</label>
                                <input type="text" class="form-control" id="country" name="country" value="" placeholder="indonesia">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="phone_number">Phone</label>
                                <input type="text" class="form-control" id="phone_number" name="phone_number" value="" placeholder="+620898979776">
                            </div>
                        </div>
                    </div>
                    <div class="row" data-aos="fade-up" data-aos-delay="150">
                        <div class="col-12">
                            <hr />
                        </div>
                        <div class="col-12">
                            <h2 class="mb-1"> Informasi Pembayaran</h2>
                        </div>
                    </div>
                    <div class="row mb-5">
                        {{-- <div class="col-4 col-md-2">
							<div class="product-title">$1</div>
							<div class="product-subtitle">Country Tax</div>
						</div>
						<div class="col-4 col-md-3">
							<div class="product-title">$12</div>
							<div class="product-subtitle">Product Assurance</div>
						</div>
						<div class="col-4 col-md-2">
							<div class="product-title">$</div>
							<div class="product-subtitle">Ship To Balli</div>
						</div> --}}
                        <div class="col-4 col-md-2 mb-4">
                            <div class="product-subtitle mt-2">
                                <h4>Total</h4>
                            </div>
                            <div class="product-title text-success">Rp {{ number_format($totalPrice ?? 0) }}</div>
                        </div>
                        <div class="col-8 col-md-3 ml-auto">
                            <button type="submit" class="btn btn-success mt-4 px-4 btn-block">Checkout Now</button>
                        </div>
                    </div>
                </form>
            </div>
        </section>
    </div>
@endsection

@push('sesudah-script')
    <script src="/vendor/vue/vue.js"></script>
	<script src="https://unpkg.com/axios/dist/axios.min.js"></script>
	<script>
		var locations = new Vue({
			el: "#locations", 
			mounted() {
				AOS.init();
				this.getProvincesData();
			},
			data: {
				provinces: null,
				regencies: null,
				provinces_id: null,
				regencies_id: null
			
			},
			methods: {
				getProvincesData(){
					var self = this;
					axios.get('{{ route('api-provinces') }}')
					.then(function(response) {
						self.provinces = response.data;
					})
				},
				getregenciesData(){
					var self = this;
					axios.get('{{ url('api/regencies') }}/' + self.provinces_id)
					.then(function(response) {
						self.regencies = response.data;
					})
				},
			},
			watch: {
				provinces_id: function(val, oldVal) {
					this.regencies_id = null;
					this.getregenciesData();
				}
			}
		});
	</script>
    {{-- <script src="/script/navbar-scroll.js"></script> --}}
@endpush
