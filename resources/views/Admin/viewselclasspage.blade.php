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
                            <span><strong>Session:</strong>  {{ $currentSessionName }}</span> &nbsp; 
                        </div>
                        <?php $countz = 0; ?>
                        <div class="table-responsive">
                            <table id="dataTableExample1" class="table table-bordered table-striped table-hover">
                                <thead>
                                <tr class="info">
                                            <th class="d-none"></th>
                                            <th>S/N</th>
                                            <th>Surname</th>
                                            <th>Othernames</th>
                                            <th>Date of Birth</th>
                                            <th>Address</th>
                                            <th>Session</th>
                                            <th>Parent Name</th>
                                            <th>Parent Phone</th>
                                            <th>Parent Email</th>
                                            <th>Logo</th>
                                            <th>Edit</th>
                                            <th>Delete</th>
                                        </tr>
                                    </thead>
                                <tbody>
                                @foreach($students as $student)
                                        <tr>
                                            <td class="d-none">{{ $student->id }}</td>
                                            <td>{{ ++$countz }}</td>
                                            <td>{{ $student->sname }}</td>
                                            <td>{{ $student->onames }}</td>
                                            <td>{{ $student->dob }}</td>
                                            <td>{{ $student->addy }}</td>
                                            <td>{{ $student->seszion ? $student->seszion->sessname : 'No session' }}</td>
                                            <td>{{ $student->parentname }}</td>
                                            <td>{{ $student->parentno }}</td>
                                            <td>{{ $student->parentemail }}</td>
                                            <td><img src="/storage/studimg/{{ $student->studimg }}" width="100" height="100" alt="Student Logo"></td>

                                                <td class="text-right">
                                                    <div class="dropdown dropdown-action">
                                                        <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-edit"></i></a>
                                                        <div class="dropdown-menu dropdown-menu-right">
                                                            <a class="dropdown-item upp" href="#" data-toggle="modal" data-target="#checck"><i class="fa fa-pencil m-r-5"></i> Edit details</a>
   
                                                        <a class="dropdown-item ria" href="#" data-toggle="modal" data-target=""><i class="fa fa-pencil m-r-5"></i> Update logo</a>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <form method='GET' action="{{ route('admin.deleteaddstudent', ['id' => $student->id]) }}">
                                                        @method('DELETE')
                                                        @csrf
                                                        <input type="hidden" name="id" value="{{$student->id}}">
                                                        <button type="submit" name="delete" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to DELETE?');"><i class="fa fa-trash-o"></i></button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                               
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
                                    <form action="{{ route('admin.addstudentpageedit', ['id' => $student->id]) }}" method="post">
                                            @csrf
                                            <div class="col-sm-6 col-md-12">
                                                <div class="form-group">
                                                <label>Surname</label>
                                                  <input type="form-control" name="sname3" class="form-control" id="sname2">
                                                   <input type="hidden" name="id" id="upid2" value="{{ $student->id }}">
                                                    <input type="hidden" name="upid3" id="upid3" value="{{ $student->classid }}">
                                                </div>
                                            </div>
                                         
                                            <div class="col-sm-6 col-md-12">
                                                <div class="form-group">
                                                <label>Othernames</label>
                                                <input class="form-control"  type="text" name="onames3" id="onames2">
                                              </div>
                                            </div>

                                            <div class="col-sm-6 col-md-12">
                                                <div class="form-group">
                                                <label>Address</label>
                                            <input class="form-control" type="text" name="addy3" id="addy2">

                                              </div>
                                            </div>


                                            <div class="col-sm-6 col-md-12">
                                                <div class="form-group">
                                                <label>Date of Birth (y/m/d format)</label>
                                            <input class="form-control" type="text" name="dob3" id="dob2">
                                        </div>
                                          </div>


                                            <div class="col-sm-6 col-md-12">
                                                <div class="form-group">
                                                <label>Parent Name</label>
                                               <input type="text" name="parentname3" maxlength="60" class="form-control" id="parentname2">

                                            </div>
                                            </div>

                                            
                                            <div class="col-sm-6 col-md-12">
                                                <div class="form-group">
                                                <label>Parent Phone Number</label>
                                            <input type="tel" name="parentno3" maxlength="18" class="form-control" id="parentno2">
                                            </div>
                                            </div>

                                            <div class="col-sm-6 col-md-12">
                                                <div class="form-group">
                                                <label>Parent Email Address</label>
                                            <input type="email" name="parentemail3" class="form-control" id="parentemail2">
                                        </div>
                                        </div>


                                        <div class="col-sm-6 col-md-12">
    <label>Select Session</label>
    <select name="sessid" id="sessid" class="form-control form-control-sm">
        <option value="">Please select a session</option>
        @foreach($seszion as $sess)
            <option value="{{ $sess->id }}" {{ isset($sessid) && $sessid == $sess->id ? 'selected' : '' }}>
                {{ $sessionNames[$sess->id] ?? 'Unknown' }}
            </option>
        @endforeach
    </select>
</div>
<!-- Debugging -->



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

        <div class="modal custom-modal fade" id="updatelogo" role="dialog">
                  <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                      <div class="modal-body">
                        <div class="form-header">
                <form action= "{{ route('admin.uploadlogostud', ['id' => $student->id])  }}" method="post" enctype="multipart/form-data">
                         @csrf
                    <h3>Update student Logo</h3>
                    <div class="col-sm-6 col-md-12">
                  <div class="form-group"> 
              
                <label>Select School logo (png, jpg or jpeg format allowed) <span class="text-danger">*</span></label>
                <div id="newphoto"></div>
                    
              <input type="hidden"  name="upid"   id ="upid5" value="{{$student->id}}">

                <input type="hidden" name="upid3" id="upid3" value="{{ $student->classid }}">
                <input type="file" class="form-control" name="updd"  id="newphoto" value="{{$student->studimg}}">
                </div>

                 <div class="submit-section">
                <button type ="submit" class="btn btn-success">updatelogo</button>
                </div>
                
                  
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
                $(document).ready(function () {
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

                    $('.upp').on('click', function () {
                        $('#checck').modal('show');
                        var $tr = $(this).closest('tr');
                        var data = $tr.children('td').map(function () {
                            return $(this).text();
                        }).get();
                        $('#upid2').val(data[0]);
                        $('#sname2').val(data[2]);
                        $('#onames2').val(data[3]);
                        $('#dob2').val(data[4]);
                        $('#addy2').val(data[5]);
                        $('#parentname2').val(data[7]);
                        $('#parentno2').val(data[8]);
                        $('#parentemail2').val(data[9]);
                    });

                    $('.ria').on('click', function () {
                        $('#updatelogo').modal('show');
                        var $tr = $(this).closest('tr');
                        var data = $tr.children('td').map(function () {
                            return $(this).text();
                        }).get();
                        $('#upid5').val(data[0]);
                    });
                });
            </script>
            <script src="{{asset('js/app.js')}}"></script>
        </div>
    </div>

    </body>
</html>
