<!doctype html>
<html lang="en">
  <head>
  	<title>Scope 3d</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	
	<link rel="stylesheet" href="../../css/style.css">

	</head>
	<body class="img js-fullheight" style="background-image: url(images/bg.jpg);">
	<section class="ftco-section">
		<div class="container" style="margin-top: 13%;">
			<div class="row justify-content-center">
				<div class="col-md-6 text-center mb-5">
					<h2 class="heading-section">Scope 3D</h2>
				</div>
			</div>
			<div class="row justify-content-center">
				<div class="col-md-6 col-lg-4">
					<div class="login-wrap p-0">
		      	<!-- <h3 class="mb-4 text-center">Have an account?</h3> -->
		      	<form action="/" method="POST" class="signin-form">
                    @csrf
		      		<div class="form-group">
		      			<input type="text" class="form-control" name="username" id="username" placeholder="Username">
                        @error('username')
                            <span class="text-danger bg-light">{{$message}}</span>
                        @enderror
		      		</div>
                    <div class="form-group">
                    <input type="password" class="form-control" name="password" id="password" placeholder="Password">
                        @error('password')
                            <span class="text-danger bg-light">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <button type="submit" class="form-control btn btn-primary submit px-3">Sign In</button>
                    </div>
	          </form>
		      </div>
				</div>
			</div>
		</div>
	</section>

	<script src="../../js/jquery.min.js"></script>
  <script src="../../js/popper.js"></script>
  <script src="../../js/bootstrap.min.js"></script>
  <script src="../../js/main.js"></script>

	</body>
</html>

