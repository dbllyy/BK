<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Task Management</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="{{ asset('vendors/feather/feather.css') }}">
    <link rel="stylesheet" href="{{ asset('vendors/ti-icons/css/themify-icons.css') }}">
    {{-- <link rel="stylesheet" href="{{ asset('vendors/css/vendor.bundle.base.css') }}"> --}}
    <!-- endinject -->

    <!-- Plugin css for this page -->
    {{-- <link rel="stylesheet" href="{{ asset('vendors/datatables.net-bs4/dataTables.bootstrap4.css') }}"> --}}
    <link rel="stylesheet" href="{{ asset('vendors/ti-icons/css/themify-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('css/datatables.css') }}">
    <!-- End plugin css for this page -->

    <!-- inject:css -->
    <link rel="stylesheet" href="{{ asset('css/vertical-layout-light/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/tablescolor.css') }}">
    {{-- <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css"> --}}
    {{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.21/css/dataTables.bootstrap.min.css"> --}}

    <link href="{{ asset('datatables.min.css') }}" rel="stylesheet">
    <!-- endinject -->

    <link rel="shortcut icon" href="{{ asset('images/logokecil.png') }}">
</head>


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
                            <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                style="display: none;">
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
                                    <h3 class="font-weight-bold">Data Cabang</h3>
                                </div>
                            </div>
                        </div>
                    </div>

                    <button type="button" class="btn btn-primary btn-custom mb-1" data-toggle="modal"
                        data-target="#tambahBankSoalModal">
                        <i class="fa fa-plus"></i> Tambah Cabang
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
                                    <th scope="col">No. Cabang</th>
                                    <th scope="col">Nama Cabang</th>
                                    <th style="width: 123px;" scope="col">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($cabangs as $cabang)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $cabang->id }}</td>
                                        <td>{{ $cabang->Nama_Cabang }}</td>
                                        <td>
        <button>Aksi</button>

                                            {{-- <a href="{{ route('cabangs.show', $cabang->id) }}">Lihat</a>
                                              <a href="{{ route('cabangs.edit', $cabang->id) }}">Edit</a>
                                              <form action="{{ route('cabangs.destroy', $cabang->id) }}" method="POST" style="display:inline;">
                                                  @csrf
                                                  @method('DELETE')
                                                  <button type="submit">Hapus</button>
                                              </form> --}}
                                        </td>
                                    <tr>
                                @endforeach
{{-- 
<tr>
    <td>1</td>
    <td>CB001</td>
    <td>Cabang Jakarta</td>
    <td>
        <button>Aksi</button>
    </td>
</tr>
<tr>
    <td>2</td>
    <td>CB002</td>
    <td>Cabang Bandung</td>
    <td>
        <button>Aksi</button>
    </td>
</tr>
<tr>
    <td>3</td>
    <td>CB003</td>
    <td>Cabang Surabaya</td>
    <td>
        <button>Aksi</button>
    </td>
</tr>
<tr>
    <td>4</td>
    <td>CB004</td>
    <td>Cabang Medan</td>
    <td>
        <button>Aksi</button>
    </td>
</tr>
<tr>
    <td>5</td>
    <td>CB005</td>
    <td>Cabang Semarang</td>
    <td>
        <button>Aksi</button>
    </td>
</tr>
<tr>
    <td>6</td>
    <td>CB006</td>
    <td>Cabang Makassar</td>
    <td>
        <button>Aksi</button>
    </td>
</tr>
<tr>
    <td>7</td>
    <td>CB007</td>
    <td>Cabang Palembang</td>
    <td>
        <button>Aksi</button>
    </td>
</tr>
<tr>
    <td>8</td>
    <td>CB008</td>
    <td>Cabang Bekasi</td>
    <td>
        <button>Aksi</button>
    </td>
</tr>
<tr>
    <td>9</td>
    <td>CB009</td>
    <td>Cabang Depok</td>
    <td>
        <button>Aksi</button>
    </td>
</tr>
<tr>
    <td>10</td>
    <td>CB010</td>
    <td>Cabang Tangerang</td>
    <td>
        <button>Aksi</button>
    </td>
</tr>
<tr>
    <td>11</td>
    <td>CB011</td>
    <td>Cabang Bogor</td>
    <td>
        <button>Aksi</button>
    </td>
</tr>
<tr>
    <td>12</td>
    <td>CB012</td>
    <td>Cabang Malang</td>
    <td>
        <button>Aksi</button>
    </td>
</tr>
<tr>
    <td>13</td>
    <td>CB013</td>
    <td>Cabang Batam</td>
    <td>
        <button>Aksi</button>
    </td>
</tr>
<tr>
    <td>14</td>
    <td>CB014</td>
    <td>Cabang Yogyakarta</td>
    <td>
        <button>Aksi</button>
    </td>
</tr>
<tr>
    <td>15</td>
    <td>CB015</td>
    <td>Cabang Solo</td>
    <td>
        <button>Aksi</button>
    </td>
</tr>
<tr>
    <td>16</td>
    <td>CB016</td>
    <td>Cabang Balikpapan</td>
    <td>
        <button>Aksi</button>
    </td>
</tr>
<tr>
    <td>17</td>
    <td>CB017</td>
    <td>Cabang Banjarmasin</td>
    <td>
        <button>Aksi</button>
    </td>
</tr>
<tr>
    <td>18</td>
    <td>CB018</td>
    <td>Cabang Pontianak</td>
    <td>
        <button>Aksi</button>
    </td>
</tr>
<tr>
    <td>19</td>
    <td>CB019</td>
    <td>Cabang Denpasar</td>
    <td>
        <button>Aksi</button>
    </td>
</tr>
<tr>
    <td>20</td>
    <td>CB020</td>
    <td>Cabang Banda Aceh</td>
    <td>
        <button>Aksi</button>
    </td>
</tr>
<tr>
    <td>21</td>
    <td>CB021</td>
    <td>Cabang Manado</td>
    <td>
        <button>Aksi</button>
    </td>
</tr>
<tr>
    <td>22</td>
    <td>CB022</td>
    <td>Cabang Padang</td>
    <td>
        <button>Aksi</button>
    </td>
</tr>
<tr>
    <td>23</td>
    <td>CB023</td>
    <td>Cabang Samarinda</td>
    <td>
        <button>Aksi</button>
    </td>
</tr>
<tr>
    <td>24</td>
    <td>CB024</td>
    <td>Cabang Palu</td>
    <td>
        <button>Aksi</button>
    </td>
</tr>
<tr>
    <td>25</td>
    <td>CB025</td>
    <td>Cabang Jayapura</td>
    <td>
        <button>Aksi</button>
    </td>
</tr>
<tr>
    <td>26</td>
    <td>CB026</td>
    <td>Cabang Kupang</td>
    <td>
        <button>Aksi</button>
    </td>
</tr>
<tr>
    <td>27</td>
    <td>CB027</td>
    <td>Cabang Cirebon</td>
    <td>
        <button>Aksi</button>
    </td>
</tr>
<tr>
    <td>28</td>
    <td>CB028</td>
    <td>Cabang Pekanbaru</td>
    <td>
        <button>Aksi</button>
    </td>
</tr>
<tr>
    <td>29</td>
    <td>CB029</td>
    <td>Cabang Mataram</td>
    <td>
        <button>Aksi</button>
    </td>
</tr>
<tr>
    <td>30</td>
    <td>CB030</td>
    <td>Cabang Serang</td>
    <td>
        <button>Aksi</button>
    </td>
</tr> --}}
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
            
            <script src="{{ asset('js/jquery-3.2.1.min.js') }}"></script>
            <script src="{{ asset('vendors/js/vendor.bundle.base.js') }}"></script>
            <!-- endinject -->
            

            <!-- Plugin js for this page -->
            <script src="{{ asset('vendors/chart.js/Chart.min.js') }}"></script>
            
            {{-- <script src="{{ asset('vendors/datatables.net/jquery.dataTables.js') }}"></script> --}}
            {{-- <script src="{{ asset('vendors/datatables.net-bs4/dataTables.bootstrap4.js') }}"></script> --}}
            {{-- <script src="{{ asset('js/dataTables.select.min.js') }}"></script> --}}
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
            {{-- <script src="{{ asset('js/htaccsess.js') }}"></script> --}}
            {{-- <script src="{{ asset('js/datatables.min.js') }}"></script> --}}
            {{-- <script src="{{ asset('js/bootstrap-table.js') }}"></script> --}}
            <script src="{{ asset('js/datatables.js') }}"></script>
            {{-- <script src="{{ asset('js/jquery.dataTables.min.js') }}"></script> --}}
            {{-- <script src="{{ asset('js/dataTables.bootstrap.min.js') }}"></script> --}}

            

 {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.21/js/jquery.dataTables.min.js"></script> --}}
            {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.21/js/dataTables.bootstrap4.min.js"></script> --}}

{{-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> --}}

<!-- JS DataTables -->
{{-- <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script> --}}

           
           
            <!-- End custom js for this page-->
            {{-- <script>
                $('#sampleTable').DataTable({
                    
                    columnDefs: [{
                        "defaultContent": "",
                        "targets": "_all"
                    }]
                });
            </script> --}}
            
<script>
$(document).ready(function() {
    $('#sampleTable').DataTable();
});
</script>


            <script type="text/javascript">
                $('#sampleTable').DataTable();
            </script>

</body>

</html>
