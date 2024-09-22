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
                            <h3 class="page-title">Select results</h3>
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="dashboardapp.php">Dashboard</a></li>
                                <li class="breadcrumb-item active">View report card</li>
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

               
               <!-- View Students -->
               <div class="card mt-4">
                    <div class="card-body">
                        <h4 class="card-title">View Report Card</h4>
                        <form id="viewPaymentsForm" method="GET" action="{{ route('admin.viewselresult') }}">
                            <div class="form-row">
                                <div class="form-group col-md-4">
                                    <label for="classid">Select Class</label>
                                    <select name="classid" id="modal-classid" class="form-control form-control-sm" required>
                                        <option value="">Select Class</option>
                                        @foreach($classrm as $class)
                                            <option value="{{ $class->id }}" {{ request('classid') == $class->id ? 'selected' : '' }}>
                                                {{ $class->classname }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                               
                                <div class="form-group col-md-4">
                                    <label for="sessid">Select Session</label>
                                    <select name="sessid" id="modal-sessid" class="form-control form-control-sm" required>
                                        <option value="">Please select a session</option>
                                        @foreach($seszion as $sess)
                                            <option value="{{ $sess->id }}">{{ $sess->restoredSessname }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                
                                <div class="form-group col-md-4">
                                        <label for="term">Select Term</label>
                                        <select name="termid" id="modal-termid" class="form-control form-control-sm">
                                            <option value="">Please select a term</option>
                                            <option value="1" {{ request('termid') == 1 ? 'selected' : '' }}>First term</option>
                                            <option value="2" {{ request('termid') == 2 ? 'selected' : '' }}>Second term</option>
                                            <option value="3" {{ request('termid') == 3 ? 'selected' : '' }}>Third term</option>
                                        </select>
                                    </div>

                                    
                                <div class="form-group col-md-4">
                                        <label>Fullname</label>
                                        <select name="studid" id="modal-studid"  class="form-control form-control-sm" required>
                                            <option value="">Select Student</option>
                                            <!-- Options will be loaded dynamically -->
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
            // Log the parameters to ensure they are being fetched
            console.log('Class ID:', $('#modal-classid').val());
            console.log('Subject ID:', $('#modal-subid').val());
            console.log('Session ID:', $('#modal-sessid').val());
            console.log('Term ID:', $('#modal-temid').val());

            $.ajax({
                url: '{{ route('admin.getstudents') }}',
                type: 'GET',
                data: {
                    classid: $('#modal-classid').val(),
                    subid: $('#modal-subid').val(),
                    sessid: $('#modal-sessid').val(),
                    termid: $('#modal-temid').val()
                },
                success: function(response) {
                    console.log('Response:', response); // Log response to debug
                    var $fullnameSelect = $('#modal-studid');
                    $fullnameSelect.empty();
                    $fullnameSelect.append(response); // Append the HTML options directly
                },
                error: function(xhr) {
                    console.error('AJAX Error:', xhr.responseText); // Log AJAX errors
                }
            });
        }

        // Fetch students when any dropdown changes
        $('#modal-classid, #modal-subid, #modal-sessid, #modal-termid').change(function() {
            fetchStudents();
        });

        // Initial fetch
        fetchStudents();
    });
</script>

    </body>
    </html>