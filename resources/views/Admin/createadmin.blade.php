<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <meta name="description" content="Smarthr - Bootstrap Admin Template">
    <meta name="keywords" content="admin, estimates, bootstrap, business, corporate, creative, management, minimal, modern, accounts, invoice, html5, responsive, CRM, Projects">
    <meta name="author" content="Dreamguys - Bootstrap Admin Template">
    <meta name="robots" content="noindex, nofollow">
    <title>Create User</title>
    <!-- Favicon -->
    <link rel="shortcut icon" href="{{ asset('img/favicon.png') }}">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <!-- Fontawesome CSS -->
    <link rel="stylesheet" href="{{ asset('css/font-awesome.min.css') }}">
    <!-- Lineawesome CSS -->
    <link rel="stylesheet" href="{{ asset('css/line-awesome.min.css') }}">
    <!-- Main CSS -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
<style>

.actions-column {
    text-align: center; /* Center-align actions in the column */
}

.actions-wrapper {
    display: flex;
    justify-content: center; /* Center the buttons horizontally */
    gap: 10px; /* Space between buttons */
}
</style>

</head>
<body>
    <!-- Main Wrapper -->
    <div class="main-wrapper">
        @include('admin.hedad2')
        <!-- Sidebar -->
        @include('admin.siderd2')
        <!-- Page Wrapper -->
        <div class="page-wrapper">
            <div class="container">
                <div class="row">
                    <div class="col-md-8">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Create New User</h4>
                            </div>
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

                              

                                <form action="{{ route('admin.storeuser') }}" method="POST">
                                    @csrf
                                    
                                    <div class="form-group">
                                    <div class="alert alert-info">
                                    The default password for new users will be <strong>password@</strong>.
                                </div>
                                        <label for="username">Username</label>
                                        <input type="text" name="fulln" id="username" class="form-control" placeholder="Username" required>
                                    </div>

                                    <div class="form-group">
                                        <label for="email">Email</label>
                                        <input type="email" name="admail" id="email" class="form-control" placeholder="Enter email" required>
                                    </div>
     
                                    <div class="form-group">
                                        <label for="role">Role</label>
                                        <select name="rolez" id="role" class="form-control" required>
                                            <option value="" disabled selected>Please select role here</option>
                                            <option value="1">Super Admin</option>
                                            <option value="2">Admin</option>
                                            <option value="3">Teacher</option>
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary">Create Admin</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Table of Admins -->
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Admin List</h4>
                            </div>
                            <div class="card-body">
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Username</th>
                <th>Email</th>
                <th>Role</th>
                <th style="padding: 15px; text-align: center;">Actions</th>
            </tr>
        </thead>
        <tbody>
        @if($admins->isNotEmpty())
            @foreach($admins as $user)
                <tr>
                    <td class="d-none">{{$user->id}}</td>
                    <td>{{ $user->fulln }}</td>
                    <td>{{ $user->admail }}</td>
                    <td>
                        @switch($user->role)
                            @case(1)
                                Super Admin
                                @break
                            @case(2)
                                Admin
                                @break
                            @case(3)
                                Teacher
                                @break
                        @endswitch
                    </td>
                    <td class="actions-column">
                        <div class="actions-wrapper">
                            <div class="dropdown dropdown-action">
                                <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-edit"></i></a>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <a class="dropdown-item upp" href="#" data-toggle="modal" data-target="#checck"><i class="fa fa-pencil m-r-5"></i> Edit details</a>
                                </div>
                            </div>

                            <form action="{{ route('admin.adminreset', $user->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('PUT')
                                <input type="hidden" name="id" value="{{ $user->id }}">
                                <button type="submit" class="btn btn-warning btn-sm" onclick="return confirmResetPassword();"><i class="fa fa-key"></i> Reset Password</button>
                            </form>
                            <form action="{{ route('admin.deleteuser', $user->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <input type="hidden" name="id" value="{{$user->id}}">
                                <button type="submit" name="delete" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to DELETE?');"><i class="fa fa-trash-o"></i></button>
                            </form>
                        </div>
                    </td>
                </tr>
            @endforeach
        @endif
        </tbody>
    </table>
</div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
function confirmResetPassword() {
    return confirm('Are you sure you want to reset this user\'s password to the default value?');
}
</script>

    <!-- Edit User Modal -->
<!-- Edit User Modal -->
<<div id="checck" class="modal custom-modal fade" role="dialog">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Edit</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                    <form action="{{ route('admin.updateuser', ['id' => $user->id]) }}" method='POST'>
                                     @csrf
       
                            @method('PUT')
                      <div class="modal-body">
                    <div class="form-group">
                        <label for="edit-username">Username</label>
                        <input type="text" name="fulln" id="edit-username" class="form-control" placeholder="Username" >
                        <input class="form-control" type="hidden"   name="id" id="upid2">
                    </div>

                    <div class="form-group">
                        <label for="edit-email">Email</label>
                        <input type="email" name="admail" id="edit-email" class="form-control" placeholder="Enter email" >
                    </div>

                  

                    <div class="form-group">
                        <label for="edit-role">Role</label>
                        <select name="rolez" id="edit-role" class="form-control" >
                            <option value="" disabled selected>Please select role here</option>
                            <option value="1">Super Admin</option>
                            <option value="2">Admin</option>
                            <option value="3">Teacher</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>



   <!-- Scripts -->
   <script src="{{ asset('js/jquery-3.2.1.min.js') }}"></script>
    <script src="{{ asset('js/popper.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script>
$(document).ready(function() {
    // Open modal and populate form fields
    $('.upp').on('click', function() {
        var $tr = $(this).closest('tr');
        var userId = $tr.find('td:first').text().trim(); // Extract user ID
        var username = $tr.find('td:nth-child(2)').text().trim(); // Extract username
        var email = $tr.find('td:nth-child(3)').text().trim(); // Extract email
        var role = $tr.find('td:nth-child(4)').text().trim(); // Extract role text
        
        $('#upid2').val(userId);
        $('#edit-username').val(username);
        $('#edit-email').val(email);
        
        // Set the selected role
        var roleValue;
        switch (role) {
            case 'Super Admin':
                roleValue = '1';
                break;
            case 'Admin':
                roleValue = '2';
                break;
            case 'Teacher':
                roleValue = '3';
                break;
            default:
                roleValue = ''; // If no match, set to empty
        }
        $('#edit-role').val(roleValue);
        
        $('#checck').modal('show');
    });
});

    </script>
</body>
</html>