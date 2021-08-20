@extends('layouts.success')

@section('title')
    Store Success
@endsection

@section('content')
    	<div class="page-content page-success">
			<div class="section-success" data-aos="zoom-in">
				<div class="container">
					<div class="row align-items-center row-login justify-content-center">
						<div class="col-lg-6 text-center">
							<img src="./images/success.svg" alt="" class="mb-4">
							<h2>Transaction Prosseced!</h2>
							<p>Silahkan Tunggu Konfirmasi Email Dari Kami Dan Kami akan Kirim Resi Secepatnya</p>
							<div>
							<a href="/dashboard.html" class="btn btn-success w-50 mt-4">My Dashboard</a>
							<a href="/index.html.html" class="btn btn-signup w-50 mt-2">Go Shopping</a>
						</div>
						</div>
						
					</div>
				</div>
			</div>
		</div>

@endsection