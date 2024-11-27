
<!DOCTYPE html>
<html lang="en">
    
<head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
        <meta name="description" content="Smarthr - Bootstrap Admin Template">
		<meta name="keywords" content="admin, estimates, bootstrap, business, corporate, creative, management, minimal, modern, accounts, invoice, html5, responsive, CRM, Projects">
        <meta name="author" content="Dreamguys - Bootstrap Admin Template">
        <meta name="robots" content="noindex, nofollow">
        <title>view school Account </title>
		
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

		  @include('Admin.hedad3')
      <!-- /Header -->
      
      <!-- Sidebar -->
              @include('Admin.siderd2')
			
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

			       
		                  
                    <div class="row">
                        <div class="col-md-12">
                            <div class="table-responsive">
                                <table class="table table-striped custom-table mb-0 datatable">

                                       <thead>
                                        <tr>
                                         <th>S/N</th>
                                       <th>School Name</th>
                                       <th>Address</th>
                                       <th>Full name</th>
                                       <th>Admin mail</th>
                                       <th>Phone number</th>
                                        <th>Image</th>
                                       <th>Edit</th>
                                 
                                        </tr>
                                    </thead>
                                    <tbody>

                                    @if($Admin->isNotEmpty())
                                    @php
                                    $counter = 1; // Initialize the counter
                                     @endphp
                                    @foreach ($Admin as $data)
                                    <tr>
                                      <td>{{ $counter++ }}</td>
                                      <td id="data-id">{{ $data->id }}</td>
                                       <td>{{$data->schname}}</td>
                                       <td>{{$data->addy}}</td>
                                       <td>{{$data->fulln}}</td >
                                       <td>{{$data->admail}}</td>
                                       <td>{{$data->fon}}</td>
                                       <td><img src="/storage/Admin/{{($data->logo)}}" width="100px", height="100px"></td>
                                    
                                           <td class="text-right">
                                           <div class="dropdown dropdown-action">
                                                    <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
                                                    <div class="dropdown-menu dropdown-menu-right">

                                                        <a class="dropdown-item upp" href=""  data-toggle="modal" data-target=""><i class="fa fa-pencil m-r-5"></i> Edit</a>
                                                        <!--<a class="dropdown-item" href="#" data-toggle="modal" data-target="#delete_asset"><i class="fa fa-trash-o m-r-5"></i> Delete</a>-->
                                                       
                                                        <a class="dropdown-item ria" href="#" data-toggle="modal" data-target=""><i class="fa fa-pencil m-r-5"></i> Update logo</a>

                                                    </div>
                                                     </div>
                      
                           
                                                   
                                                </div>
                                            </td>
                                        </tr>
                                        @endforeach
                                        @else
                                        
    
                                    <p>No posts found</p>
                                       @endif  
                                     
                                    </tbody>
                                </table>
                                
                            </div>
                        </div>
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
            <!-- /Page Wrapper  -->
            <div id="checck" class="modal custom-modal fade" role="dialog">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Edit </h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>

                    <div class="modal-body">                             
                  <form action= "{{ route('admin.editschool', ['id' => $data->id]) }}"  method="post">
                    @csrf    
                      <div class="col-sm-6 col-md-12">
                  <div class="form-group">
                <label>School name  </label> 
          <input type="hidden"  name="id"   id ="adminid4" value="{{$data->id}}">
           <input type="text" name="schoolname"  maxlength="200" class="form-control"  value="{{$data->schname}}" id="schn2">               
                   </div>  
                  </div>

                     <div class="col-sm-6 col-md-12">
                    <div class="form-group">
                    <label>Address <span class="text-danger"></span></label>
                    <input type="text" name="address" maxlength="50" value="{{$data->addy}}" class="form-control" id="addy2">
                    </div>
                  </div>

                  <div class="col-sm-6 col-md-12">
                  <div class="form-group">
                  <label>Fullname <span class="text-danger"></span></label>
                  <input type="text" name= "fullname" maxlength="50"  class="form-control" value="{{$data->fulln}}" id="fulln2">
                      </div>
                  </div>

                  <div class="col-sm-6 col-md-12">
                    <div class="form-group">
                  <label>Admin email <span class="text-danger"></span></label>
                <input type="text" name="adminmail" maxlength="50"  class="form-control" value="{{$data->admail}}"  id="admail2">
                    </div>
                  </div>


                  <div class="col-sm-6 col-md-12">
                    <div class="form-group">
                  <label>phone number <span class="text-danger"></span></label>
                  <input type="text" name="phone" maxlength="50"  class="form-control" value="{{$data->fon}}"  id="fon2">
                    </div>
                  </div>

                                    <div class="submit-section">
                                        <button  type="submit"  class="btn btn-info submit-btn">Update</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>   

                <div class="modal custom-modal fade" id="updatelogo" role="dialog">
                  <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                      <div class="modal-body">
                        <div class="form-header">
                        <form action= "{{ route('admin.uploadlogosch', ['id' => $data->id]) }}" method="post" enctype="multipart/form-data">
                         @csrf
                    <h3>Update Logo here</h3>
                    <div class="col-sm-6 col-md-12">
                  <div class="form-group"> 
              
                <label>Select School logo (png, jpg or jpeg format allowed) <span class="text-danger">*</span></label>
                       <div id="newphoto"></div>
                    
          <input type="hidden"  name="id"   id ="adminid5" value="{{$data->id}}">


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
 
        <!-- /Main Wrapper -->
        <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
        <!-- jQuery -->
        <script src="{{asset('js/jquery-3.2.1.min.js')}}"></script>
        
        <!-- Bootstrap Core JS -->

        <script src="{{asset('js/popper.min.js')}}"></script>
        <script src="{{asset('js/bootstrap.min.js')}}"></script>
        
        <!-- Slimscroll JS -->
        <script src="{{asset('js/jquery.slimscroll.min.js')}}"></script>
        
        <!-- Select2 JS -->
        <script src="{{asset('js/select2.min.js')}}"></script>
        
        <!-- Datetimepicker JS -->
        <script src="{{asset('js/moment.min.js')}}"></script>
        <script src="{{asset('js/bootstrap-datetimepicker.min.js')}}"></script>
        
        <!-- Custom JS -->
        <script src="{{asset('js/app.js')}}"></script>
        <script>

document.getElementById('data-id').style.display = 'none';

    $(document).ready(function(){
      $('.upp').on('click', function(){
        //$('#dataTableExample1 tbody').on('click', 'tr', function(){
        $('#checck').modal('show');
        $tr = $(this).closest('tr');
        var data = $tr.children('td').map(function(){
        return $(this).text();
        }).get();
        console.log(data);
        //$('#adminid2').val(data[0]);
        $('#schn2').val(data[2]);
        $('#addy2').val(data[3]);
        $('#adminid4').val(data[1]);
        $('#fulln2').val(data[4]);
        $('#admail2').val(data[5]);
        $('#fon2').val(data[6]);
        $('#foto2').val(data[7]);
       
        });
    
    });
    $(document).ready(function(){
      $('.ria').on('click', function(){
        //$('#dataTableExample1 tbody').on('click', 'tr', function(){
        $('#updatelogo').modal('show');
        $tr = $(this).closest('tr');
        var data = $tr.children('td').map(function(){
        return $(this).text();
        }).get();
        console.log(data);
        //$('#adminid2').val(data[0]);
        $('#adminid5').val(data[1]);
        // alert()
         $('#newphoto').html(data[7]);
      
       
        });
    
    });
  </script>
    </body>


    