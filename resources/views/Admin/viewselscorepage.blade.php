<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <meta name="description" content="Smarthr - Bootstrap Admin Template">
    <meta name="keywords" content="admin, estimates, bootstrap, business, corporate, creative, management, minimal, modern, accounts, invoice, html5, responsive, CRM, Projects">
    <meta name="author" content="Dreamguys - Bootstrap Admin Template">
    <meta name="robots" content="noindex, nofollow">
    <title>View Scores by Class</title>
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
</head>
<body>
    <!-- Main Wrapper -->
    <div class="main-wrapper">
        @include('admin.hedad2')
        <!-- Sidebar -->
        @include('admin.siderd2')
        <!-- Page Wrapper -->
        <div class="page-wrapper">
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

                    <div class="content container-fluid">
                        <div class="summary">
                            <span><strong>Class Name:</strong> {{ $classrm->classname ?? 'Not Available' }}</span>
                        </div>

                        <div class="table-responsive">
                            <table id="dataTableExample1" class="table table-bordered table-striped table-hover">
                                <thead>
                                    <tr class="info">
                                        <th class="d-none"></th>
                                        <th>S/N</th>
                                        <th>Class</th>
                                        <th>Session</th>
                                        <th>Term</th>
                                        <th>Overall Score</th>       
                                        <th>Edit</th>
                                        <th>Delete</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($ova as $item)
                                    <tr>
                                        <td class="d-none">{{ $item->id }}</td>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->classrm->classname ?? 'Not Available' }}</td>
                                        <td>{{ $item->seszion->restoredSessname ?? 'Not Available' }}</td>
                                        <td>
                                            @switch($item->termid)
                                                @case(1) First Term @break
                                                @case(2) Second Term @break
                                                @case(3) Third Term @break
                                                @default Not Available
                                            @endswitch
                                        </td>
                                        <td>{{ $item->scori ?? 'Not Available' }}</td>
                                        <td class="text-right">
                                            <div class="dropdown dropdown-action">
                                                <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-edit"></i></a>
                                                <div class="dropdown-menu dropdown-menu-right">

                                                <a class="dropdown-item upp" href="#" data-toggle="modal" data-target="#editModal"
                                                   
                                                       data-id="{{ $item->id }}" 
                                                       data-class="{{ $item->classid }}" 
                                                       data-session="{{ $item->seszion->id }}" 
                                                       data-term="{{ $item->termid }}" 
                                                       data-score="{{ $item->scori }}">
                                                       <i class="fa fa-pencil m-r-5"></i> Edit details
                                                    </a>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <form method='POST' action="{{ route('admin.deleteoverallscore', ['id' => $item->id]) }}">
                                                @method('DELETE')
                                                @csrf
                                                <button type="submit" name="delete" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to DELETE?');"><i class="fa fa-trash-o"></i></button>
                                            </form>
                                        </td>
                                    </tr>
                                    @empty
                                    <tr>
                                        <td colspan="8" class="text-center">No records found</td>
                                    </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <!-- Edit Modal -->
                    <div id="editModal" class="modal custom-modal fade" role="dialog">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Edit Details</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                <form id="editForm" action="{{ route('admin.editoverallscore') }}" method='POST'>
                    @csrf
                    @method('PUT')
                    <input type="hidden" name="id" id="editId">

                    <div class="form-group">
                        <label for="editClassid">Class</label>
                        <select name="classid" id="editClassid" class="form-control" required>
                            @foreach($classes as $class)
                                <option value="{{ $class->id }}">{{ $class->classname }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="editSession">Session</label>
                        <select name="sessid" id="editSession" class="form-control" required>
                            @foreach($sessions as $session)
                                <option value="{{ $session->id }}">{{ $session->restoredSessname }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="editTermid">Term</label>
                        <select name="termid" id="editTermid" class="form-control" required>
                            <option value="1">First Term</option>
                            <option value="2">Second Term</option>
                            <option value="3">Third Term</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="editScori">Overall Score</label>
                        <input name="scori" id="editScori" type="number" class="form-control" placeholder="Enter overall score" required>
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

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
        $(document).ready(function() {
            $('#dataTableExample1').DataTable({
                dom: "Blfrtip",
                columnDefs: [{
                    orderable: false,
                    targets: -1
                }],
                paging: true,
                searching: true,
                ordering: true
            });

        $('.upp').on('click', function() {
            var id = $(this).data('id');
            var classId = $(this).data('class');
            var sessionId = $(this).data('session');
            var termId = $(this).data('term');
            var score = $(this).data('score');

            $('#editId').val(id);
            $('#editClassid').val(classId);
            $('#editSession').val(sessionId);
            $('#editTermid').val(termId);
            $('#editScori').val(score);
        });
    });

    </script>
</body>
</html>
