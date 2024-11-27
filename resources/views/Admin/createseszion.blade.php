<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <meta name="description" content="Smarthr - Bootstrap Admin Template">
    <meta name="keywords" content="admin, estimates, bootstrap, business, corporate, creative, management, minimal, modern, accounts, invoice, html5, responsive, CRM, Projects">
    <meta name="author" content="Dreamguys - Bootstrap Admin Template">
    <meta name="robots" content="noindex, nofollow">
    <title>Create Session</title>

    <!-- Favicon -->
    <link rel="shortcut icon" href="{{ asset('img/favicon.png') }}">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">

    <!-- Fontawesome CSS -->
    <link rel="stylesheet" href="{{ asset('css/font-awesome.min.css') }}">

    <!-- Main CSS -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

    <!-- Lineawesome CSS -->
    <link rel="stylesheet" href="{{ asset('css/line-awesome.min.css') }}">

    <!-- Chart CSS -->
    <link rel="stylesheet" href="{{ asset('plugins/morris/morris.css') }}">

    <!-- Main CSS -->
    <link rel="stylesheet" href="{{ asset('css/style2.css') }}">

    <!-- Pagination CSS -->
    <link rel="stylesheet" href="{{ asset('css/pagination.css') }}">

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
        @include('admin.hedad2')
        
        <!-- Sidebar -->
        @include('admin.siderd2')
        
        <!-- Page Wrapper -->
        <div class="page-wrapper">
            <!-- Page Header -->
            <div class="page-header">
                <div class="row">
                    <div class="col-sm-12">
                        <h3 class="page-title">
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item active"></li>
                            </ul>
                        </h3>
                    </div>
                </div>
            </div>

            <!-- Page Content -->
            <div class="column-md-8">
                <div class="card-body">
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

                    <h3>Create session for {{ Session::get('schname') }}</h3>

                    <form method="post" action="{{ route('admin.createseszionprocess') }}">
                        @csrf
                        <div class="row">
                            <div class="col-sm-6 col-md-12">
                                <div class="form-group">
                                    <label>Session name <span class="text-danger"></span></label>
                                    <input name="sessname" type="text" maxlength="200" class="form-control" required>
                                </div>
                            </div>
                        </div>
                        <div class="submit-section">
                            <button type="submit" name="submit" class="btn btn-info submit-btn">Submit session</button>
                        </div>
                    </form>


                    <?php $counter = ($seszion->currentPage() - 1) * $seszion->perPage() + 1;?>
                    <div class="table-responsive">
                        <table id="dataTableExample1" class="table table-bordered table-striped table-hover">
                            <thead>
                                <tr class="info">
                                    <th>S/N</th>
                                    <th>Session</th>
                                    <th>Edit</th>
                                    <th>Delete</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if($seszion->isNotEmpty())
                                    @foreach($seszion as $data)
                                        <tr>
                                            <td>{{ $counter++}}</td>
                                          
                                            <td>{{ $data->restoredSessname  }}</td>
                                            <td class="text-right">
                                                <div class="dropdown dropdown-action">
                                                    <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                                        <i class="material-icons">more_vert</i>
                                                    </a>
                                                    <div class="dropdown-menu dropdown-menu-right">
                                                        <a class="dropdown-item upp" href="#" data-toggle="modal" data-target=""><i class="fa fa-pencil m-r-5"></i> Edit</a>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <form action="{{ route('admin.deleteseszion', ['id' => $data->id]) }}" method='GET'>
                                                    @csrf
                                                    @method('DELETE')
                                                    <input type="hidden" value="{{ $data->id }}" name="id">
                                                    <button type="submit" class="btn btn-danger">Delete</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                @else
                                    <tr>
                                        <td colspan="4">No created class yet</td>
                                    </tr>
                                @endif
                            </tbody>
                        </table>
                        <!-- Pagination Links -->
                        {{ $seszion->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal for Editing -->
    <div id="checck" class="modal custom-modal fade" role="dialog">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit Class</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('admin.createseszionedit', ['id' => $data->id]) }}" method="POST">
                        @csrf
                        <input type="hidden" name="id" id="sessid2" value="{{ $data->id }}">
                        <div class="form-group">
                            <label>Class name<span class="text-danger">*</span></label>
                            <input class="form-control" type="text" name="sessname" id="clak2" value="{{ $data->sessname }}">
                        </div>
                        <div class="submit-section">
                            <button type="submit" name="uppy" class="btn btn-primary submit-btn m-r-10">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

                 
    <!-- Scripts -->
    <script src="{{ asset('js/jquery-3.2.1.min.js') }}"></script>
    <script src="{{ asset('js/popper.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/jquery.slimscroll.min.js') }}"></script>
    <script src="{{ asset('plugins/morris/morris.min.js') }}"></script>
    <script src="{{ asset('plugins/raphael/raphael.min.js') }}"></script>
    <script src="{{ asset('js/app.js') }}"></script>
    <script>
        $(document).ready(function(){
            $('.upp').on('click', function(){
                $('#checck').modal('show');
                $tr = $(this).closest('tr');
                var data = $tr.children('td').map(function(){
                    return $(this).text();
                }).get();
                $('#sessid2').val(data[2]);
                $('#clak2').val(data[1]);
            });
        });


        $(document).ready(function() {
    $('#dataTableExample1').DataTable({
        responsive: true,
       "paging": true, // Disable pagination for balance table
            "searching": true, // Disable searching for balance table
            "info": true// Disable table info for balance table // Sort by the second column (index 1) in ascending order
    });
});
    </script>
</body>
</html>
