<div class="sidebar" id="sidebar">
    <div class="sidebar-inner slimscroll">
        <div id="sidebar-menu" class="sidebar-menu">
            <ul>
                <!-- Super Admin Links -->
                @if(Session::get('role') == '1')
                    <li>
                        <a href="{{ route('admin.dashboardsuper') }}"><i class="la la-dashboard"></i> <span>Dashboard</span></a>
                    </li>
                    <li>
                        <a href="{{ route('admin.createsch') }}"><i class="la la-user"></i> <span>Create School Account</span></a>
                    </li>
                    <li>
                        <a href="{{ route('admin.createschview') }}"><i class="la la-user"></i> <span>View School</span></a>
                    </li>
                    <li>
                        <a href="{{ route('admin.createadmin') }}"><i class="la la-user"></i> <span>Create Admin</span></a>
                    </li>
                    <li>
                        <a href="{{ route('admin.createpayment') }}"><i class="la la-user"></i> <span>Create Payment</span></a>
                    </li>
                    <li>
                        <a href="{{ route('admin.createclass') }}"><i class="la la-cog"></i> <span>Create Class</span></a>
                    </li>
                    <li>
                        <a href="{{ route('admin.createseszion') }}"><i class="la la-cog"></i> <span>Create Session</span></a>
                    </li>
                    <li>
                        <a href="{{ route('admin.createoverall') }}"><i class="la la-cog"></i> <span>Create Overall Mark</span></a>
                    </li>
                    <li>
                        <a href="{{ route('admin.createsubject') }}"><i class="la la-cog"></i> <span>Create Subject</span></a>
                    </li>
                    <li>
                        <a href="{{ route('admin.viewclass') }}"><i class="la la-cog"></i> <span>View Classes</span></a>
                    </li>
                    <li>
                        <a href="{{ route('admin.payment') }}"><i class="la la-cog"></i> <span>View Payment</span></a>
                    </li>
                    <li>
                        <a href="{{ route('admin.uploadtest') }}"><i class="la la-cog"></i> <span>Upload Test</span></a>
                    </li>
                    <li>
                        <a href="{{ route('admin.uploadexam') }}"><i class="la la-cog"></i> <span>Upload Exam</span></a>
                    </li>
                    <li>
                        <a href="{{ route('admin.selectresults') }}"><i class="la la-cog"></i> <span>View Report Card</span></a>
                    </li>

                <!-- Admin Links -->
                @elseif(Session::get('role') == '2')
                    <li>
                        <a href="{{ route('admin.createclass') }}"><i class="la la-cog"></i> <span>Create Class</span></a>
                    </li>
                    <li>
                        <a href="{{ route('admin.viewclass') }}"><i class="la la-cog"></i> <span>View Classes</span></a>
                    </li>
                    <li>
                        <a href="{{ route('admin.createpayment') }}"><i class="la la-user"></i> <span>Create Payment</span></a>
                    </li>
                    <li>
                        <a href="{{ route('admin.payment') }}"><i class="la la-cog"></i> <span>View Payment</span></a>
                    </li>
                    <li>
                        <a href="{{ route('admin.uploadtest') }}"><i class="la la-cog"></i> <span>Upload Test</span></a>
                    </li>
                    <li>
                        <a href="{{ route('admin.uploadexam') }}"><i class="la la-cog"></i> <span>Upload Exam</span></a>
                    </li>

                <!-- Teacher Links -->
                @elseif(Session::get('role') == '3')
                    <li>
                        <a href="{{ route('admin.uploadtest') }}"><i class="la la-cog"></i> <span>Upload Test</span></a>
                    </li>
                    <li>
                        <a href="{{ route('admin.uploadexam') }}"><i class="la la-cog"></i> <span>Upload Exam</span></a>
                    </li>
                @endif

                <!-- Common Links for All Roles -->
                <li>
                    <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        <i class="la la-lock"></i> <span>Logout</span>
                    </a>
                </li>

                <form id="logout-form" action="{{ route('admin.logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </ul>
        </div>
    </div>
</div>
