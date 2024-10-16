<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Task Management</title>
    <!-- plugins:css -->
    <!-- plugins:css -->
    <link rel="stylesheet" href="{{ asset('vendors/feather/feather.css') }}">
    <link rel="stylesheet" href="{{ asset('vendors/ti-icons/css/themify-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('vendors/css/vendor.bundle.base.css') }}">
    <!-- endinject -->

    <!-- Plugin css for this page -->
    <link rel="stylesheet" href="{{ asset('css/datatables.min.css') }}">
    <!-- End plugin css for this page -->

    <!-- inject:css -->
    <link rel="stylesheet" href="{{ asset('css/vertical-layout-light/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/tablescolor.css') }}">
    <link rel="stylesheet" href="{{ asset('css/button.css') }}">
    <!-- endinject -->
    <link rel="shortcut icon" href="{{ asset('images/logokecil.png') }}">
</head>
<style>

</style>

<body>
    <div class="container-scroller">
        <!-- partial:partials/_navbar.html -->
        <nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
            <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
                <a class="navbar-brand brand-logo mr-5" href="index.html"><img src="images/logo.png" class="mr-2"
                        alt="logo" /></a>
                <a class="navbar-brand brand-logo-mini" href="index.html"><img src="images/logo-mini.png"
                        alt="logo" /></a>
            </div>
            <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
                <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
                    <span class="icon-menu"></span>
                </button>
                <ul class="navbar-nav mr-lg-2">
                    <li class="nav-item nav-search d-none d-lg-block">
                        <div class="input-group">
                            <div class="input-group-prepend hover-cursor" id="navbar-search-icon">
                                <span class="input-group-text" id="search">
                                    <i class="icon-search"></i>
                                </span>
                            </div>
                            <input type="text" class="form-control" id="navbar-search-input" placeholder="Search now"
                                aria-label="search" aria-describedby="search">
                        </div>
                    </li>
                </ul>
                <ul class="navbar-nav navbar-nav-right">
                    <li class="nav-item nav-profile dropdown">
                        <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" id="profileDropdown">
                            <img src="images/faces/face28.jpg" alt="profile" />
                        </a>
                        <div class="dropdown-menu dropdown-menu-right navbar-dropdown"
                            aria-labelledby="profileDropdown">
                            <a class="dropdown-item">
                                <i class="ti-settings text-primary"></i>
                                Settings
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                            <a class="dropdown-item" href="#"
                                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                <i class="ti-power-off text-primary"></i>
                                Logout
                            </a>
                        </div>
                    </li>
                </ul>
                <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button"
                    data-toggle="offcanvas">
                    <span class="icon-menu"></span>
                </button>
            </div>
        </nav>
        <!-- partial -->
        <div class="container-fluid page-body-wrapper">


            <!-- partial -->
            <!-- partial:partials/_sidebar.html -->
            <nav class="sidebar sidebar-offcanvas" id="sidebar">
                <ul class="nav">
                    <li class="nav-item">
                        <a class="nav-link" href="/dashboard">
                            <i class="icon-grid menu-icon"></i>
                            <span class="menu-title">Dashboard</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/komputer">
                            <i class="ti-desktop menu-icon"></i>
                            <span class="menu-title">Komputer</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/services">
                            <i class="ti-panel menu-icon"></i>
                            <span class="menu-title">Service</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/beritaacara">
                            <i class="ti-notepad menu-icon"></i>
                            <span class="menu-title">Berita Acara</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/cabang">
                            <i class="ti-location-arrow menu-icon"></i>
                            <span class="menu-title">Cabang</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/user">
                            <i class="ti-user menu-icon"></i>
                            <span class="menu-title">User</span>
                        </a>
                    </li>
                </ul>
            </nav>
            <!-- partial -->

            <!-- table -->
            <div class="main-panel">
                <div class="content-wrapper">
                    <div class="row">
                        <div class="col-md-12 grid-margin">
                            <div class="row">
                                <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                                    <h3 class="font-weight-bold">Data User</h3>
                                </div>
                            </div>
                        </div>
                    </div>

                    <button type="button" class="btn btn-primary btn-custom mb-1" data-toggle="modal"
                        data-target="#tambahBankSoalModal">
                        <i class="fa fa-plus"></i> Tambah User
                    </button>
                    <button class="btn btn-outline-primary btn-custom mb-1" type="button"
                        onClick="window.location.reload()">
                        <i class="fa fa-refresh"></i> Refresh
                    </button>


                    <div class="table-responsive">

                        <table class="table table-hover table-bordered" id="sampleTable">
                            <thead>
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Nama Staff</th>
                                    <th scope="col">NIP</th>
                                    <th scope="col">Role</th>
                                    <th style="width: 123px;" scope="col">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $user)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $user->Nama_Staff }}</td>
                                        <td>{{ $user->NIP }}</td>
                                        <td>{{ $user->Role }}</td>
                                        <td>
                                            <a href="{{ route('users.shows', $user->NIP) }}" id="btn-view">Lihat</a>

                                            <a href="{{ route('users.edit', $user->NIP) }}" id="btn-edit">Edit</a>

                                            <form action="{{ route('users.destroy', $user->NIP) }}" method="POST"
                                                style="display:inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" id="btn-delete">Hapus</button>
                                            </form>


                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- end table -->
                <!-- Footer Section -->
                <footer class="footer">
                    <div class="d-sm-flex justify-content-center justify-content-sm-between">
                        <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">
                            Copyright © 2024. Divisi TI
                        </span>
                    </div>
                </footer>
            </div>

            <!-- plugins:js -->
            <script src="{{ asset('vendors/js/vendor.bundle.base.js') }}"></script>
            <!-- endinject -->

            <!-- Plugin js for this page -->
            <script src="{{ asset('vendors/chart.js/Chart.min.js') }}"></script>
            <!-- End plugin js for this page -->

            <!-- inject:js -->
            <script src="{{ asset('js/off-canvas.js') }}"></script>
            <script src="{{ asset('js/hoverable-collapse.js') }}"></script>
            <script src="{{ asset('js/template.js') }}"></script>
            <script src="{{ asset('js/settings.js') }}"></script>
            <script src="{{ asset('js/todolist.js') }}"></script>
            <!-- endinject -->

            <!-- Custom js for this page -->
            <script src="{{ asset('js/dashboard.js') }}"></script>
            <script src="{{ asset('js/Chart.roundedBarCharts.js') }}"></script>
            <script src="{{ asset('js/logout.js') }}"></script>
            <script src="{{ asset('js/htaccsess.js') }}"></script>
            <script src="{{ asset('js/datatables.min.js') }}"></script>


            <script type="text/javascript">
                $('#sampleTable').DataTable();
            </script>

</body>

</html>
