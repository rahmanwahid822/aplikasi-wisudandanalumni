<!DOCTYPE html>
<html>
<head>
	<!-- Basic Page Info -->
	<meta charset="utf-8">
	<title>{{ $judul }}</title>
    <base href="{{ \URL::to('/') }}">
    
	<!-- Site favicon -->
	<link rel="apple-touch-icon" sizes="180x180" href="aset-login/vendors/images/apple-touch-icon.png">
	<link rel="icon" type="image/png" sizes="32x32" href="aset-login/vendors/images/favicon-32x32.png">
	<link rel="icon" type="image/png" sizes="16x16" href="aset-login/vendors/images/favicon-16x16.png">

	<!-- Mobile Specific Metas -->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

	<!-- Google Font -->
	<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
	<!-- CSS -->
	<link rel="stylesheet" type="text/css" href="aset-login/vendors/styles/core.css">
	<link rel="stylesheet" type="text/css" href="aset-login/vendors/styles/icon-font.min.css">
	<link rel="stylesheet" type="text/css" href="aset-login/vendors/styles/style.css">

	<!-- Global site tag (gtag.js) - Google Analytics -->
	<script async src="https://www.googletagmanager.com/gtag/js?id=UA-119386393-1"></script>
	<script>
		window.dataLayer = window.dataLayer || [];
		function gtag(){dataLayer.push(arguments);}
		gtag('js', new Date());

		gtag('config', 'UA-119386393-1');
	</script>
</head>
<body class="login-page">
	<div class="login-header box-shadow">
		<div class="container-fluid d-flex justify-content-between align-items-center">
			<div class="brand-logo">
				<a href="/">
					<img src="aset-login/vendors/images/amiktarunawhite.png" alt="">
				</a>
			</div>
			<div class="login-menu">
				<ul>
					<li><a href="register">Register</a></li>
				</ul>
			</div>
		</div>
	</div>
	<div class="login-wrap d-flex align-items-center flex-wrap justify-content-center">
		<div class="container">
			<div class="row align-items-center">
				<div class="col-md-6 col-lg-7">
					<img src="aset-login/vendors/images/login-page-img.png" alt="">
				</div>
				<div class="col-md-6 col-lg-5">
					<div class="login-box bg-white box-shadow border-radius-10">
						<div class="login-title">

							@if(session()->has('success'))
								<div class="alert alert-success alert-dismissible fade show" role="alert">
									{{ session('success') }}
  									<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
								</div>
								@endif
							
							@if(session()->has('loginError'))
								<div class="alert alert-danger alert-dismissible fade show" role="alert">
									{{ session('loginError') }}
  									<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
								</div>
							@endif
							<h2 class="text-center text-primary">Login To Sistem Wisuda & Alumni</h2>
						</div>
						<form action="/login" method="post">
							@csrf
							<div class="input-group custom">
								<input type="text" class="form-control form-control-lg @error('nim') is-invalid @enderror" placeholder="nim" name="nim"  id="nim" autofocus required>
								<div class="input-group-append custom">
									<span class="input-group-text"><i class="icon-copy dw dw-user1"></i></span>
								</div>
								@error('nim')
									<div class="invalid-feedback"> 
										Masukan NIM Dengan Benar
									</div>
								@enderror
							</div>
							<div class="input-group custom">
								<input type="password" class="form-control form-control-lg" placeholder="**********" name="password" id="password" required>
								<div class="input-group-append custom">
									<span class="input-group-text"><i class="dw dw-padlock1"></i></span>
								</div>
							</div>
							<div class="row pb-30">
								<div class="col-6">
									<div class="custom-control custom-checkbox">
										<input type="checkbox" class="custom-control-input" id="customCheck1">
										<label class="custom-control-label" for="customCheck1">Remember</label>
									</div>
								</div>
								<div class="col-6">
									<div class="forgot-password"><a href="forgot-password.html">Forgot Password</a></div>
								</div>
							</div>
							<div class="row">
								<div class="col-sm-12">
									<div class="input-group mb-0">
										
											
											<input class="btn btn-primary btn-lg btn-block" type="submit" value="Sign In">
										
										<!-- <a class="btn btn-primary btn-lg btn-block" href="login">Sign In</a> -->
									</div>
									<div class="font-16 weight-600 pt-10 pb-10 text-center" data-color="#707373">OR</div>
									<div class="input-group mb-0">
										<a class="btn btn-outline-primary btn-lg btn-block" href="register">Register To Create Account</a>
									</div>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- js -->
	<script src="aset-login/vendors/scripts/core.js"></script>
	<script src="aset-login/vendors/scripts/script.min.js"></script>
	<script src="aset-login/vendors/scripts/process.js"></script>
	<script src="aset-login/vendors/scripts/layout-settings.js"></script>
</body>
</html>