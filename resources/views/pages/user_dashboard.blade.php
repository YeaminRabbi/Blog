
@extends('layouts.user_layout')
@section('content')
            <!-- ============================================================== -->
            <!-- Start Page Content here -->
            <!-- ============================================================== -->

            <div class="content-page">
                <div class="content">

                    <!-- Start Content-->
                    <div class="container-fluid">

                        <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box">
                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">


                                        </ol>
                                    </div>
                                    <h4 class="page-title">User Dashboard</h4>

                                </div>
                            </div>
                        </div>
                        <!-- end page title -->


                        <div class="row">

                            <div class="col-xl-3 col-sm-6">
                                <div class="card-box widget-box-two widget-two-custom">
                                    <div class="media">
                                        <div class="align-self-center">
                                            <img src="{{asset('anotherassets/images/users.png')}}" alt="">
                                        </div>

                                        <div class="wigdet-two-content media-body">
                                            <p class="m-0 text-uppercase font-weight-medium text-truncate" title="Statistics">Total Users</p>
                                            <h3 class="font-weight-medium my-2"><span data-plugin="counterup">{{$total_users}}</span></h3>

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- end col -->
                            <div class="col-xl-3 col-sm-6">
                                <div class="card-box widget-box-two widget-two-custom ">
                                    <div class="media">
                                        <div class="align-self-center">
                                            <img src="{{asset('anotherassets/images/blog.png')}}" alt="">
                                        </div>

                                        <div class="wigdet-two-content media-body">
                                            <p class="m-0 text-uppercase font-weight-medium text-truncate" title="Statistics">Total Blogs</p>
                                            <h3 class="font-weight-medium my-2"> <span data-plugin="counterup">{{ $total_blogs }}</span></h3>

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- end col -->

                            <div class="col-xl-3 col-sm-6">
                                <div class="card-box widget-box-two widget-two-custom ">
                                    <div class="media">
                                        <div class="align-self-center">
                                            <img src="{{asset('anotherassets/images/blog.png')}}" alt="">
                                        </div>

                                        <div class="wigdet-two-content media-body">
                                            <p class="m-0 text-uppercase font-weight-medium text-truncate" title="Statistics">Total Blogs Accepted</p>
                                            <h3 class="font-weight-medium my-2"> <span data-plugin="counterup">{{ $accepted_blogs }}</span></h3>

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- end col -->

                            <div class="col-xl-3 col-sm-6">
                                <div class="card-box widget-box-two widget-two-custom ">
                                    <div class="media">
                                        <div class="align-self-center">
                                            <img src="{{asset('anotherassets/images/blog.png')}}" alt="">
                                        </div>

                                        <div class="wigdet-two-content media-body">
                                            <p class="m-0 text-uppercase font-weight-medium text-truncate" title="Statistics">Total Blogs Pending</p>
                                            <h3 class="font-weight-medium my-2"><span data-plugin="counterup">{{$pending_blogs}}</span></h3>

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- end col -->


                        </div>
                        <!-- end row -->

                        </div>
                        <!-- end row -->


                        <!--- end row -->

                    </div> <!-- end container-fluid -->

                </div> <!-- end content -->



                    </div> <!-- end container-fluid -->

                </div> <!-- end content -->
                {{-- @if (Route::has('login'))
                <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
                    @auth
                        <a href="{{ url('/home') }}" class="text-sm text-gray-700 underline">Home</a>

                        <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="text-sm text-gray-700 underline">logout</a>
                        <form id="logout-form" action="{{route('logout')}}" method="POST" style="display: none;">
                        @csrf
                       </form>
                    @else
                        <a href="{{ route('login') }}" class="text-sm text-gray-700 underline">Log in</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 underline">Register</a>
                        @endif
                    @endauth
                </div>
                @endif --}}



                <!-- Footer Start -->
                <footer class="footer">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-12">
                                2020-2021 &copy; All Rights Reserved By <a href="{{route('admin.dashboard')}}">Salahuddin IT</a>
                            </div>
                        </div>
                    </div>
                </footer>
                <!-- end Footer -->

            </div>

            <!-- ============================================================== -->
            <!-- End Page content -->
            <!-- ============================================================== -->

        </div>
        <!-- END wrapper -->

@endsection



