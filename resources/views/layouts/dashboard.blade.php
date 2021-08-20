<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1, shrink-to-fit=no"
    />
    <meta name="description" content="" />
    <meta name="author" content="" />

    <title>@yield('title')</title>

    @stack('sebelum-style')
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet" />
    <link href="/style/main.css" rel="stylesheet" />
    @stack('sesudah-style')

  
  </head>

  <body>


      <!-- navbar button in mobile -->
	 <!-- <nav class="navbar navbar-light bg-white border-top navbar-expand d-md-none d-lg-none d-xl-none fixed-bottom">
		<ul class="navbar-nav nav-justified w-100">
			<li class="nav-item">
			<a href="#" class="nav-link">
				<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-house-door-fill" viewBox="0 0 16 16">
				<path d="M6.5 10.995V14.5a.5.5 0 0 1-.5.5H2a.5.5 0 0 1-.5-.5v-7a.5.5 0 0 1 .146-.354l6-6a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 .146.354v7a.5.5 0 0 1-.5.5h-4a.5.5 0 0 1-.5-.5V11c0-.25-.25-.5-.5-.5H7c-.25 0-.5.25-.5.495z"/>
				<path fill-rule="evenodd" d="M13 2.5V6l-2-2V2.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5z"/>
				</svg>
			</a>
			</li>
			<li class="nav-item">
			<a href="#" class="nav-link">
				<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
				<path fill-rule="evenodd" d="M10.442 10.442a1 1 0 0 1 1.415 0l3.85 3.85a1 1 0 0 1-1.414 1.415l-3.85-3.85a1 1 0 0 1 0-1.415z"/>
				<path fill-rule="evenodd" d="M6.5 12a5.5 5.5 0 1 0 0-11 5.5 5.5 0 0 0 0 11zM13 6.5a6.5 6.5 0 1 1-13 0 6.5 6.5 0 0 1 13 0z"/>
				</svg>
			</a>
			</li>
			<li class="nav-item">
			<a href="#" class="nav-link">
				<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-bag-plus-fill" viewBox="0 0 16 16">
				<path fill-rule="evenodd" d="M5.5 3.5a2.5 2.5 0 0 1 5 0V4h-5v-.5zm6 0V4H15v10a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V4h3.5v-.5a3.5 3.5 0 1 1 7 0zM8.5 8a.5.5 0 0 0-1 0v1.5H6a.5.5 0 0 0 0 1h1.5V12a.5.5 0 0 0 1 0v-1.5H10a.5.5 0 0 0 0-1H8.5V8z"/>
				</svg>
			</a>
			</li>
			<li class="nav-item">
			<a href="#" class="nav-link">
				<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-bell-fill" viewBox="0 0 16 16">
				<path d="M8 16a2 2 0 0 0 2-2H6a2 2 0 0 0 2 2zm.995-14.901a1 1 0 1 0-1.99 0A5.002 5.002 0 0 0 3 6c0 1.098-.5 6-2 7h14c-1.5-1-2-5.902-2-7 0-2.42-1.72-4.44-4.005-4.901z"/>
				</svg>
			</a>
			</li>
			<li class="nav-item">
			<a href="#" class="nav-link">
				<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
				<path d="M13.468 12.37C12.758 11.226 11.195 10 8 10s-4.757 1.225-5.468 2.37A6.987 6.987 0 0 0 8 15a6.987 6.987 0 0 0 5.468-2.63z"/>
				<path fill-rule="evenodd" d="M8 9a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
				<path fill-rule="evenodd" d="M8 1a7 7 0 1 0 0 14A7 7 0 0 0 8 1zM0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8z"/>
				</svg>
			</a>
			</li>
		</ul>
  </nav> -->

   <div class="page-dashboard">
	   <div class="d-flex" id="wrapper" data-aos="fade-right">
			<!-- sidebar -->
			<div class="border-right" id="sidebar-wrapper">
				<div class="sidebar-heading text-center">
					<img src="/images/logo.svg" alt="logo" class="my-4">
				</div>
				<div class="list-group list-group-flush">
					<a href="/dashboard.html" class="list-group-item list-group-item-action">
					DashBoard
					</a>
					<a href="/dashboard-products.html" class="list-group-item list-group-item-action">
					Products
					</a>
					<a href="/dashboard-transactions.html" class="list-group-item list-group-item-action">
					Transaction
					</a>
					<a href="/dashboard-settings.html" class="list-group-item list-group-item-action">
					Settings
					</a>
					<a href="/dashboard-account.html" class="list-group-item list-group-item-action">
					My Accounts
					</a>
					<a href="/index.html" class="list-group-item list-group-item-action">
					Sign-out
					</a>
				</div>
			</div>
			<!-- page-content -->
			<div id="page-content-wrapper">
				<nav class="navbar navbar-expand-lg navbar-light navbar-store fixed-top" data-aos="fade-down">
					<div class="container-fluid">
						<button class="btn btn-secondary d-md-none mr-auto mr-2" id="menu-toggle">
							&laquo; Menu
						</button>
					<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent">
						<span class="navbar-toggler-icon"></span>
					</button>
      				 <div class="collapse navbar-collapse" id="navbarSupportedContent">
         
					<!-- desktop menu -->
						<ul class="navbar-nav d-none d-lg-flex ml-auto">
							<li class="nav-item dropdown">
								<a href="" class="nav-link" id="navbarDropdown" role="button" data-toggle="dropdown">
									<img src="/images/person_1.jpg" class="rounded-circle mr-2 profile-picture">
									Hi, Yusuf
								</a>
								<div class="dropdown-menu">
									<a href="/dashboard.html" class="dropdown-item">Dashboard</a>
									<a href="/dashboard-account.html" class="dropdown-item">Settings</a>
									<div class="dropdown-divider"></div>
									<a href="/" class="dropdown-item">Logout</a>
								</div>
							</li>
							<li class="nav-item">
								<a href="" class="nav-link d-inline-block mt-2">
									<img src="/images/icon-cart-filled.svg" class="rounded-circle" alt="">
									<div class="card-badge">3</div>
								</a>
							</li>
						</ul>
						<!-- mobile menu -->
						<ul class="navbar-nav d-block d-lg-none">
							<li class="nav-item">
								<a href="" class="nav-link">
									Hi, Yusuf
								</a>
							</li>
							<li class="nav-item">
								<a href="" class="nav-link d-inline-block">
									Cart
								</a>
							</li>
						</ul>
       				</div>
      			</div>
			</nav>
			
        {{-- content --}}
        @yield('content')
			
		  </div>
	   </div>
   </div>


    <!-- Bootstrap core JavaScript -->
     @stack('sebelum-script')
    <script src="/vendor/jquery/jquery.slim.min.js"></script>
    <script src="/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
      AOS.init();
	</script>
	<script>
		$('#menu-toggle').click(function(e) {
			e.preventDefault();
			$('#wrapper').toggleClass('toggled');
		})
    </script>
    @stack('sesudah-script')
   
  </body>
</html>
