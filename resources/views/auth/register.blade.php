@extends('layouts.auth')

@section('content')

<div class="page-content page-auth mb-5" id="register">
	   <div class="section-store-auth" data-aos="fade-up">
			<div class="container">
				<div class="row  row-login">
					
					<div class="col-12">
						<h2>Jual Beli Kebutuhan, <br /> Dengan Lebih Mudah</h2>
						<form class="mt-3" method="POST" action="{{ route('register') }}">
							@csrf
							<div class="row">
							<div class="col-md-6 col-12">
								<div class="form-group">
									<label>Full Name</label>
									<input id="name"
									       v-model="name" 
										   type="text" 
										   class="form-control @error('name') is-invalid @enderror" 
										   name="name" value="{{ old('name') }}"
										   required
										   autocomplete="name"
										   autofocus>

										@error('name')
											<span class="invalid-feedback" role="alert">
												<strong>{{ $message }}</strong>
											</span>
										@enderror
								</div>
							</div>
							<div class="col-md-6 col-12">
								<div class="form-group">
									<label>Email</label>
									<input id="email"
									       v-model="email"
										   @change="checkForEmailAvailability()"
									       type="email" 
										   class="form-control @error('email') is-invalid @enderror" 
										   :class="{ 'is-invalid' : this.email_unavailable }"
										   name="email" 
										   value="{{ old('email') }}" 
										   required 
										   autocomplete="email">

										@error('email')
											<span class="invalid-feedback" role="alert">
												<strong>{{ $message }}</strong>
											</span>
										@enderror
								</div>
							</div>
							<div class="col-md-6 col-12">
								<div class="form-group">
									<label>password</label>
								
									<input id="password"
									       type="password" 
										   class="form-control @error('password') is-invalid @enderror" 
										   name="password" 
										   required 
										   autocomplete="new-password">

									@error('password')
										<span class="invalid-feedback" role="alert">
											<strong>{{ $message }}</strong>
										</span>
									@enderror
								</div>
							</div>
							<div class="col-md-6 col-12">
								<div class="form-group">
									<label>password-confirm</label>
								
									<input id="password_confirm"
									       type="password" 
										   class="form-control @error('password_confirmation') is-invalid @enderror" 
										   name="password_confirmation" 
										   required 
										   autocomplete="new-password">

									@error('password_confirmation')
										<span class="invalid-feedback" role="alert">
											<strong>{{ $message }}</strong>
										</span>
									@enderror
								</div>
							</div>
							<div class="col-md-12 col-12">
								<div class="form-group">
									<label>store</label>
									<p class="text-muted">
										Apakah Anda ingin Membuka Toko
									</p>
									<div class="custom-control custom-radio custom-control-inline ">
										<input type="radio" class="custom-control-input"  name="is_store_open"  id="openStoreTrue"v-model="is_store_open" :value="true" />
										<label for="openStoreTrue" class="custom-control-label"> Iya</label>
									</div>

									<div class="custom-control custom-radio custom-control-inline">
										<input type="radio" class="custom-control-input" name="is_store_open" id="openStoreFalse" v-model="is_store_open" :value="false" />
										<label for="openStoreFalse" class="custom-control-label"> Tidak</label>
									</div>
								</div>

								<div class="row">

									<div class="col-md-6 col-12">
									   <div class="form-group" v-if="is_store_open">
										<label>Nama Toko</label>
										<input type="text"
										       v-model="store_name"
											   id="store_name"
											   name="store_name"
										       class="form-control @error('store_name') is-invalid @enderror" 
											   autofocus required autocomplete >
											   @error('store_name')
													<span class="invalid-feedback" role="alert">
														<strong>{{ $message }}</strong>
													</span>	
											   @enderror
								       </div>
									</div>
									
									<div class="col-md-6 col-12">
									   <div class="form-group" v-if="is_store_open">
										<label>Kategori</label>
										<select name="categories_id" class="form-control">
											<option value="">Select Category</option>
											@foreach ($categories as $category)
											<option value="{{ $category->id}}"> {{ $category->name}}</option>
											@endforeach
									</select>
								       </div>
									</div>

								</div>
	
							</div>
					
								<div class="col-md-6 col-12">
									<button 
									type="submit" 
									class="btn btn-success btn-block mt-4"
									:disabled="this.email_unavailable"
									
									>
									Sign up now
								    </button>	
								</div>
								
								<div class="col-md-6 col-12">
									<a href="{{ route('login')}}" class="btn btn-signup btn-block mt-4">Back To sign in</a>
								</div>
				
						  </div>
						</form>
					</div>
				</div>
			</div>
	   </div>
   </div>

@endsection

@push('sesudah-script')
    <script src="/vendor/vue/vue.js"></script>
	<script src="https://unpkg.com/vue-toasted"></script>
	<script src="https://unpkg.com/axios/dist/axios.min.js"></script>


	<script>
		Vue.use(Toasted);

		var register = new Vue({
			el: '#register',
			mounted() {
				AOS.init();
			
			},
			methods: {
				checkForEmailAvailability: function() {
					var self = this;
					// Make a request for a user with a given ID
				axios.get('{{ route('api-register-check') }}', {
					params: {
						email: this.email
					}
				})
				.then(function (response) {

					if(response.data == 'Available') {
						self.$toasted.show(
							"Email anda sudah tersedia, silahkan lanjutkan langkah berikutnya",
							{
								position: "bottom-right",
								className: "rounded",
								duration: 4000,
							}
						);
						self.email_unavailable = false;
					} else {
						self.$toasted.error(
							"Maaf email anda sudah terdaftar di sistem kami",
							{
								position: "bottom-right",
								className: "rounded",
								duration: 4000,
							}
						);
						self.email_unavailable = true;
					}


					// handle success
					console.log(response);
				});
				
				
								}
			},
			data() {
				return {
					name: "Yusuf Alfi",
					email: "Yusuf.alfi56@gmail.com",
					is_store_open: true,
					store_name: "",
					email_unavailable: false
				}
			},
		});
	</script>
@endpush
