<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>ChemTix | Login</title>
		<!-- Google Font: Source Sans Pro -->
		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
		<!-- Font Awesome -->
		<link rel="stylesheet" href="{{asset('admin-assets/plugins/fontawesome-free/css/all.min.css')}}">
		<!-- Theme style -->
		<link rel="stylesheet" href="{{asset('admin-assets/css/adminlte.min.css')}}">
		<link rel="stylesheet" href="{{asset('admin-assets/css/custom.css')}}">
		<style>
			.divider:after,
			.divider:before {
				content: "";
				flex: 1;
				height: 1px;
				background: #eee;
			}
			.common-btn, a.common-btn, button.common-btn {
				font-family: 'Nunito Sans', sans-serif;
				font-weight: 700;
				font-size: 17px;
				line-height: 15px;
				color: #ffffff;
				background-color: #0F4989;
				padding: 16px 30px;
				border-radius: 5px;
				text-transform: uppercase;
				display: inline-block;
				border: none;
				text-align: center;
			}
		</style>
	</head>
	<body class="hold-transition login-page">
		<section class="vh-100">
			<div class="container py-5 h-100">
			  <div class="row d-flex align-items-center justify-content-center h-100">
				<div class="col-md-8 col-lg-7 col-xl-6">
				  <img src="{{asset('front-assets/chemtix_images/login_img_1.png')}}"
					class="img-fluid" alt="Phone image">
				</div>
				
				<div class="col-md-7 col-lg-5 col-xl-5 offset-xl-1">
					<div class="d-flex justify-content-center mb-5">
						<img class="img-fluid w-50"
						src="@if (!empty(genrealSetting())) {{ asset('images/setting/' . genrealSetting()->primary_logo) }}" @endif alt="">	
					</div>
					@if ($errors->any())
						<div class="alert alert-danger">
							<ul>
								@foreach ($errors->all() as $error)
								@if($error == "Invalid Credentials")
									<li>{{ $error }}</li>
								@endif
								@endforeach
							</ul>
						</div>
					@endif
				
				  <form action="{{route('admin.authenticate')}}" method="post">
					@csrf
					<!-- Email input -->
					<div data-mdb-input-init class="form-outline mb-4">
						<label class="form-label" for="form1Example13" style="color:#0f4989">Email address</label>
						<input type="email" value="{{old('email')}}" name="email" id="email" class="form-control @error('email') is-invalid @enderror " placeholder="Email">
						@error('email')
                            <p class="invalid-feedback">{{ $message }}</p>
                    	@enderror
					</div>
		  
					<!-- Password input -->
					<div data-mdb-input-init class="form-outline mb-4">
						<label class="form-label" for="form1Example23" style="color:#0f4989">Password</label>
						<input type="password" name="password" id="password" class="form-control @error('password') is-invalid @enderror" placeholder="Password">
					  @error('password')
                          <p class="invalid-feedback">{{ $message }}</p>
                      @enderror
					</div>
		  
					<!-- Submit button -->
					<button type="submit" data-mdb-button-init data-mdb-ripple-init class="common-btn btn-lg btn-block">Sign in</button>
				  </form>
				</div>
			  </div>
			</div>
		  </section>
		<!-- ./wrapper -->
		<!-- jQuery -->
		<script src="{{asset('admin-assets/plugins/jquery/jquery.min.js')}}"></script>
		<!-- Bootstrap 4 -->
		<script src="{{asset('admin-assets/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
		<!-- AdminLTE App -->
		<script src="{{asset('admin-assets/js/adminlte.min.js')}}"></script>
		<!-- AdminLTE for demo purposes -->
		{{-- <script src="{{asset('admin-assets/js/demo.js')}}"></script> --}}
	</body>
</html>