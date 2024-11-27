<!DOCTYPE html>
<html lang="en">
    
 
<head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
        <meta name="description" content="Smarthr - Bootstrap Admin Template">
		<meta name="keywords" content="admin, estimates, bootstrap, business, corporate, creative, management, minimal, modern, accounts, invoice, html5, responsive, CRM, Projects">
        <meta name="author" content="Dreamguys - Bootstrap Admin Template">
        <meta name="robots" content="noindex, nofollow">

        <title>Password reset - CUSTECH Applicants Portal</title>
        	<!-- Favicon -->
      <link rel="shortcut icon" href="../webadmin/inc/favicon.png">
	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
		
		<!-- Fontawesome CSS -->
        <link rel="stylesheet" href="{{asset('css/font-awesome.min.css')}}">
		
		<!-- Main CSS -->
        <link rel="stylesheet" href="{{asset('css/style.css')}}">
		
		
		<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
		<!--[if lt IE 9]>
			<script src="assets/js/html5shiv.min.js"></script>
			<script src="assets/js/respond.min.js"></script>
		<![endif]-->
    </head>
    <body class="account-page">
	
		<!-- Main Wrapper -->
        <div class="main-wrapper">
			<div class="account-content">
				 
				<div class="container">
					<div class="column-md-8">
					<div class="card-body">
					@if($errors->any())
					<ul class="list-group">
					@foreach($errors->all() as $error)
					<div class="alert alert-danger">
					<li class="list-group-item">
					            {{$error}}
                            </li>
					       @endforeach
                           </ul>
                         </div>
			            @endif


					<div class="account-content">
						@if(session()->has('success'))
						<div class="alert alert-success">
							{{session()->get('success')}}
                             </div>
							 @endif
					<!-- Account Logo -->
				<div class="account-logo">
						<a href="index.php"><img src="{{asset('imgg/cus1.jpeg')}}"></a>
					</div>
					<!-- /Account Logo -->
					
					<div class="account-box">
						<div class="account-wrapper">
							<h3 class="account-title"> Admin-Reset Password </h3>
							<p class="account-subtitle">Please Update your password here</p>
							
							<!-- Account Form -->

                      <form action= "{{route('admin.passresetprocess') }}" method="post">
                             @csrf
                                <div class="form-group">
									<div class="row">
										<div class="col">
											<label>Current Password</label>
										</div>
										 
									</div>
									<input type="hidden"  name="id"  value="{{ session('id') }}">
									<input class="form-control" maxlength="12" minlength="8" type="password" name="old_password" required>
								</div>

                                <div class="form-group">
									<div class="row">
										<div class="col">
											<label>New Password</label>
										</div>
										<input type="password" name="new_password" id="new-password" class="form-control" placeholder="Enter new password" minlength="8" maxlength="12" required>
                                      <small id="passwordHelp" class="form-text text-muted">Password must be at least 8 characters long and a maximum of 12 characters.</small>
										 
									</div>

					

			

                                <div class="form-group">
									<div class="row">
										<div class="col">
											<label>Confirm New Password</label>
										</div>
										 
									</div>
									<input class="form-control"  minlength="8" type="password" name="new_password_confirmation"required>
								</div>
								<div class="form-group text-center">
									<button class="btn btn-primary account-btn" type="submit">Reset</button>
								</div>
								
					

							</form>
							<!-- /Account Form -->
							
						</div>
					</div>
				</div>
			</div>
        </div>
	
		
			<!-- /Main Wrapper -->
		<!-- jQuery -->
        <script src="{{asset('js/jquery-3.2.1.min.js')}}"></script>
		
		<!-- Bootstrap Core JS -->
        <script src="{{asset('js/popper.min.js')}}"></script>
        <script src="{{asset('js/bootstrap.min.js')}}"></script>
		
		<!-- Custom JS -->
		<script src="{{asset('js/app.js')}}"></script>
    </body>

</html>