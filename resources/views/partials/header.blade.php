<?php
    use App\Models\Users;
    // Refresh permissions if they have changed
    $user = auth()->user();
    $current = Users::join('user_roles', 'users.id', '=', 'user_roles.user_id')
            ->join('role_permissions', 'user_roles.role_id', '=', 'role_permissions.role_id')
            ->join('permissions', 'role_permissions.permission_id', '=', 'permissions.id')
            ->where('users.id', $user->id)
            ->selectRaw('
                users.id, 
                users.id_number, 
                users.name, 
                users.pfp, 
                users.position,
                users.first_login,
                users.email, 
                GROUP_CONCAT(permissions.pages) AS pages
            ')
            ->groupBy('users.id', 'users.id_number', 'users.name', 'users.pfp', 'users.position', 'users.first_login', 'users.email')
            ->first();

    if (session('user') != $current) {
        session()->put('user', $current); // Update the session with fresh permissions
    }
?>
<?php $user = session('user') ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>PAGSS | Dashboard</title>

    <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">
	<!-- Google Font: Source Sans Pro -->
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
	<!-- Font Awesome Icons -->
	<link rel="stylesheet" href="{{ asset('/plugins/fontawesome-free/css/all.min.css') }}">
	<!-- overlayScrollbars -->
	<link rel="stylesheet" href="{{ asset('/plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">
	<!-- Theme style -->
	<link rel="stylesheet" href="{{ asset('/css/adminlte.min.css') }}">
	<!-- Datatables style -->
	<link rel="stylesheet" href="{{ asset('/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
	<link rel="stylesheet" href="{{ asset('/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
	<link rel="stylesheet" href="{{ asset('/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
    <!-- Sweet Alert style -->
    <link rel="stylesheet" href="{{ asset('/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css') }}">
    <!-- BS Duallistbox -->
    <link rel="stylesheet" href="{{ asset('plugins/bootstrap4-duallistbox/bootstrap-duallistbox.min.css') }}">
</head>
<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
<div class="wrapper">

    <!-- Preloader -->
    <div class="preloader flex-column justify-content-center align-items-center">
        <img class="animation__wobble" src="{{ asset('/img/PAGSSLogo.ico') }}" alt="AdminLTELogo" height="60" width="100">
    </div>
    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-light">
        <!-- Left navbar links -->
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
            </li>
            <li class="nav-item d-none d-sm-inline-block">
                <a href="index3.html" class="nav-link">Home</a>
            </li>
            <li class="nav-item d-none d-sm-inline-block">
                <a href="#" class="nav-link">Contact</a>
            </li>
        </ul>

        <!-- Right navbar links -->
        <ul class="navbar-nav ml-auto">
            
            <!-- Notifications Dropdown Menu -->
            <li class="nav-item dropdown">
                <a class="nav-link" data-toggle="dropdown" href="#">
                    <i class="far fa-bell"></i>
                    <span class="badge badge-warning navbar-badge">15</span>
                </a>
                <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                    <span class="dropdown-item dropdown-header">15 Notifications</span>
                    <div class="dropdown-divider"></div>
                    <a href="#" class="dropdown-item">
                        <i class="fas fa-envelope mr-2"></i> 4 new messages
                        <span class="float-right text-muted text-sm">3 mins</span>
                    </a>
                    <div class="dropdown-divider"></div>
                    <a href="#" class="dropdown-item">
                        <i class="fas fa-users mr-2"></i> 8 friend requests
                        <span class="float-right text-muted text-sm">12 hours</span>
                    </a>
                    <div class="dropdown-divider"></div>
                    <a href="#" class="dropdown-item">
                        <i class="fas fa-file mr-2"></i> 3 new reports
                        <span class="float-right text-muted text-sm">2 days</span>
                    </a>
                    <div class="dropdown-divider"></div>
                    <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                    <i class="fas fa-expand-arrows-alt"></i>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/logout" role="button">
                    <i class="fas fa-sign-out-alt"></i>
                </a>
            </li>
        </ul>
    </nav>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
        <!-- Brand Logo -->
        <a href="dashboard" class="brand-link">
            <img src="{{ asset('/img/PAGSSLogo.ico') }}" alt="PAGSS Logo" class="brand-image img-circle" style="opacity: .8;margin-left: 0rem">
            <span class="brand-text font-weight-light">PAGSS</span>
        </a>

        <!-- Sidebar -->
        <div class="sidebar">
            <!-- Sidebar user panel (optional) -->
            <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                <div class="image">
                    <img src="{{ asset('/img/users/' . $user->pfp) }}" class="img-circle elevation-2" alt="User Image">
                </div>
                <div class="info">
                    <a href="#" class="d-block text-capitalize">{{ $user->name }}</a>
                </div>
            </div>

            <!-- SidebarSearch Form -->
            <div class="form-inline">
                <div class="input-group" data-widget="sidebar-search">
                    <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
                    <div class="input-group-append">
                        <button class="btn btn-sidebar">
                            <i class="fas fa-search fa-fw"></i>
                        </button>
                    </div>
                </div>
            </div>

            <!-- Sidebar Menu -->
            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column nav-child-indent" data-widget="treeview" role="menu" data-accordion="false">
                    <!-- Add icons to the links using the .nav-icon class
                        with font-awesome or any other icon font library -->
                    <li class="nav-item">
                        <a href="dashboard" class="nav-link">
                            <i class="nav-icon fas fa-tachometer-alt"></i>
                            <p>Dashboard</p>
                        </a>
                    </li>
                    
                    <!-- IT & Support -->
                    <li class="nav-header">IT & Support</li>
                    <li class="nav-item">
                        <a href="dashboard" class="nav-link">
                            <i class="nav-icon fas fa-headset"></i>
                            <p>IT Helpdesk</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-signal"></i>
                            <p>System Status
                                <i class="fas fa-angle-left right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Service Outages</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Maintenance Schedule</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-tools"></i>
                            <p>Software & Tools
                                <i class="fas fa-angle-left right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Software Downloads</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Tool Guides & Tutorials</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-lock"></i>
                            <p>Data Security
                                <i class="fas fa-angle-left right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Cybersecurity Training</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Data Protection Policies</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Incident Reporting</p>
                                </a>
                            </li>
                        </ul>
                    </li>

                    <!-- Admin Panel -->
                    @if(canAccess('user-management') || canAccess('role-management') || canAccess('permission-management') || canAccess('user-activity-reports') || canAccess('content-engagement-metrics'))
                        <li class="nav-header">Admin Panel</li>
                        @if(canAccess('user-management') || canAccess('role-management') || canAccess('permission-management'))
                            <li class="nav-item">
                                <a href="#" class="nav-link">
                                    <i class="nav-icon fas fa-user"></i>
                                    <p>User Management
                                        <i class="fas fa-angle-left right"></i>
                                    </p>
                                </a>
                                <ul class="nav nav-treeview">
                                    @canAccess('user-management')
                                    <li class="nav-item">
                                        <a href="user-management" class="nav-link">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Users</p>
                                        </a>
                                    </li>
                                    @endcanAccess
                                    @canAccess('role-management')
                                    <li class="nav-item">
                                        <a href="role-management" class="nav-link">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Roles</p>
                                        </a>
                                    </li>
                                    @endcanAccess
                                    @canAccess('permission-management')
                                    <li class="nav-item">
                                        <a href="permission-management" class="nav-link">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Permissions</p>
                                        </a>
                                    </li>
                                    @endcanAccess
                                </ul>
                            </li>
                        @endif
                        @if(canAccess('user-activity-reports') || canAccess('content-engagement-metrics'))
                            <li class="nav-item">
                                <a href="#" class="nav-link">
                                    <i class="nav-icon fas fa-chart-bar"></i>
                                    <p>User Analytics
                                        <i class="fas fa-angle-left right"></i>
                                    </p>
                                </a>
                                <ul class="nav nav-treeview">
                                    @canAccess('user-activity-reports')
                                    <li class="nav-item">
                                        <a href="user-activity-reports" class="nav-link">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>User Activity Reports</p>
                                        </a>
                                    </li>
                                    @endcanAccess
                                    <li class="nav-item">
                                        <a href="" class="nav-link">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Content Engagement Metrics</p>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                        @endif
                    @endif

                    <!-- Content Moderation Panel -->
                    @if(canAccess('c-about-us') || canAccess('c-people') || canAccess('c-clients'))
                        <li class="nav-header">Content Moderation</li>
                        @canAccess('c-about-us')
                        <li class="nav-item">
                            <a href="c-about-us" class="nav-link">
                                <i class="nav-icon fas fa-question"></i>
                                <p>About Us</p>
                            </a>
                        </li>
                        @endcanAccess
                        @canAccess('c-people')
                        <li class="nav-item">
                            <a href="c-people" class="nav-link">
                                <i class="nav-icon fas fa-user"></i>
                                <p>People</p>
                            </a>
                        </li>
                        @endcanAccess
                        @canAccess('c-clients')
                        <li class="nav-item">
                            <a href="c-clients" class="nav-link">
                                <i class="nav-icon fas fa-handshake"></i>
                                <p>Clients</p>
                            </a>
                        </li>
                        @endcanAccess
                    @endif
                </ul>
            </nav>
            <!-- /.sidebar-menu -->
        </div>
        <!-- /.sidebar -->
    </aside>
    
    @if($user->first_login == "1")
    <div class="modal-backdrop" id="modalBackdrop" style="display: block; opacity: 0.5"></div>
        <div class="modal" id="editClientModal" style="display: block; opacity: 1;">
            <div class="modal-dialog">
                <div class="modal-content">
                    <form action="/change-password" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="modal-header">
                            <h4 class="modal-title">Update your password</h4>
                        </div>
                        <div class="modal-body">
                                <input class="form-control" name="id" value="{{ $user->id }}" hidden required>

                                <p>You need to update your password because this is the first time you are logging in.</p>
                                
                                <label for="name">Current Password:</label>
                                <input class="form-control" type="password" name="current_password" required>

                                <label for="name">New Password:</label>
                                <input class="form-control" type="password" name="new_password" required>

                                <label for="name">Repeat Password:</label>
                                <input class="form-control" type="password" name="repeat_password" required>
                        </div>
                        <div class="modal-footer justify-content-end">
                            <button type="submit" class="btn btn-primary">Change Password</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @endif
