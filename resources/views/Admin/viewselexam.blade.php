<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <meta name="description" content="Smarthr - Bootstrap Admin Template">
    <meta name="keywords" content="admin, estimates, bootstrap, business, corporate, creative, management, minimal, modern, accounts, invoice, html5, responsive, CRM, Projects">
    <meta name="author" content="Dreamguys - Bootstrap Admin Template">
    <meta name="robots" content="noindex, nofollow">
    <title>Add new member</title>
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
    <!-- Select2 CSS -->
    <link rel="stylesheet" href="{{asset('css/select2.min.css')}}">
    <!-- Datetimepicker CSS -->
    <link rel="stylesheet" href="{{asset('css/bootstrap-datetimepicker.min.css')}}">
</head>
<body>
    <!-- Main Wrapper -->
    <div class="main-wrapper">
        @include('admin.hedad2')
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
                        <div class="alert alert-success">{{ session()->get('success') }}</div>
                    @endif

                    <!-- Page Content -->
                    <div class="content container-fluid">
                        <div class="summary">
                            <span><strong>Class Name:</strong> {{ $classrm->classname ?? 'Not Available' }}</span> &nbsp; | &nbsp;
                            <span><strong>Subject Type:</strong> {{$subby ?? 'Not Available' }}</span> &nbsp; | &nbsp;
                            <span><strong>Session:</strong>  {{ $currentSessionName }}</span> &nbsp; | &nbsp;
                            <span><strong>Term:</strong> {{ $termName }}</span>
                        </div>

                        <div class="table-responsive">
                            <table id="dataTableExample1" class="table table-bordered table-striped table-hover">
                                <thead>
                                    <tr class="info">
                                    <th class="d-none"></th>
                                        <th>S/N</th>
                                        <th>Fullname</th>
                                        <th>Session</th>
                                        <th>Term</th>
                                        <th>Testscore</th>
                                        <th>Examscore</th>
                                        <th>Total</th>
                                        <th>Date uploaded</th>
                                        <th>Edit</th>
                                        <th>Delete</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if($tezz->isNotEmpty())
                                        @foreach($tezz as $tezz)
                                            <tr>
                                            <td class="d-none">{{$tezz->id}}</td>
                                                <td>{{$loop->iteration}}</td>
                                                <td>{{ ($tezz->student->sname ?? 'No Name') . ' ' . ($tezz->student->onames ?? 'No Other Names') }}</td>
                                                <td>{{ $tezz->seszion->sessname }}</td>
                                                <td>
                                                    @if($tezz->termid == 1)
                                                        First Term
                                                    @elseif($tezz->termid == 2)
                                                        Second Term
                                                    @else
                                                        Third Term
                                                    @endif
                                                </td>
                                                <td>{{ $tezz->testscore}}</td>
                                                <td>{{ $tezz->examscore}}</td>
                                                <td>{{ $tezz->toal}}</td>
                                                <td>{{ $tezz->created_at }}</td>
                                                <td class="text-right">
                                                    <div class="dropdown dropdown-action">
                                                        <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-edit"></i></a>
                                                        <div class="dropdown-menu dropdown-menu-right">
                                                            <a class="dropdown-item upp" href="#" data-toggle="modal" data-target="#checck"><i class="fa fa-pencil m-r-5"></i> Edit details</a>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <form method='GET' action="{{ route('admin.deleteexam', ['id' => $tezz->id]) }}">
                                                        @method('DELETE')
                                                        @csrf
                                                        <input type="hidden" name="id" value="{{$tezz->id}}">
                                                        <button type="submit" name="delete" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to DELETE?');"><i class="fa fa-trash-o"></i></button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                    @endif
                                </tbody>
                                <tfoot>
                             
                                </tfoot>
                            </table>
                        </div>

                        <!-- Modal for editing -->
                        <div id="checck" class="modal custom-modal fade" role="dialog">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Edit</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="{{ route('admin.updateexamscore', ['id' => $tezz->id]) }}"     method='POST'>
                                            @csrf
                                            <div class="col-sm-6 col-md-12">
                                                <div class="form-group">
                                                    <label>Fullname<span class="text-danger">*</span></label>
                                                    <input class="form-control" type="text " name="fullname" id="fullname2" disabled>
                                                    <input class="form-control" type="hidden"   name="id" id="upid2">
                                                </div>
                                            </div>
                                         
                                            <div class="col-sm-6 col-md-12">
                                                <div class="form-group">
                                                    <label>Testscore <span class="text-danger">*</span></label>
                                                    <input class="form-control" type="integer" name="testscore" id="testscore2">
                                                </div>
                                            </div>

                                            <div class="col-sm-6 col-md-12">
                                                <div class="form-group">
                                                    <label>Examscore <span class="text-danger">*</span></label>
                                                    <input class="form-control" type="integer" name="examscore" id="examscore2">
                                                </div>
                                            </div>

                                        
                                            <div class="col-sm-6 col-md-12">
                                                <label>Select Session</label>              
                                                <select name="sessid" class="form-control form-control-sm" id="sessid" >
                                                    <option value="">Please select a session</option>
                                                    @foreach($sessionNames as $index => $sessionName)
                                                <option value="{{ $index + 1 }}" {{ isset($sessid) && $sessid == ($index + 1) ? 'selected' : '' }}>
                                                  {{ $sessionName }}
                                                </option>
                                                @endforeach
                                                </select>
                                            </div>

                        <div class="form-group col-md-12">
                    <label for="term">Select Term</label>
                    <select name="termid" id="termid" class="form-control form-control-sm">
                        <option value="">Please select a term</option>
                        <option value="1" {{ request('termid') == 1 ? 'selected' : '' }}>First term</option>
                        <option value="2" {{ request('termid') == 2 ? 'selected' : '' }}>Second term</option>
                        <option value="3" {{ request('termid') == 3 ? 'selected' : '' }}>Third term</option>
                    </select>
                </div>
            
                                            <div class="col-sm-6 col-md-12">
                                                <div class="submit-section">
                                                    <button type="submit" name="uppy" class="btn btn-primary submit-btn m-r-10">Update</button>
                                                </div>
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
                var table = $('#dataTableExample1').DataTable({
                    dom: "Blfrtip",
                    columnDefs: [{
                        orderable: false,
                        targets: -1
                    }],
                    paging: true,   // Enable pagination
                    searching: true, // Enable search
                    ordering: true // Enable sorting
                });


                function formatNumberWithCommas(number) {
                    return number.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ',');
                }

                

                $('.upp').on('click', function() {
                    var $tr = $(this).closest('tr');
                    var data = $tr.children('td').map(function() {
                        return $(this).text().trim();
                    }).get();

                    $('#upid2').val($tr.find('td:first').text().trim());
                    $('#fullname2').val(data[2]);
                    $('#testscore2').val(data[5]);
                    $('#examscore2').val(data[6]);


                    
                });
            });
        </script>
        <script src="{{asset('js/app.js')}}"></script>
    </body>
</html>
