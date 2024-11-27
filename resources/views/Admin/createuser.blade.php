
<!DOCTYPE html>
<html lang="en">
    
<head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
        <meta name="description" content="Smarthr - Bootstrap Admin Template">
    <meta name="keywords" content="admin, estimates, bootstrap, business, corporate, creative, management, minimal, modern, accounts, invoice, html5, responsive, CRM, Projects">
        <meta name="author" content="Dreamguys - Bootstrap Admin Template">
        <meta name="robots" content="noindex, nofollow">
        <title>Create Account </title>
    
    <!-- Favicon -->
        <link rel="shortcut icon" href="{{asset('img/favicon.png')}}">
        
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
        
        <!-- Fontawesome CSS -->
        <link rel="stylesheet" href="{{asset('css/font-awesome.min.css')}}">
        
        <!-- Main CSS -->
        <link rel="stylesheet" href="{{asset('css/style.css')}}">
        
    <!-- Lineawesome CSS -->
        <link rel="stylesheet" href="{{asset('css/line-awesome.min.css')}}">
    <!-- Select2 CSS -->
    <link rel="stylesheet" href="{{asset('css/select2.min.css')}}">
    
    <!-- Datetimepicker CSS -->
    <link rel="stylesheet" href="{{asset('css/bootstrap-datetimepicker.min.css')}}">
    
    <!-- Main CSS -->
        <link rel="stylesheet" href="{{asset('css/style.css')}}">

        <script type="text/javascript" src="jquery.js"></script>
    
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="assets/js/html5shiv.min.js"></script>
      <script src="assets/js/respond.min.js"></script>
    <![endif]-->
    </head>
    <body>
    <!-- Main Wrapper -->
        <div class="main-wrapper">

      @include('admin.hedad3')
      <!-- /Header -->
      
      <!-- Sidebar -->
          @include('admin.siderd2')
      
      <!-- Page Wrapper -->
            <div class="page-wrapper">

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

       
        <!-- Page Content -->
                <div class="content container-fluid">
        
          <!-- Page Header -->
          <div class="page-header">
            <div class="row">
              <div class="col-sm-12">
                <h3 class="page-title">Create School Account
                
                <ul class="breadcrumb">
                   
                  <li class="breadcrumb-item active"></li>
                </ul>
              </div>
            </div>
          </div>
          <!-- /Page Header -->
       
              <form action= "{{route('admin.createschprocess') }}" method="post">
              @csrf
                 
              <div class="col-md-12">
               
                <div class="row">
                  <div class="col-sm-6 col-md-12">
                    <div class="form-group">
                      <label>School name<span class="text-danger"></span></label>
                        <input name="schname" type="text" maxlength="200"  class="form-control" required>
                    </div>
                  </div>

                  <div class="col-sm-6 col-md-12">
                    <div class="form-group">
                      <label>Address <span class="text-danger"></span></label>
                        <input type="text" name="addy" maxlength="50"  class="form-control" required>
                    </div>
                  </div>

                  <div class="col-sm-6 col-md-12">
                    <div class="form-group">
                      <label>Fullname <span class="text-danger"></span></label>
                        <input type="text" name="fulln" maxlength="50"  class="form-control" required>
                    </div>
                  </div>

                  <div class="col-sm-6 col-md-12">
                    <div class="form-group">
                      <label>Admin email <span class="text-danger"></span></label>
                        <input type="text" name="admail" maxlength="50"  class="form-control" required>
                    </div>
                  </div>

                  <div class="col-sm-6 col-md-12">
                    <div class="form-group">
                      <label>phone number <span class="text-danger"></span></label>
                        <input type="text" name="fon" maxlength="14"  class="form-control" required>
                    </div>
                  </div>

            
                  <div class="submit-section">
                  <button  name="submit" class="btn btn-info submit-btn">Upload now</button>
                  </div>
                  </form>

            </div>
          </div>
                  
                
              </div>        
            </div>
                    </div>
                        </div>
                    </div>
                </div>
                <!-- /Add Role Modal -->         
                </div>
            </div>

           