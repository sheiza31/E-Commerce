<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Dashboard</title>

    <!-- Custom fonts for this template-->
    <link href="{{asset('theme-dashboard/vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.1/css/all.min.css" integrity="sha512-5Hs3dF2AEPkpNAR7UiOHba+lRSJNeM2ECkwxUIxC1Q/FLycGTbNapWXB4tP889k5T5Ju8fs4b1P5z/iB4nMfSQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Custom styles for this template-->
    <link href="{{asset('theme-dashboard/css/sb-admin-2.min.css')}}" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css" rel="stylesheet">
</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <x-sidebar />
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Topbar Search -->
                    <form method = "get"action="{{ route('search.users') }}"
                        class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                        @csrf
                        <div class="input-group">
                            <input type="text"name="search" class="form-control bg-light border-0 small" placeholder=""
                                aria-label="Search" aria-describedby="basic-addon2">
                            <div class="input-group-append">
                                <button class="btn btn-primary" type="button">
                                    <i class="fas fa-search fa-sm"></i>
                                </button>
                            </div>
                        </div>
                    </form>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                        <li class="nav-item dropdown no-arrow d-sm-none">
                            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-search fa-fw"></i>
                            </a>
                            <!-- Dropdown - Messages -->
                            <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
                                aria-labelledby="searchDropdown">
                                <form method ="get"action = "{{ route('search.users') }}" class="form-inline mr-auto w-100 navbar-search">
                                    @csrf
                                    <div class="input-group">
                                        <input type="text"name="search" class="form-control bg-light border-0 small"
                                            placeholder="Search for..." aria-label="Search"
                                            aria-describedby="basic-addon2">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary" type="button">
                                                <i class="fas fa-search fa-sm"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </li>
                      <x-navbar />
                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Users</h1>
                        <div>
                            <button class = "btn btn-primary" onclick="downloadAndRedirect()">Generate Report</button>                  
                        </div>
                         </div>

                    <div class="row">

                        <!-- Area Chart -->
                        <div class="col-xl-8 col-lg-7">
                            <table class = "table text-center">
                                <thead>
                                    <th>No</th>
                                    <th>Username</th>
                                    <th>Email</th>
                                    <th>Password</th>
                                    <th>Role</th>
                                    <th>Alamat</th>
                                    <th>No Telpon</th>
                                    <th>Actions</th>
                                </thead>
                                      @foreach($users as $data)
                                <tbody>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{ $data->username }}</td>
                                    <td>{{ $data->email }}</td>
                                    <td>{{ $data->password }}</td>
                                    <td>{{ $data->roles }}</td>
                                    <td>{{ $data->address }}</td>
                                    <td>{{  $data->telp }}</td>
                                    <td>
                                        <button class = "btn btn-link"><a href="{{ route('users.edit',$data->id) }}">Edit</a></button>
                                        <form action="{{ route('users.destroy',$data->id) }}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button class = "btn btn-link" type = "submit">Delete</button>
                                        </form>
                                    </td>
                                    @endforeach 
                                </tbody>
                            </table>
                        </div>

                        <!-- Pie Chart -->
                        <div class="col-xl-4 col-lg-5">
                            <h4>Form Users</h4>
                            <form action="{{ route('users.store') }}" method="post"enctype="multipart/form-data">
                                @csrf
                                <label class = "" for="">Username :</label>
                                <br>
                                <input class = "form-control @error('username') is-invalid @enderror" type="text"name="username">
                                <br>
                                <label for="">Email :</label>
                                <br>
                                <input class = "@error('email') is-invalid @enderror form-control" type="email"name="email" id="exampleFormControlInput1">
                                <br>
                                <label for="">Password :</label>
                                <br>
                                <input class = "@error('password') is-invalid @enderror form-control" type="text"name="password">
                                <br>
                                <label for="">Address :</label>
                                <br>
                                <input class = "form-control" type="text"name="address"value="">
                                <br>
                                <label for="">Telp :</label>
                                <br>
                                <input class = "form-control" type="telp"name="telp"value="">
                                <br>
                                <label for="">Role :</label>
                                <br>
                               <input type="radio"name="role_id"value="admin"> admin
                               <input type="radio" name="role_id"value="user" id=""> user
                               <br><br>
                               <button class = "btn btn-primary" type = "submit">Save</button>
                            </form>
                        </div>
                    </div>

                    <!-- Content Row -->
                  

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer --
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="{{ route('logout') }}">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="{{asset('theme-dashboard/vendor/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('theme-dashboard/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

    <!-- Core plugin JavaScript-->
    <script src="{{asset('theme-dashboard/vendor/jquery-easing/jquery.easing.min.js')}}"></script>

    <!-- Custom scripts for all pages-->
    <script src="{{asset('theme-dashboard/js/sb-admin-2.min.js')}}"></script>

    <!-- Page level plugins -->
    <script src="{{asset('theme-dashboard/vendor/chart.js/Chart.min.js')}}"></script>

    <!-- Page level custom scripts -->
    <script src="{{asset('theme-dashboard/js/demo/chart-area-demo.js')}}"></script>
    <script src="{{asset('theme-dashboard/js/demo/chart-pie-demo.js')}}"></script>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
    @if (session('success'))
        Swal.fire({
            icon: 'success',
            title: 'Berhasil!',
            text: "{{ session('success') }}",
            showConfirmButton: true,
            timer: 3000
        });
    @endif
</script>
<script>
    function downloadAndRedirect() {
        // Trigger download
        const downloadUrl = "{{ route('report.users') }}";
        window.location.href = downloadUrl;

        // Redirect ke dashboard setelah unduhan selesai (dengan sedikit delay)
        setTimeout(() => {
            window.location.href = "{{ route('dashboard') }}";
        }, 2000); // Waktu tunggu agar unduhan selesai
    }
</script>

</body>

</html>