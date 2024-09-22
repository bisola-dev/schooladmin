<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <meta name="description" content="Smarthr - Bootstrap Admin Template">
    <meta name="keywords" content="admin, estimates, bootstrap, business, corporate, creative, management, minimal, modern, accounts, invoice, html5, responsive, CRM, Projects">
    <meta name="author" content="Dreamguys - Bootstrap Admin Template">
    <meta name="robots" content="noindex, nofollow">
    <title>Upload exam </title>
    
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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>



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
                            <h3 class="page-title">Upload exam</h3>
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="dashboardapp.php">Dashboard</a></li>
                                <li class="breadcrumb-item active">Upload exam</li>
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
                    
                </div>
                <!-- /Page Header -->

                <!-- Forms Section -->
                <div class="row">
                    <!-- Bulk Upload Form -->
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <form action="{{ route('admin.generateexamexcel') }}" method="POST">
                                    @csrf
                                    <div class="form-group">
                                   
                                        <label>Select Class</label>
                                        <select name="classid" id="classid" class="form-control" required>
                                            <option value="">Please select a class</option>
                                            @foreach($classrm as $class)
                                                <option value="{{ $class->id }}">{{ $class->classname }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Select Subject</label>
                                        <select name="subid" id="subid" class="form-control" required>
                                            <option value="">Please select a subject</option>
                                            @foreach($subby as $subid)
                                                <option value="{{ $subid->id }}">{{ $subid->subjectname }}</option>
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
                                        <select name="temid" id="temid" class="form-control form-control-sm">
                                            <option value="">Please select a term</option>
                                            <option value="1">First term</option>
                                            <option value="2">Second term</option>
                                            <option value="3">Third term</option>
                                        </select>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Generate ExamSheet</button>
                                </form>

                                <!-- CSV Download Link -->
                               
                            </div>
                        </div>
                    </div>

                    <!-- Add Score Singly Button -->
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-body">
                            <div class="form-group mt-3">
                            <form method="POST" action="{{ route('admin.importexam') }}" enctype="multipart/form-data">
                            @csrf
                                    <label>Select CSV file</label>
                                    <input type="file" name="file" class="form-control" required>
                                      </div>
                                      <button type="submit" class="btn btn-success">Import Examsheet</button>
                               
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
                <!-- /Forms Section -->

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
                            <form method="POST" action="{{ route('admin.addexamscore') }}">
                                @csrf
                                <div class="modal-body">
                                    <div class="form-group">
                                        <label>Select Class</label>
                                        <select name="classid" id="modal-classid" class="form-control" required>
                                            <option value="">Select a class</option>
                                            @foreach($classrm as $class)
                                                <option value="{{ $class->id }}">{{ $class->classname }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label for="payid">Select Subject Type</label>
                                        <select name="subid" id="modal-subid" class="form-control form-control-sm" required>
                                            <option value="">Select Subject Type</option>
                                            @foreach($subby as $type)
                                                <option value="{{ $type->id }}" {{ request('subid') == $type->id ? 'selected' : '' }}>
                                                    {{ $type->subjectname }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label>Select Session</label>
                                        <select name="sessid" id="modal-sessid" class="form-control" required>
                                            <option value="">Please select a session</option>
                                            @foreach($seszion as $sess)
                                                <option value="{{ $sess->id }}">{{ $sess->restoredSessname }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label for="term">Select Term</label>
                                        <select name="temid" id="modal-temid" class="form-control form-control-sm">
                                            <option value="">Please select a term</option>
                                            <option value="1" {{ request('temid') == 1 ? 'selected' : '' }}>First term</option>
                                            <option value="2" {{ request('temid') == 2 ? 'selected' : '' }}>Second term</option>
                                            <option value="3" {{ request('temid') == 3 ? 'selected' : '' }}>Third term</option>
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label>Fullname</label>
                                        <select name="studid" id="modal-studid" class="form-control" required>
                                            <option value="">Select Student</option>
                                            <!-- Options will be loaded dynamically -->
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label>Score</label>
                                        <input type="number" name="examscore" class="form-control" required>
                                    </div>

                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary">Add exam score</button>
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
                        <form id="viewPaymentsForm" method="GET" action="{{ route('admin.viewexam') }}">
                            <div class="form-row">
                                <div class="form-group col-md-4">
                                    <label for="classid">Select Class</label>
                                    <select name="classid" id="view-classid" class="form-control form-control-sm" required>
                                        <option value="">Select Class</option>
                                        @foreach($classrm as $class)
                                            <option value="{{ $class->id }}" {{ request('classid') == $class->id ? 'selected' : '' }}>
                                                {{ $class->classname }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="subid">Subject Type</label>
                                    <select name="subid" id="view-subid" class="form-control form-control-sm">
                                        <option value="">Select Subject Type</option>
                                        @foreach($subby as $type)
                                            <option value="{{ $type->id }}" {{ request('subid') == $type->id ? 'selected' : '' }}>
                                                {{ $type->subjectname }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="sessid">Select Session</label>
                                    <select name="sessid" id="view-sessid" class="form-control form-control-sm" required>
                                        <option value="">Please select a session</option>
                                        @foreach($seszion as $sess)
                                            <option value="{{ $sess->id }}">{{ $sess->restoredSessname }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group col-md-4">
                                    <label for="term">Select Term</label>
                                    <select name="termid" id="view-termid" class="form-control form-control-sm">
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
            </div>
        </div>
    </div>

    <!-- Scripts -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="{{ asset('js/jquery-3.2.1.min.js') }}"></script>
    <script src="{{ asset('js/popper.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/jquery.slimscroll.min.js') }}"></script>
    <script src="{{ asset('js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('js/app.js') }}"></script>

    <script>
        $(document).ready(function() {
            function fetchStudents() {
                $.ajax({
                    url: '{{ route('admin.getstudents') }}',
                    type: 'GET',
                    data: {
                        classid: $('#modal-classid').val(),
                        subid: $('#modal-subid').val(),
                        sessid: $('#modal-sessid').val(),
                        temid: $('#modal-temid').val()
                    },
                    success: function(response) {
                var $fullnameSelect = $('#modal-studid');
                $fullnameSelect.empty();
                $fullnameSelect.append(response); // Append the HTML options directly
            }
                });
            }

            // Fetch students when any dropdown changes
            $('#modal-classid, #modal-subid, #modal-sessid, #modal-temid').change(function() {
                fetchStudents();
            });

            // Initial fetch
            fetchStudents();

            // Handle the CSV download link
            $('#classid, #subid, #sessid, #temid').change(function() {
                var classid = $('#classid').val();
                var subid = $('#subid').val();
                var sessid = $('#sessid').val();
                var temid = $('#temid').val();
                var url = `{{ route('admin.generateCsv') }}?classid=${classid}&subid=${subid}&sessid=${sessid}&temid=${temid}`;
                $('#download-csv-link').attr('href', url);
            });
        });
    </script>
</body>
</html>
