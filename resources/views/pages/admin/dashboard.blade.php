@extends('layouts.admin')

@section('title')
    Dashboard Store
@endsection

@section('content')
   <div class="section-content section-dashboard-home" data-aos="fade-up">
        <div class="container-fluid">
            <div class="dashboard-heading">
                <h2 class="dashboard-title">Admin DashBoard</h2>
                <p class="dashboard-subtitle">
                   Administator Panel
                </p>
            </div>
            <div class="dashboard-content">
                <div class="row">
                    <div class="col-md-4">
                        <div class="card mb-2">
                            <div class="card-body">
                                <div class="dashboard-card-title">
                                    Customer
                                </div>
                                <div class="dashboard-card-subtitle">
                                  {{ $customer }}
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card mb-2">
                            <div class="card-body">
                                <div class="dashboard-card-title">
                                    Revenue
                                </div>
                                <div class="dashboard-card-subtitle">
                                  Rp {{ number_format($revenue)}}
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card mb-2">
                            <div class="card-body">
                                <div class="dashboard-card-title">
                                    Transaction
                                </div>
                                <div class="dashboard-card-subtitle">
                                   {{ $transaction }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- <div class="row mt-3">
                    <div class="col-12 mt-2">
                        <h5 class="mb-3">Recent Transaction</h5>
                        <a href="/dashboard-transactions-details.html" class="card card-list d-block">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-1">
                                        <img src="./images/product-4.jpg" alt="" style="max-width: 75px;">
                                    </div>
                                    <div class="col-md-4  mt-2">
                                        brokolly
                                    </div>
                                    <div class="col-md-3 mt-2">
                                    Yusuf
                                    </div>
                                    <div class="col-md-3 mt-2">
                                    january 2020
                                    </div>
                                    <div class="col-md-1 d-none d-md-block">
                                        <img src="./images/dashboard-arrow-right.svg">
                                    </div>
                                </div>
                            </div>
                        </a>
                        <a href="/dashboard-transactions-details.html" class="card card-list d-block">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-1">
                                        <img src="./images/product-4.jpg" alt="" style="max-width: 75px;">
                                    </div>
                                    <div class="col-md-4 mt-2">
                                        brokolly
                                    </div>
                                    <div class="col-md-3 mt-2">
                                    Yusuf
                                    </div>
                                    <div class="col-md-3 mt-2">
                                    january 2020
                                    </div>
                                    <div class="col-md-1 d-none d-md-block">
                                        <img src="./images/dashboard-arrow-right.svg">
                                    </div>
                                </div>
                            </div>
                        </a>
                        <a href="/dashboard-transactions-details.html" class="card card-list d-block">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-1">
                                        <img src="./images/product-4.jpg" alt="" style="max-width: 75px;">
                                    </div>
                                    <div class="col-md-4  mt-2">
                                        brokolly
                                    </div>
                                    <div class="col-md-3 mt-2">
                                    Yusuf
                                    </div>
                                    <div class="col-md-3 mt-2">
                                    january 2020
                                    </div>
                                    <div class="col-md-1 d-none d-md-block">
                                        <img src="./images/dashboard-arrow-right.svg">
                                    </div>
                                </div>
                            </div>
                        </a>
                </div>
            </div> --}}
        </div>
    </div>
			
		  </div>
@endsection