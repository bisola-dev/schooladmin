<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <meta name="description" content="Smarthr - Bootstrap Admin Template">
    <meta name="keywords" content="admin, estimates, bootstrap, business, corporate, creative, management, minimal, modern, accounts, invoice, html5, responsive, CRM, Projects">
    <meta name="author" content="Dreamguys - Bootstrap Admin Template">
    <meta name="robots" content="noindex, nofollow">
    <title>Upload test </title>
    
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
                            <h3 class="page-title">Upload test</h3>
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="dashboardapp.php">Dashboard</a></li>
                                <li class="breadcrumb-item active">Upload test</li>
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
                                <form method="POST" action="{{ route('admin.generatetestexcel') }}">
                                    @csrf
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
                                        <label>Select subject</label>
                                        <select name="subid" class="form-control" required>
                                        <option value="">Please select a subject</option>
                                            @foreach($subby as $subid)
                                                <option value="{{ $subid->id }}">{{ $subid->subjectname }}</option>
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

                 <button type="submit" class="btn btn-primary">Generate Test Sheet</button>
                                
                                </form>
                            </div>
                        </div>
                    </div>

                    <!-- Add Payment Singly Button -->
                         <div class="col-md-6">
                           <div class="card">
                           <div class="card-body">
                           <form method="POST" action="{{ route('admin.importtest') }}" enctype="multipart/form-data">
                           @csrf
                       <div class="form-group">
                         <label>Select CSV file</label>
                       <input type="file" name="file" class="form-control" required>                                    
                          
                        
                             </div>

                            <button type="submit" class="btn btn-success">Import test sheet</button>
                            </form> 
                            </div>
                                  
                             </div>

                            <div class="card">
                            <div class="card-body">
                                <button class="btn btn-primary" data-toggle="modal" data-target="#addStudentModal">Add Score Singly</button>
                            </div>
                        </div>
                    </div>
                  
                    </div>
                 </div>
                


               

                <!-- Add Student Modal -->
    <div class="modal fade" id="addStudentModal" tabindex="-1" role="dialog" aria-labelledby="addStudentModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addStudentModalLabel">Add Score Singly</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            
                <form method="POST" action="{{ route('admin.addtestscore') }}">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label>Select Class</label>
                            <select name="classid"  id="classid"class="form-control" required>
                            <option value="">Please select a class</option>
                                @foreach($classrm as $class)
                                    <option value="{{ $class->id }}">{{ $class->classname }}</option>
                                @endforeach
                            </select>
                        </div>


                                          <div class="form-group">
                                        <label>Select Session</label>
                                        <select name="sessid" id="sessid" class="form-control" required>
                                        <option value="">Please select a session</option>
                                            @foreach($seszion as $sess)
                                                <option value="{{ $sess->id }}">{{ $sess->restoredSessname }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                        <div class="form-group">
                    <label for="term">Select Term</label>
                    <select name="termid" id="termid" class="form-control form-control-sm">
                        <option value="">Please select a term</option>
                        <option value="1" {{ request('temid') == 1 ? 'selected' : '' }}>First term</option>
                        <option value="2" {{ request('temid') == 2 ? 'selected' : '' }}>Second term</option>
                        <option value="3" {{ request('temid') == 3 ? 'selected' : '' }}>Third term</option>
                    </select>
                </div>
        


                <div class="form-group">
                    <label for="subid">Select Subject Type</label>
                    <select name="subid" id="subid" class="form-control form-control-sm"required>
                        <option value="">Select Subject Type</option>
                        @foreach($subby as $type)
                            <option value="{{ $type->id }}" {{ request('subid') == $type->id ? 'selected' : '' }}>
                                {{ $type->subjectname }}
                            </option>
                        @endforeach
                    </select>
                </div>

                        
                                       <div class="form-group">
                                        <label>Fullname</label>
                                        <select name="studid" id="studid"  class="form-control form-control-sm">
                                        <option value="">Select Student</option>
                                            <!-- Options will be loaded dynamically -->
                                        </select>
                                    </div>

                        <div class="form-group">
                            <label>Score</label>
                            <input type="integer" name="testscore" class="form-control">
                        </div>
                       
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Add testscore</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>


                <!-- View Students -->
                <div class="card mt-4">
    <div class="card-body">
        <h4 class="card-title">View Results</h4>
        <form id="viewPaymentsForm" method="GET" action="{{ route('admin.viewtest') }}">
            <div class="form-row">
                <div class="form-group col-md-4">
                    <label for="classid">Select Class</label>
                    <select name="classid" id="classid" class="form-control form-control-sm" required>
                        <option value="">Select Class</option>
                        @foreach($classrm as $class)
                            <option value="{{ $class->id }}" {{ request('classid') == $class->id ? 'selected' : '' }}>
                                {{ $class->classname }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group col-md-4">
                    <label for="payid">Subject Type</label>
                    <select name="subid" id="subid" class="form-control form-control-sm">
                        <option value="">Select Subject Type</option>
                        @foreach($subby as $type)
                            <option value="{{ $type->id }}" {{ request('subid') == $type->id ? 'selected' : '' }}>
                                {{ $type->subjectname }}
                            </option>
                        @endforeach
                    </select>
                </div>
                                     <div class="form-group col-md-4">
                                     <label for="Session">Select Session</label>
                                        <select name="sessid" id="sessid" class="form-control form-control-sm" required>
                                        <option value="">Please select a session</option>
                                            @foreach($seszion as $sess)
                                                <option value="{{ $sess->id }}">{{ $sess->restoredSessname }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                <div class="form-group col-md-4">
                    <label for="term">Select Term</label>
                    <select name="termid" id="termid" class="form-control form-control-sm">
                        <option value="">Please select a term</option>
                        <option value="1" {{ request('termid') == 1 ? 'selected' : '' }}>First term</option>
                        <option value="2" {{ request('termid') == 2 ? 'selected' : '' }}>Second term</option>
                        <option value="3" {{ request('termid') == 3 ? 'selected' : '' }}>Third term</option>
                    </select>
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
        
        <div id="studentsTable" class="table-responsive mt-3">
            @if(request('classid') && $tezz->isEmpty())
                <p>No score available for the selected subject, session, or term.</p>
            @endif
        </div>
    </div>
</div>

    <!-- Scripts -->
     
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>


<script>
   document.getElementById('viewPaymentsForm').addEventListener('submit', function(event) {
    // Get the select elements
    var classid = document.getElementById('classid').value;
    var payid = document.getElementById('subid').value;
    var temid = document.getElementById('temid').value;
    var sessid = document.querySelector('select[name="sessid"]').value;




    // Initialize error message
    var errorMessage = '';

    // Check if any of the select boxes are empty
    if (!classid) {
        errorMessage += 'Please select a class.\n';
    }
    if (!subid) { 
        errorMessage += ''subject ID: ' + payid Please select a payment type.\n';
    }
    if (!termid) {
        errorMessage += 'Please select a term.\n';
    }

    if (!sessid) {
        errorMessage += 'Please select a session.\n';
    }
    // If there are errors, alert the user and prevent form submission
    if (errorMessage) {
        event.preventDefault();
        alert(errorMessage);
    }
});
</script>
    <script src="{{ asset('js/jquery-3.2.1.min.js') }}"></script>
    <script src="{{ asset('js/popper.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/jquery.slimscroll.min.js') }}"></script>
    <script src="{{ asset('js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('js/app.js') }}"></script>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$(document).ready(function() {
    function fetchStudents() {
        var classId = $('#classid').val();
        var sessId = $('#sessid').val(); // Make sure this ID matches your HTML
        var termId = $('#termid').val();

        $.ajax({
            url: "{{ route('admin.getstudents') }}",
            method: "GET",
            data: { classid: classId, sessid: sessId, termid: termId },
            success: function(response) {
                console.log('Response:', response); // Log response to debug
                var $studidSelect = $('#studid'); // Ensure this matches the ID in your HTML
                $studidSelect.empty(); // Clear existing options
                $studidSelect.append(response); // Append new options
            },
            error: function(xhr) {
                console.error('AJAX Error:', xhr.responseText); // Log AJAX errors
            }
        });
    }

    // Fetch students when any dropdown changes
    $('#classid, #sessid, #termidw').change(function() {
        fetchStudents();
    });

    // Initial fetch
    fetchStudents();
});
  </script>
</body>
</html>
