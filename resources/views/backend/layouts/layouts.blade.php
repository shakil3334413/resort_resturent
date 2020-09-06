<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Resturent Managment System') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets/img/favicon.ico')}}">
    <title>Hotel - Bootstrap 4 Admin Template</title>
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/font-awesome.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/plugins/morris/morris.css')}}">
    {{--  <link rel="stylesheet" type="text/css" href={{ asset('assets/css/jquery.circliful.css')}}">  --}}
    <link rel="stylesheet" type="text/css" href={{ asset('assets/css/dataTables.bootstrap4.min.css')}}">
    <link rel="stylesheet" type="text/css" href={{ asset('assets/css/bootstrap-datetimepicker.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/style.css') }}">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>

<body>
    <div class="main-wrapper">
        <div class="header">
			<div class="header-left">
				<a href="index.html" class="logo">
					<img src="{{asset('assets/img/logo.png')}}" width="35" height="35" alt=""> <span>Hotel</span>
				</a>
			</div>
			<div class="menubar">
				<a id="toggle_btn" href="javascript:void(0);"><i class="fa fa-bars"></i></a>
			</div>

			<div class="searchbar">
				<form class="form-inline my-1 w-25 float-left">
					<input class="form-control mr-sm-2 search-input" type="search" placeholder="Search..." >
				</form>
			</div>
            <a id="mobile_btn" class="mobile_btn float-left" href="#sidebar"><i class="fa fa-bars"></i></a>
            <ul class="nav user-menu float-right">
                <li class="nav-item dropdown d-none d-sm-block">
                    <a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown"><i class="fa fa-bell-o"></i> <span class="badge badge-pill bg-primary float-right">3</span></a>
                    <div class="dropdown-menu notifications">
                        <div class="topnav-dropdown-header">
                            <span>Notifications</span>
                        </div>
                        <div class="drop-scroll">
                            <ul class="notification-list">
                                <li class="notification-message">
                                    <a href="activities.html">
                                        <div class="media">
											<span class="avatar">
												<img alt="John Doe" src="{{asset('assets/img/user.jpg')}}" class="img-fluid rounded-circle">
											</span>
											<div class="media-body">
												<p class="noti-details"><span class="noti-title">John Doe</span> booking a new room<span class="noti-title"></span></p>
												<p class="noti-time"><span class="notification-time">4 mins ago</span></p>
											</div>
                                        </div>
                                    </a>
                                </li>
                                <li class="notification-message">
                                    <a href="activities.html">
                                        <div class="media">
											<span class="avatar">V</span>
											<div class="media-body">
												<p class="noti-details"><span class="noti-title">Tarah Shropshire</span> check-in   <span class="noti-title"> with payment gateway</span></p>
												<p class="noti-time"><span class="notification-time">6 mins ago</span></p>
											</div>
                                        </div>
                                    </a>
                                </li>
                                <li class="notification-message">
                                    <a href="activities.html">
                                        <div class="media">
											<span class="avatar">L</span>
											<div class="media-body">
												<p class="noti-details"><span class="noti-title">Misty Tison</span> check-out <span class="noti-title">Today</span> </p>
												<p class="noti-time"><span class="notification-time">8 mins ago</span></p>
											</div>
                                        </div>
                                    </a>
                                </li>
                                <li class="notification-message">
                                    <a href="activities.html">
                                        <div class="media">
											<span class="avatar">G</span>
											<div class="media-body">
												<p class="noti-details"><span class="noti-title">Rolland Webber</span> Extended another  <span class="noti-title">two days</span></p>
												<p class="noti-time"><span class="notification-time">12 mins ago</span></p>
											</div>
                                        </div>
                                    </a>
                                </li>
                                <li class="notification-message">
                                    <a href="activities.html">
                                        <div class="media">
											<span class="avatar">V</span>
											<div class="media-body">
												<p class="noti-details"><span class="noti-title">Bernardo Galaviz</span> added new booking <span class="noti-title">for couple of days</span></p>
												<p class="noti-time"><span class="notification-time">2 days ago</span></p>
											</div>
                                        </div>
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <div class="topnav-dropdown-footer">
                            <a href="activities.html">View all Notifications</a>
                        </div>
                    </div>
                </li>
                <li class="nav-item dropdown d-none d-sm-block">
                    <a href="javascript:void(0);" id="open_msg_box" class="hasnotifications nav-link"><i class="fa fa-comment-o"></i> <span class="badge badge-pill bg-primary float-right">8</span></a>
                </li>
                <li class="nav-item  d-none d-sm-block">
                    <a href="{{route('admin.logout')}}" id="" class="nav-link"  onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">Logout</a>
                    <form id="logout-form" action="{{ route('admin.logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </li>
                <li class="nav-item dropdown has-arrow">
                    <a href="#" class="dropdown-toggle nav-link user-link" data-toggle="dropdown">
                        <span class="user-img"><img class="rounded-circle" src="{{asset('assets/img/user.jpg')}}" width="40" alt="Admin">
							<span class="status online"></span></span>
                        <span>{{ Auth::user()->name }}</span>
                    </a>
					<div class="dropdown-menu">
						<a class="dropdown-item" href="profile.html">My Profile</a>
						<a class="dropdown-item" href="edit-profile.html">Edit Profile</a>
						<a class="dropdown-item" href="settings.html">Settings</a>
						<a class="dropdown-item" href="login.html">Logout</a>
					</div>
                </li>
            </ul>
            <div class="dropdown mobile-user-menu float-right">
                <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
                <div class="dropdown-menu dropdown-menu-right">
                    <a class="dropdown-item" href="profile.html">My Profile</a>
                    <a class="dropdown-item" href="edit-profile.html">Edit Profile</a>
                    <a class="dropdown-item" href="settings.html">Settings</a>
                    <a class="dropdown-item" href="login.html">Logout</a>
                </div>
            </div>
        </div>
        <div class="sidebar" id="sidebar">
            <div class="sidebar-inner slimscroll">
                <div id="sidebar-menu" class="sidebar-menu">
                    <ul>
                        <li class="menu-title">Main</li>
                        <li class="active" >
                            <a class="active" href="index.html"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a>
                        </li>
                        <li class="submenu">
							<a href="#"><i class="fa fa-suitcase" aria-hidden="true"></i><span> Category</span> <span class="menu-arrow"></span></a>
							<ul style="display: none;">
                                <li><a href="{{url('category.index')}}">All Category</a></li>
                                <li><a href="{{route('category.create')}}">Add Category</a></li>
							</ul>
                        </li>
                        <li class="submenu">
							<a href="#"><i class="fa fa-suitcase" aria-hidden="true"></i><span> SubCategory</span> <span class="menu-arrow"></span></a>
							<ul style="display: none;">
                                <li><a href="{{route('subcategory.index')}}">All SubCategory</a></li>
                                <li><a href="{{route('subcategory.create')}}">Add SubCategory</a></li>
							</ul>
                        </li>
                        <li class="submenu">
							<a href="#"><i class="fa fa-suitcase" aria-hidden="true"></i><span>Brand</span> <span class="menu-arrow"></span></a>
							<ul style="display: none;">
                                <li><a href="{{route('brand.index')}}">All Brand</a></li>
                                <li><a href="{{route('brand.create')}}">Add Brand</a></li>
							</ul>
                        </li>
                        <li class="submenu">
							<a href="#"><i class="fa fa-suitcase" aria-hidden="true"></i><span>Quentity Type</span> <span class="menu-arrow"></span></a>
							<ul style="display: none;">
                                <li><a href="{{route('item.index')}}">All Quentity Type</a></li>
                                <li><a href="{{route('item.create')}}">Add Quentity Type</a></li>
							</ul>
                        </li>
                        <li class="submenu">
							<a href="#"><i class="fa fa-suitcase" aria-hidden="true"></i><span>Room Type</span> <span class="menu-arrow"></span></a>
							<ul style="display: none;">
                                <li><a href="{{route('room_type.index')}}">All Room Type</a></li>
                                <li><a href="{{route('room_type.create')}}">Add Room Type</a></li>
							</ul>
                        </li>
                        <li class="submenu">
							<a href="#"><i class="fa fa-suitcase" aria-hidden="true"></i><span>Stock</span> <span class="menu-arrow"></span></a>
							<ul style="display: none;">
                                <li><a href="{{route('stock.index')}}">All Stock</a></li>
                                <li><a href="{{route('stock.create')}}">Add Stock</a></li>
							</ul>
						</li>
						<li class="submenu">
							<a href="#"><i class="fa fa-suitcase" aria-hidden="true"></i><span> Booking</span> <span class="menu-arrow"></span></a>
							<ul style="display: none;">
								<li><a href="all-booking.html">All Booking</a></li>
								<li><a href="edit-booking.html">Edit Booking</a></li>
								<li><a href="add-booking.html">Add Booking</a></li>
							</ul>
						</li>
						<li class="submenu">
							<a href="#"><i class="fa fa-users" aria-hidden="true"></i> <span> Customers </span> <span class="menu-arrow"></span></a>
							<ul style="display: none;">
								<li><a href="all-customers.html">All customers</a></li>
								<li><a href="edit-customer.html">Edit Customer</a></li>
								<li><a href="add-customer.html">Add Customer</a></li>
							</ul>
						</li>
						<li class="submenu">
							<a href="#"><i class="fa fa-key" aria-hidden="true"></i> <span> Rooms </span> <span class="menu-arrow"></span></a>
							<ul style="display: none;">
                            <li><a href="{{route('room.index')}}">All Rooms</a></li>
                            <li><a href="{{route('room.create')}}">Add Room</a></li>
							</ul>
						</li>
                        <li class="submenu">
							<a href="#"><i class="fa fa-user"></i> <span> Staff </span> <span class="menu-arrow"></span></a>
							<ul style="display: none;">
								<li><a href="all-staff.html">All Staff</a></li>
								<li><a href="edit-staff.html">Edit Staff</a></li>
								<li><a href="add-staff.html">Add staff</a></li>
							</ul>
						</li>
                        <li>
                            <a href="pricing.html"><i class="fa fa-money" aria-hidden="true"></i> <span>Pricing</span></a>
                        </li>
						<li class="submenu">
							<a href="#"><i class="fa fa-share-alt" aria-hidden="true"></i> <span> Apps </span> <span class="menu-arrow"></span></a>
							<ul style="display: none;">
								<li>
									<a href="chat.html"><i class="fa fa-comments"></i> <span>Chat</span> <span class="badge badge-pill text-white bg-primary float-right">5</span></a>
								</li>
								 <li class="submenu">
								<a href="#"><i class="fa fa-video-camera camera"></i> <span> Calls</span> <span class="menu-arrow"></span></a>
								<ul style="display: none;">
                                <li><a href="voice-call.html">Voice Call</a></li>
                                <li><a href="video-call.html">Video Call</a></li>
                                <li><a href="incoming-call.html">Incoming Call</a></li>
                            </ul>
                        </li>
						<li class="submenu">
                            <a href="#"><i class="fa fa-envelope"></i> <span> Email</span> <span class="menu-arrow"></span></a>
                            <ul style="display: none;">
                                <li><a href="compose.html">Compose Mail</a></li>
                                <li><a href="inbox.html">Inbox</a></li>
                                <li><a href="mail-view.html">Mail View</a></li>
                            </ul>
							</li>
							</ul>
						</li>
						<li class="submenu">
							<a href="#"><i class="fa fa-user"></i> <span> Employees </span> <span class="menu-arrow"></span></a>
							<ul style="display: none;">
								<li><a href="employees.html">Employees List</a></li>
								<li><a href="leaves.html">Leaves</a></li>
								<li><a href="holidays.html">Holidays</a></li>
								<li><a href="attendance.html">Attendance</a></li>
							</ul>
						</li>
						<li class="submenu">
							<a href="#"><i class="fa fa-money"></i> <span> Accounts </span> <span class="menu-arrow"></span></a>
							<ul style="display: none;">
								<li><a href="invoices.html">Invoices</a></li>
								<li><a href="payments.html">Payments</a></li>
								<li><a href="expenses.html">Expenses</a></li>
								<li><a href="taxes.html">Taxes</a></li>
								<li><a href="provident-fund.html">Provident Fund</a></li>
							</ul>
						</li>
						<li class="submenu">
							<a href="#"><i class="fa fa-book"></i> <span> Payroll </span> <span class="menu-arrow"></span></a>
							<ul style="display: none;">
								<li><a href="salary.html"> Employee Salary </a></li>
								<li><a href="salary-view.html"> Payslip </a></li>
							</ul>
						</li>
                        <li>
                            <a href="calendar.html"><i class="fa fa-calendar"></i> <span>Calendar</span></a>
                        </li>
                        <li class="submenu">
                            <a href="#"><i class="fa fa-commenting-o"></i> <span> Blog</span> <span class="menu-arrow"></span></a>
                            <ul style="display: none;">
                                <li><a href="blog.html">Blog</a></li>
                                <li><a href="blog-details.html">Blog View</a></li>
                                <li><a href="add-blog.html">Add Blog</a></li>
                                <li><a href="edit-blog.html">Edit Blog</a></li>
                            </ul>
                        </li>
						<li>
							<a href="assets.html"><i class="fa fa-cube"></i> <span>Assets</span></a>
						</li>
						<li>
							<a href="activities.html"><i class="fa fa-bell-o"></i> <span>Activities</span></a>
						</li>
						<li class="submenu">
							<a href="#"><i class="fa fa-flag-o"></i> <span> Reports </span> <span class="menu-arrow"></span></a>
							<ul style="display: none;">
								<li><a href="expense-reports.html"> Expense Report </a></li>
								<li><a href="invoice-reports.html"> Invoice Report </a></li>
							</ul>
						</li>
                        <li>
                            <a href="settings.html"><i class="fa fa-cog"></i> <span>Settings</span></a>
                        </li>
                        <li class="menu-title">UI Elements</li>
                        <li class="submenu">
                            <a href="#"><i class="fa fa-laptop"></i> <span> Components</span> <span class="menu-arrow"></span></a>
                            <ul style="display: none;">
                                <li><a href="uikit.html">UI Kit</a></li>
                                <li><a href="typography.html">Typography</a></li>
                                <li><a href="tabs.html">Tabs</a></li>
                            </ul>
                        </li>
                        <li class="submenu">
                            <a href="#"><i class="fa fa-edit"></i> <span> Forms</span> <span class="menu-arrow"></span></a>
                            <ul style="display: none;">
                                <li><a href="form-basic-inputs.html">Basic Inputs</a></li>
                                <li><a href="form-input-groups.html">Input Groups</a></li>
                                <li><a href="form-horizontal.html">Horizontal Form</a></li>
                                <li><a href="form-vertical.html">Vertical Form</a></li>
                            </ul>
                        </li>
                        <li class="submenu">
                            <a href="#"><i class="fa fa-table"></i> <span> Tables</span> <span class="menu-arrow"></span></a>
                            <ul style="display: none;">
                                <li><a href="tables-basic.html">Basic Tables</a></li>
                                <li><a href="tables-datatables.html">Data Table</a></li>
                            </ul>
                        </li>

                        <li class="menu-title">Extras</li>
                        <li class="submenu">
                            <a href="#"><i class="fa fa-columns"></i> <span>Pages</span> <span class="menu-arrow"></span></a>
                            <ul style="display: none;">
                                <li><a href="login.html"> Login </a></li>
                                <li><a href="register.html"> Register </a></li>
                                <li><a href="forgot-password.html"> Forgot Password </a></li>
                                <li><a href="change-password2.html"> Change Password </a></li>
                                <li><a href="lock-screen.html"> Lock Screen </a></li>
                                <li><a href="profile.html"> Profile </a></li>
                                <li><a href="gallery.html"> Gallery </a></li>
                                <li><a href="error-404.html">404 Error </a></li>
                                <li><a href="error-500.html">500 Error </a></li>
                                <li><a href="blank-page.html"> Blank Page </a></li>
                            </ul>
                        </li>
                        <li class="submenu">
                            <a href="javascript:void(0);"><i class="fa fa-share-alt"></i> <span>Multi Level</span> <span class="menu-arrow"></span></a>
                            <ul style="display: none;">
                                <li class="submenu">
                                    <a href="javascript:void(0);"><span>Level 1</span> <span class="menu-arrow"></span></a>
                                    <ul style="display: none;">
                                        <li><a href="javascript:void(0);"><span>Level 2</span></a></li>
                                        <li class="submenu">
                                            <a href="javascript:void(0);"> <span> Level 2</span> <span class="menu-arrow"></span></a>
                                            <ul style="display: none;">
                                                <li><a href="javascript:void(0);">Level 3</a></li>
                                                <li><a href="javascript:void(0);">Level 3</a></li>
                                            </ul>
                                        </li>
                                        <li><a href="javascript:void(0);"><span>Level 2</span></a></li>
                                    </ul>
                                </li>
                                <li>
                                    <a href="javascript:void(0);"><span>Level 1</span></a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="page-wrapper">
            @yield('admin')
        </div>
    </div>
    <div class="sidebar-overlay" data-reff=""></div>
    <script src="{{asset('assets/js/jquery-3.2.1.min.js') }}"></script>
	<script src="{{ asset('assets/js/popper.min.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.slimscroll.js') }}"></script>
    <script src="{{ asset('assets/js/Chart.bundle.js') }}"></script>
    <script src="{{ asset('assets/js/chart.js') }}"></script>
    <script src="{{ asset('assets/plugins/morris/morris.js') }}"></script>
    <script src="{{ asset('assets/plugins/raphael/raphael-min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.circliful.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.slimscroll.js') }}"></script>
    <script src="{{ asset('assets/js/select2.min.js') }}"></script>
    <script src="{{ asset('assets/js/moment.min.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap-datetimepicker.min.js') }}"></script>
    <script src="{{ asset('assets/js/app.js') }}"></script>
    <script>
        $(document).ready(function() {
        $('select[name=category_id]').change(function() {
            var url = '{{ url('admin/category') }}' + '/' + $(this).val() + '/subcategory';
            $.get(url, function(data) {
                var select = $('form select[name=subcategory_id]');
                select.empty();
                $.each(data,function(key, value) {
                    select.append('<option value=' + value.id + '>' + value.name + '</option>');
                });
            });
        });
    });
    </script>
</body>

</html>
