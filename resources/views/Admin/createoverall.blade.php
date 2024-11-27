<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <meta name="description" content="Smarthr - Bootstrap Admin Template">
    <meta name="keywords" content="admin, estimates, bootstrap, business, corporate, creative, management, minimal, modern, accounts, invoice, html5, responsive, CRM, Projects">
    <meta name="author" content="Dreamguys - Bootstrap Admin Template">
    <meta name="robots" content="noindex, nofollow">
    <title>Upload Exam</title>

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
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css">
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
                            <h3 class="page-title">Create Overall Score per Class</h3>
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="dashboardapp.php">Dashboard</a></li>
                                <li class="breadcrumb-item active">Overall Score</li>
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
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body">
                                <form action="{{ route('admin.storeoverallscore') }}" method="POST">
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
                                        <select name="termid" id="termid" class="form-control" required>
                                            <option value="">Please select a term</option>
                                            <option value="1">First term</option>
                                            <option value="2">Second term</option>
                                            <option value="3">Third term</option>
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label for="scori">Input Overall Score</label>
                                        <input name="scori" type="number" class="form-control" placeholder="Enter overall score" required>
                                    </div>

                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary">Add Overall Score</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- View Students Section -->
                <div class="row">
                    <div class="col-md-12">
                        <div class="card mt-4">
                            <div class="card-body">
                                <h4 class="card-title">View  Class Overall Score </h4>
                                <form method="GET" action="{{ route('admin.viewscorebyclass') }}">
                                    <div class="form-group">
                                        <label>Select Class to View</label>
                                        <select name="classid" class="form-control" onchange="this.form.submit()">
                                            <option value="">Select Class</option>
                                            @foreach($classrm as $class)
                                            <option value="{{ $class->id }}" {{ request('classid') == $class->id ? 'selected' : '' }}>
                                                {{ $class->classname }}
                                            </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </form>
                                <div id="studentsTable" class="table-responsive mt-3">
                                    <!-- The table where student data will be displayed will be dynamically updated by JavaScript or backend logic -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /View Students -->
            </div>
        </div>
    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('js/main.js') }}"></script>
</body>

</html>
