<!DOCTYPE html>
<html lang="en">
    
<head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
        <meta name="description" content="Smarthr - Bootstrap Admin Template">
		<meta name="keywords" content="admin, estimates, bootstrap, business, corporate, creative, management, minimal, modern, accounts, invoice, html5, responsive, CRM, Projects">
        <meta name="author" content="Dreamguys - Bootstrap Admin Template">
        <meta name="robots" content="noindex, nofollow">
        <title>Add students</title>
		    
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
		
		<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
		<!--[if lt IE 9]>
			<script src="assets/js/html5shiv.min.js"></script>
			<script src="assets/js/respond.min.js"></script>
		<![endif]-->
    </head>
    <body>
		
      <!-- Main Wrapper -->
      <div class="main-wrapper">
      <!-- Header -->
      @include('Adminlogin.hedad2')
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
			
				<!-- Page Content -->
                <div class="content container-fluid">
             	<!-- Page Header -->
				<div class="page-header">
						<div class="row">
							<div class="col-sm-12">
        
              @if($classrm->isNotEmpty())
               @foreach($classrm as $classrm)
                 @endforeach                       
                           
              <h3 class="page-title">
                Upload students singly for {{$classrm->classname}}</h3> 
								<ul class="breadcrumb">
                          
								  @endif  
               </ul>
									<li class="breadcrumb-item"> <a href='/addstudentpage/{{$classrm->id}}/{{$classrm->schoolid}}'> <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#customer2"><i class="fa fa-home"></i>click here to add single students </button></a></li>
									
								</ul>
							</div>
						</div>
					</div>
					<!-- Page Header -->
					<div class="page-header">
						<div class="row">
							<div class="col-sm-12">
								<h3 class="page-title">Upload students in bulk for {{$classrm->classname}}</h3>
								<ul class="breadcrumb">
									<li class="breadcrumb-item"><a href="dashboardapp.php">Dashboard</a></li>
									<li class="breadcrumb-item active">Leads</li>
								</ul>
							</div>
						</div>
					</div>
					<!-- /Page Header -->
   
					
					    <form class="col-sm-6" action="/import " method="POST" enctype="multipart/form-data">
           @csrf
                              <div class="form-group">
                    <label>Select CSV files of topics <a href="text.csv" download>
                              <i class="fa fa-list"></i> Download Sample CSV</a></label>
                    
                     <input type="file" name="file" id="file">
                                       </div>
                     <input type="text" name="classname"  value="{{$classrm->classname}}">
                     <input type="text" name="classid"  value="{{$classrm->id}}">
                     <input type="text" name="schoolid" value="{{$classrm->schoolid}}">  
                    <button type="submit" id="submit" name="Import" class="btn btn-success">
                         Import csv file now
                       </button>        
                  </form>
                  <td><form action="/export" method="POST" >
                                             @csrf
                                         <input type="text"  value="{{$classrm->id}}" name="classid">
                                         <input type="text" name="schoolid" value="{{$classrm->schoolid}}">  
                                         <button type="submit" id="submit" name="export" class="btn btn-success btn-sm">

                       </button> 
                                         <p><span  id="export" class="btn btn-success btn-sm" onclick ="exporttiyi (event.target);">Export</span> </p></td>
                                         </div>
                                         </div> 
</form>
                                      
                  
 
                
         
                
           
            </table>
                 <hr>
				<!-- /Page Content -->
        <div id="tableid">
       <div class="table-responsive">
                              <table id="dataTableExample1" class="table table-bordered table-striped table-hover">
                                 
                                    </tr>
                                 </thead>
                                 <tbody>
    
                                  
                                           <td class="text-right">
                                              <div class="dropdown dropdown-action">
                                                    <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-edit"></i></a>
                                                    <div class="dropdown-menu dropdown-menu-right">
                                                        <a class="dropdown-item upp" href="#" data-toggle="modal" data-target=""><i class="fa fa-pencil m-r-5"></i> Edit profile</a>


                                                        <a class="dropdown-item ria" href="#" data-toggle="modal" data-target=""><i class="fa fa-image m-r-5"></i> Replace passport</a>

                                                      </div>
                                                    </div>
                                                     
                                                </td>

                                        <td> <form method="post" action="">  
                              <input type="hidden" name="crease" value=""> 
                        <button type ="submit" name="delete" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to DELETE?');"><i class="fa fa-trash-o"></i></button>
              </form>    
            </td>
						</div>
					</div> 
            </tr>             
          </tbody>
                                 
       </table> 
     </div>
</div>

<input type="button" onclick="printDiv('tableid')" value="print data!"/>
            </div>
             </div>
            </div>

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
                           <form method="post" action="">

                    <div class="col-sm-6 col-md-12">
									<div class="form-group">
                      <input type="hidden" name="upid" id ="upid2" value="">
                    <input type="text" name="sname3" class="form-control" id ="sname2">
                    </div>
                  </div>


                   <div class="col-sm-6 col-md-12">
                    <div class="form-group">
                      <label>Othernames<span class="text-danger">*</span></label>
                <input class="form-control" type="text" name="onames3" id="onames2">
                        
                    </div>
                  </div>

                 <div class="col-sm-6 col-md-12">
                    <div class="form-group">
                      <label>Address<span class="text-danger">*</span></label>
                  <input class="form-control" type="text" name="addy3" id="addy2">
                       
                    </div>
                  </div>


                  <div class="col-sm-6 col-md-12">
                    <div class="form-group">
                      <label>Date of birth<span class="text-danger">* m/d/y format</span></label>
                         <input class="form-control" type="text"
                        name="dob3" id="dob2" >
                    </div>
                  </div>


                  <div class="col-sm-6 col-md-12">
                    <div class="form-group">
                      <label>Parent name <span class="text-danger">*</span></label>
                        <input type="text" name="parentname3" maxlength="60" class="form-control" id="parentname2" >
                    </div>
                  </div>


                  <div class="col-sm-6 col-md-12">
                    <div class="form-group">
                      <label>Parent Phone number <span class="text-danger">*</span></label>
                        <input type="tel" name="parentno3" maxlength="18" class="form-control" id="parentno2">
                    </div>
                  </div>
              
                   <div class="col-sm-6 col-md-12">
                    <div class="form-group">
                     <label>Parent Email address <span class="text-danger">*</span></label>
                        <input type="email" name="parentemail3" class="form-control" id="parentemail2">
                    </div>
                  </div>
                 
               <div class="col-sm-6 col-md-12">
                <div class="submit-section">
            <button type="submit" name="uppy" class="btn btn-primary submit-btn m-r-10">Update</button>
            </div>
            </form>
            </div>
        </div>
      </div>
    </div>
  </div>



 <div class="modal custom-modal fade" id="updatelogo" role="dialog">
                  <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                      <div class="modal-body">
                        <div class="form-header">
                        <form method="post" action="/uploadlogostud" enctype="multipart/form-data">  
                          <h3>Update Logo here</h3>
                      <div class="col-sm-6 col-md-12">
                      <div class="form-group"> 
              
                       <label>Select School logo (png, jpg or jpeg format allowed) <span class="text-danger">*</span></label>
                       
                         <input type="hidden" name="updd" value="" id ="updi">
                         
                         <input type="file" class="form-control" name="updd"  id="updd2">
                     </div>
                 </div>
                         <div class="submit-section">
                         <button type ="submit" name="datelogo" class="btn btn-success">update</button>
                           </div>
                     </form>
                    </div>
                </div>
                  <div class="col-sm-6 col-md-12">
          <div class="form-group">
                      <a href="javascript:void(0);" data-dismiss="modal" class="btn btn-danger cancel-sm">Cancel</a>
                    </div>
                  </div>

                                       
                </div>
              </div>
            </div>
          </div>
        </div>
        </div>
        <!-- <tr>
          <td>
            <button onclick="myFunction()">Print this page</button>
          </td>
        </tr> -->
   
  
                                    
          <hr>

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

    <script>
   function exporttiyi(_this) {
      let _url = $(_this).data('href');
      window.location.href = _url;
   }
</script>
		  <script src="{{asset('js/app.js')}}"></script>
        <script>
    $(document).ready(function(){
      $('.upp').on('click', function(){
        //$('#dataTableExample1 tbody').on('click', 'tr', function(){
        $('#checck').modal('show');
        $tr = $(this).closest('tr');
        var data = $tr.children('td').map(function(){
        return $(this).text();
        }).get();
        console.log(data);
        $('#upid2').val(data[0]);
        $('#sname2').val(data[2]);
        $('#onames2').val(data[3]);
        $('#dob2').val(data[4]);
        $('#addy2').val(data[5]);
        $('#parentname2').val(data[7]);
        $('#parentno2').val(data[8]);
        $('#parentemail2').val(data[9]);

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
        $('#updi').val(data[0]);
        // alert()
      
       
        });
    
    });

function printDiv(tableid) {
     var printContents = document.getElementById(tableid).innerHTML;
     var originalContents = document.body.innerHTML;

     document.body.innerHTML = printContents;

     window.print();

     document.body.innerHTML = originalContents;
}
        
      </script>
    </body>


</html>