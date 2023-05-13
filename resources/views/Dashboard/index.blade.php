<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin 2 - Dashboard</title>

    <!-- Custom fonts for this template-->
    <link href="{{ asset('/dashboard/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="{{ asset('/dashboard/css/sb-admin-2.min.css') }}" rel="stylesheet">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        @include('Dashboard.Layouts.side-navbar')
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                @include('Dashboard.Layouts.top-navbar')
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">My Profile</h1>
                    </div>
                    <form class="user" action="{{ route('users.profile.update', Auth::user()->id) }}" method="POST">
                        @csrf
                        <div class="form-group row">
                            <div class="col-sm-6 mb-3 mb-sm-0">
                                <input name="name" type="text" class="form-control form-control-user" disabled
                                    style="display: inline" id="name-1" value="{{ Auth::user()->name }}">
                                @error('name')
                                {{ $message }}
                                @enderror
                            </div>
                                <button type="submit" value="" class="btn-circle btn-secandary " 
                                onclick="event.preventDefault();
                                document.getElementById('name-1').disabled=false;
                                document.getElementById('update-btn').disabled=false;
                                this.disabled=true;">
                                    <i class="fas fa-fw fa-wrench"></i>
                                </button>
                        </div>

                        <div class="form-group row">
                            <div class="col-sm-6 mb-3 mb-sm-0">
                                <input name="email" type="email" class="form-control form-control-user" disabled
                                style="display: inline" id="email-1" value="{{ Auth::user()->email }}">
                                @error('email')
                                {{ $message }}
                                @enderror
                            </div>
                                <button id="btn1" type="submit" value="" class="btn-circle btn-secandary " 
                                onclick="event.preventDefault();
                                document.getElementById('email-1').disabled=false;
                                document.getElementById('update-btn').disabled=false;
                                this.disabled=true;">
                                    <i class="fas fa-fw fa-wrench"></i>
                                </button>
                        </div>
                        
                        <div class="form-group row">
                            <div class="col-sm-6 mb-3 mb-sm-0">
                                <input name="password" type="password" class="form-control form-control-user" disabled
                                    id="password-1" placeholder="Password">
                                @error('password')
                                {{ $message }}
                                @enderror
                            </div>
                                <button type="submit" value="" class="btn-circle btn-secandary " 
                                onclick="event.preventDefault();
                                document.getElementById('password-1').disabled=false;
                                document.getElementById('password_confirmation-1').type='password';
                                document.getElementById('update-btn').disabled=false;
                                this.disabled=true;">
                                    <i class="fas fa-fw fa-wrench"></i>
                                </button>
                            <div class="col-sm-6">
                                <input name="password_confirmation" type="hidden"
                                    class="form-control form-control-user" id="password_confirmation-1"
                                    placeholder="Repeat Password">
                            </div>
                            
                        </div>

                        <input id="update-btn" type="submit" class="btn btn-primary btn-user" value="Update Profile" disabled
                        onclick="document.getElementById('name-1').disabled=false;
                        document.getElementById('email-1').disabled=false;
                        document.getElementById('password-1').disabled=false;
                        document.getElementById('password_confirmation-1').type='password';">

                    </form>
                </div>
            </div>
        </div>
    </div>



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
                    <a class="btn btn-primary" href="{{ route('logout') }}" onclick="event.preventDefault();
                     document.getElementById('logout-form').submit();">{{ __('Logout') }}
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </div>
            </div>
        </div>
    </div>


    <!-- Bootstrap core JavaScript-->
    <script src="{{ asset('/dashboard/vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('/dashboard/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

    <!-- Core plugin JavaScript-->
    <script src="{{ asset('/dashboard/vendor/jquery-easing/jquery.easing.min.js') }}"></script>

    <!-- Custom scripts for all pages-->
    <script src="{{ asset('/dashboard/js/sb-admin-2.min.js') }}"></script>

    <!-- Page level plugins -->
    <script src="{{ asset('/dashboard/vendor/chart.js/Chart.min.js') }}"></script>

    <!-- Page level custom scripts -->
    <script src="{{ asset('/dashboard/js/demo/chart-area-demo.js') }}"></script>
    <script src="{{ asset('/dashboard/js/demo/chart-pie-demo.js') }}"></script>

</body>

</html>