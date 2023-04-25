<!doctype html>
<html lang="en">
  <head>
  	<title>SignUp</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,900&display=swap" rel="stylesheet">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	
	<link rel="stylesheet" href="view/login/css/style.css">

	</head>
	<body>
	<section class="ftco-section">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-6 text-center mb-5">
					<h2 class="heading-section">SignUp</h2>
				</div>
			</div>
			<div class="row justify-content-center">
				<div class="col-md-12 col-lg-10">
					<div class="wrap d-md-flex">
						<div class="text-wrap p-4 p-lg-5 text-center d-flex align-items-center order-md-last">
							<div class="text w-100">
								<h2>Welcome to Sign Up</h2>
								<p>have an account?</p>
								<a href="index1.php?controller=welcom&action=login" class="btn btn-white btn-outline-white">Sign In</a>
							</div>
			      </div>
						<div class="login-wrap p-4 p-lg-5">
			      	<div class="d-flex">
			      		<div class="w-100">
			      			<h3 class="mb-4">Sign Up</h3>
			      		</div>
								<div class="w-100">
									<p class="social-media d-flex justify-content-end">
										<a href="#" class="social-icon d-flex align-items-center justify-content-center"><span class="fa fa-facebook"></span></a>
										<a href="#" class="social-icon d-flex align-items-center justify-content-center"><span class="fa fa-twitter"></span></a>
									</p>
								</div>
			      	</div>
							<form action="index1.php?controller=welcom&action=signupProcess" class="signin-form" method="post">
								
							<div class="row">
                            <div class="col">
                                <div class="form-group mb-3">
			      			        <label class="label" for="name">FIRST NAME</label>
			      			        <input type="text" class="form-control" name="firstName" placeholder="First Name" required>
			      		        </div>
                            </div>
                            <div class="col">
                                <div class="form-group mb-3">
                                    <label class="label" for="name">LAST NAME</label>
                                    <input type="text" class="form-control" name="lastName" placeholder="Last Name" required>
                                </div>
                            </div>
                        </div>

						<div class="form-group mb-3">
			      			<label class="label" for="name">EMAIL</label>
			      			<input type="text" class="form-control" name="email" placeholder="Email" required>
			      		</div>

		            <div class="form-group mb-3">
		            	<label class="label" for="password">USER NAME</label>
		              <input type="text" class="form-control" name="userName" placeholder="User Name" required>
		            </div>
					
		            <div class="form-group mb-3">
		            	<label class="label" for="password">Password</label>
		              <input type="password" class="form-control" name="password" placeholder="Password" required>
		            </div>
                    <div class="form-group mb-3">
                       
                            <label class="label" for="">GENDER</label>
                            <select class="form-control" name="gender">
                                <option value="male">Male</option>
                                <option value="female">Female</option>
                                <option value="other">Other</option>
                            </select>
                        
		            </div>

		            <div class="form-group">
		                <button type="submit" class="form-control btn btn-primary submit px-3">Sign Up</button>	
		            </div>
		            <div class="form-group d-md-flex">
		            	
		          </form>
		        </div>
		      </div>
				</div>
			</div>
		</div>
	</section>

	<script src="js/jquery.min.js"></script>
  <script src="js/popper.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/main.js"></script>

	</body>
</html>

