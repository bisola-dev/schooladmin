<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <meta name="description" content="Smarthr - Bootstrap Admin Template">
    <meta name="keywords" content="admin, estimates, bootstrap, business, corporate, creative, management, minimal, modern, accounts, invoice, html5, responsive, CRM, Projects">
    <meta name="author" content="Dreamguys - Bootstrap Admin Template">
    <meta name="robots" content="noindex, nofollow">
    <title>Add Students</title>
    
    <!-- Favicon -->
    <link rel="shortcut icon" href="{{ asset('img/favicon.png') }}">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    
    <!-- Fontawesome CSS -->
    <link rel="stylesheet" href="{{ asset('css/font-awesome.min.css') }}">
    
    <!-- Lineawesome CSS -->
    <link rel="stylesheet" href="{{ asset('css/line-awesome.min.css') }}">
    
    <!-- Datatable CSS -->
    <link rel="stylesheet" href="{{ asset('css/dataTables.bootstrap4.min.css') }}">
    
    <!-- Main CSS -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
    <!-- Main Wrapper -->
    <div class="main-wrapper">
        <!-- Header -->
        @include('admin.hedad2')
        <!-- Sidebar -->
        @include('admin.siderd2')

        <!-- Page Wrapper -->
        <div class="page-wrapper">
            <div class="content container-fluid">
                <!-- Page Header -->
                <div class="page-header">
                    <div class="row">
                        <div class="col-sm-12">
                            <h3 class="page-title">Manage Students</h3>
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="dashboardapp.php">Dashboard</a></li>
                                <li class="breadcrumb-item active">Manage Students</li>
                            </ul>
                            @if(session('error'))
                            <div class="alert alert-danger">
                          {{ session('error') }}
                           </div>
                             @endif
                                @if($errors->any())
                                    <ul class="list-group">
                                        @foreach($errors->all() as $error)
                                            <div class="alert alert-danger">
                                                <li class="list-group-item">{{ $error }}</li>
                                            </div>
                                        @endforeach
                                    </ul>
                                @endif

                                @if(session()->has('success'))
                                    <div class="alert alert-success">
                                        {{ session()->get('success') }}
                                    </div>
                                @endif
                    </div>
                </div>
                <!-- /Page Header -->

                <!-- Forms Section -->
                <div class="row">
                    <!-- Bulk Upload Form -->
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-body">
                            
                              
                                <form method="POST" action="{{ route('admin.import') }}" enctype="multipart/form-data">
                                    @csrf

                                  <div class="form-group">
                                 <a href="{{ asset('addstud.xlsx') }}" download>
                                 <i class="fa fa-list"></i> Download Sample Excel
                                  </a>
                                 </div>

                                 <div class="form-group">
                                        <label>Select Class</label>        
                                        <select name="classid" class="form-control" required>
                                        <option value="">Please select a class </option>
                                           @foreach($classrm as $class)
                                            <option value="{{ $class->id }}">{{ $class->classname }}</option>
                                            @endforeach
                                        </select>
                                    </div>


                                    <div class="form-group">
                                        <label>Select Session</label>
                                        <select name="sessid" class="form-control" required>
                                        <option value="">Please select a session</option>
                                            @foreach($seszion as $sess)
                                            <option value="{{ $sess->id }}">{{ $sess->restoredSessname }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                          <div class="form-group">
                    <label for="term">Select Term</label>
                    <select name="temid" id="temid" class="form-control form-control-sm">
                        <option value="">Please select a term</option>
                        <option value="1" {{ request('temid') == 1 ? 'selected' : '' }}>First term</option>
                        <option value="2" {{ request('temid') == 2 ? 'selected' : '' }}>Second term</option>
                        <option value="3" {{ request('temid') == 3 ? 'selected' : '' }}>Third term</option>
                    </select>
                    </div>


                <div class="form-group">
              <label>Select Excel file</label>
              <input type="file" name="file" class="form-control" accept=".xlsx,.xls" required>
              </div>
            <button type="submit" class="btn btn-success">Import Excel</button>
              </form>
                            </div>
                        </div>
                    </div>

                    <!-- Add Student  Button -->
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <button class="btn btn-primary" data-toggle="modal" data-target="#addStudentModal">Add Student Singly</button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /Forms Section -->

                <!-- View Students -->
                <div class="card mt-2">
                    <div class="card-body">
                        <h4 class="card-title">View Students</h4>
                        <form method="GET" action="{{ route('admin.viewstudents') }}">
                        <div class="form-row">
                        <div class="form-group col-md-4">
                                <label>Select Class to View</label>
                                <select name="classid" class="form-control">
                                    <option value="">Select Class</option>
                                    @foreach($classrm as $class)
                                        <option value="{{ $class->id }}" {{ request('classid') == $class->id ? 'selected' : '' }}>
                                            {{ $class->classname }}
                                        </option>
                                    @endforeach
                                </select>
                                </div>
                            <div class="form-group col-md-4">
                                        <label>Select Session</label>
                                        <select name="sessid" class="form-control" >
                                        <option value="">Please select a session</option>
                                            @foreach($seszion as $sess)
                                                <option value="{{ $sess->id }}">{{ $sess->restoredSessname }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                        <div id="studentsTable" class="table-responsive mt-3">
                        @if(request('classid') && $students->isEmpty())
                         <p>No students available for the selected class.</p>
                         @elseif(!$students->isEmpty())
                        @include('admin.studentsTable', ['students' => $students])
                          @endif
                        </div>
                    </div>
                </div>
                <!-- /View Students -->
            </div>
        </div>
    </div>


    <!-- Modal for editing -->
    <div id="addStudentModal" class="modal custom-modal fade" role="dialog">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Add Student singly</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                    <form action="{{ route('admin.addstudentnew')}}" method="post">
                                            @csrf


                                    
                                     <div class="col-sm-6 col-md-12">
                                     <div class="form-group">
                                        <label>Select Class</label>        
                                        <select name="classid" class="form-control" required>
                                        <option value="">Please select a class </option>
                                           @foreach($classrm as $class)
                                            <option value="{{ $class->id }}">{{ $class->classname }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                            <div class="col-sm-6 col-md-12">
                                                <div class="form-group">
                                                <label>Surname</label>
                                                  <input type="form-control" name="sname" class="form-control" >
                                                </div>
                                            </div>
                                         
                                            <div class="col-sm-6 col-md-12">
                                                <div class="form-group">
                                                <label>Othernames</label>
                                                <input class="form-control"  type="text" name="onames">
                                              </div>
                                            </div>

                                            <div class="col-sm-6 col-md-12">
                                                <div class="form-group">
                                                <label>Address</label>
                                            <input class="form-control" type="text" name="addy" >

                                              </div>
                                            </div>


                                            <div class="col-sm-6 col-md-12">
                                                <div class="form-group">
                                                <label>Date of Birth (y/m/d format)</label>
                                            <input class="form-control" type="text" name="dob" id="dob">
                                        </div>
                                          </div>


                                            <div class="col-sm-6 col-md-12">
                                                <div class="form-group">
                                                <label>Parent Name</label>
                                               <input type="text" name="pname" maxlength="60" class="form-control">

                                            </div>
                                            </div>

                                            
                                            <div class="col-sm-6 col-md-12">
                                                <div class="form-group">
                                                <label>Parent Phone Number</label>
                                            <input type="tel" name="pno" maxlength="18" class="form-control" >
                                            </div>
                                            </div>

                                            <div class="col-sm-6 col-md-12">
                                                <div class="form-group">
                                                <label>Parent Email Address</label>
                                            <input type="email" name="pemal" class="form-control" >
                                        </div>
                                        </div>


                                        <div class="form-group">
                                        <label>Select Session</label>
                                        <select name="sessid"  id="sessid" class="form-control" required>
                                        <option value="">Please select a session</option>
                                            @foreach($seszion as $sess)
                                            <option value="{{ $sess->id }}">{{ $sess->restoredSessname }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                          <div class="form-group">
                    <label for="term">Select Term</label>
                    <select name="temid" id="temid" class="form-control form-control-sm">
                        <option value="">Please select a term</option>
                        <option value="1" {{ request('temid') == 1 ? 'selected' : '' }}>First term</option>
                        <option value="2" {{ request('temid') == 2 ? 'selected' : '' }}>Second term</option>
                        <option value="3" {{ request('temid') == 3 ? 'selected' : '' }}>Third term</option>
                    </select>
                    </div>

   

<div class="col-sm-6 col-md-12">
                                                <div class="submit-section">
                                                    <button type="submit" name="uppy" class="btn btn-primary submit-btn m-r-10">Add New student</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>

    <!-- Scripts -->
    <script src="{{ asset('js/jquery-3.2.1.min.js') }}"></script>
    <script src="{{ asset('js/popper.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/jquery.slimscroll.min.js') }}"></script>
    <script src="{{ asset('js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
