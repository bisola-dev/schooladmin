<!DOCTYPE html>
<html lang="en">
    
<head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
        <meta name="description" content="Smarthr - Bootstrap Admin Template">
		<meta name="keywords" content="admin, estimates, bootstrap, business, corporate, creative, management, minimal, modern, accounts, invoice, html5, responsive, CRM, Projects">
        <meta name="author" content="Dreamguys - Bootstrap Admin Template">
        <meta name="robots" content="noindex, nofollow">
        <title>Upload School Logo</title>
        <!-- Favicon -->
            <link rel="shortcut icon" href="{{asset('img/favicon.png')}}">
			<!-- Bootstrap CSS -->
      <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
		
		<!-- Fontawesome CSS -->
        <link rel="stylesheet" href="{{asset('css/font-awesome.min.css')}}">
		
		<!-- Lineawesome CSS -->
        <link rel="stylesheet" href="{{asset('css/line-awesome.min.css')}}">
		
		<!-- Datatable CSS -->
		<link rel="stylesheet" href="{{asset('css/dataTables.bootstrap4.min.css')}}">
		
		<!-- Main CSS -->
        <link rel="stylesheet" href="{{asset('css/style.css')}}">

		
		<!-- Select2 CSS -->
		<link rel="stylesheet" href="{{asset('css/select2.min.css')}}">
		
		<!-- Datetimepicker CSS -->
		<link rel="stylesheet" href="{{asset('css/bootstrap-datetimepicker.min.css')}}">
		
		<!-- Main CSS -->
        <link rel="stylesheet" href="{{asset('css/style.css')}}">
        <link rel="stylesheet" href="{{asset('css/style.css')}}">
		
		<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
		<!--[if lt IE 9]>
			<script src="assets/js/html5shiv.min.js"></script>
			<script src="assets/js/respond.min.js"></script>
		<![endif]-->
    </head>
    <body>
		<!-- Main Wrapper -->
        <div class="main-wrapper">

		@include('adminlogin.hedad2')
      <!-- Sidebar -->
       @include('classrm.siderd')
			<!-- Page Wrapper -->
            <div class="page-wrapper">
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
			
				<!-- Page Content -->
                <div class="content container-fluid">
				
				<div class="page-header">
						<div class="row">
							<div class="col-sm-12">

                            @if($Adminlogin->isNotEmpty())
                           @foreach($Adminlogin as $data)
                            @endforeach   
							      
							<h3 class="page-title">Upload or replace logo {{$data->schname}} . </h3>
						    @endif 
   
						 <div class="col-md-4 col-sm-6 col-12 col-lg-4 col-xl-3">
							<div class="profile-widget"> 
								<div class="profile-img">
							
								<td><img src="/storage/Adminlogin/{{($data->logo)}}" width="100px", height="100px"></td>
								</div>
								</div>
						 
								 
							</div>
						</div>

							 </div>

							<div class="col-auto float-right ml-auto">
								 
								<a href="#" class="btn btn-info" data-toggle="modal" data-target="#upp"><i class="fa fa-user"></i> Upload logo</a>
								 
							 
							</div>


						</div>
					</div>
					<!-- /Page Header -->
	 

					<!-- Add Role Modal -->
				<div id="upp" class="modal custom-modal fade" role="dialog">
					<div class="modal-dialog modal-dialog-centered" role="document">
						<div class="modal-content">
							<div class="modal-header">  
								<h5 class="modal-title">Upload or replace  logo  for {{$data->schname}} 
                        </h5>
								<button type="button" class="close" data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
							</div>
							
                           
							<div class="modal-body">
							<form method="post" action='/uploadlogoadmin/{id}', enctype="multipart/form-data">
								@csrf	
							<div class="form-group">
							<label>Select School logo (png, jpg or jpeg format allowed) <span class="text-danger">*</span></label>
                       <div id="newphoto"></div>
                    
          <input type="text"  name="id"   id ="adminid5" value="{{$data->id}}">


                <input type="file" class="form-control" name="logo"  id="newphoto" value="{{$data->logo}}">
                 </div>
                 </div>
                         <div class="submit-section">
                         <button type ="submit" class="btn btn-success">updatelogo</button>
                           </div>
                    

                  <div class="col-sm-6 col-md-12">
          <div class="form-group">
                      <a href="javascript:void(0);" data-dismiss="modal" class="btn btn-danger cancel-sm">Cancel</a>
                    </div>
                  </div>
                </form>                                      
                </div>
              </div>
            </div>
          </div>
        </div>
				</div>
				<!-- /Add Role Modal -->

			 
				 
				</div>
				<!-- /Page Content -->
				
            </div>
			<!-- /Page Wrapper -->
			
        </div>
		<!-- /Main Wrapper -->
			<!-- jQuery -->
   
			<script src="{{asset('js/jquery-3.2.1.min.js')}}"></script>

<!-- Bootstrap Core JS -->
<script src="{{asset('js/popper.min.js')}}"></script>
<script src="{{asset('js/bootstrap.min.js')}}"></script>

<!-- Slimscroll JS -->
<script src="{{asset('js/jquery.slimscroll.min.js')}}"></script>

<!-- Datatable JS -->
<script src="{{asset('js/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('js/dataTables.bootstrap4.min.js')}}"></script>

<!-- Custom JS -->
  <script src="{{asset('js/app.js')}}"></script>
		
		
		<!-- Select2 CSS -->
		<link rel="stylesheet" href="{{asset('css/select2.min.css')}}">
		
		<!-- Datetimepicker JS -->
		<script src="{{asset('js/moment.min.js')}}"></script>
		<script src="{{asset('js/bootstrap-datetimepicker.min.js')}}"></script>
	
    </body>

</html>