@extends('layout.app')


@section('title', 'Dashboard')

@section('content')
    <!-- Page Wrapper -->
    <div id="wrapper">

       @include('shared.sidebar')

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                @include('shared.navbar')
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->


                    {{-- <div class="content"> --}}
                        {{-- <div class="row"> --}}
                            <div class="box  rounded">
                                <ol class="breadcrumb">
                                  <li class="breadcrumb-item active " aria-current="page">Dashboard</li>
                                </ol>
                              </div>
                        {{-- </div> --}}

                        <div class="dashrow my-3 ">
                          <div class="row">
                            <div class="col col-lg-3 col-md-3 col-sm-6 col-12">
                              <div class="card dcard1 " style="max-width: 18rem;">
                                <h6 class="p-4 pt-4  text-light">{{$cus_count}} customers !<i class="fa-solid fa-comments msgicon"></i></h6>

                                <a href="{{ route('show_customers') }}" class="text-light ps-2 vbtn float-start" ><div class="card-body p-3 ">
                                  View details <i class=" vbtnang fa-solid fa-angle-right float-end p-2" style="color: #ffffff;"></i>
                                </div></a>
                              </div>
                            </div>
                            <div class="col col-lg-3 col-md-3 col-sm-6 col-12">
                              <div class="card dcard2" style="max-width: 18rem;">
                                <h6 class="p-4 pt-4  text-light">{{$inv_count}} Invoices !<i class="fa-solid fa-list msgicon"></i></h6>

                                <a href="{{route('index_invoice')}}" class="text-light ps-2 vbtn" ><div class="card-body p-3 ">
                                  View details <i class=" vbtnang fa-solid fa-angle-right float-end p-2" style="color: #ffffff;"></i>
                                </div></a>
                              </div>
                            </div>
                            <div class="col col-lg-3 col-md-3 col-sm-6 col-12">
                              <div class="card dcard3" style="max-width: 18rem;">
                                <h6 class="p-4 pt-4  text-light">0 WorkOrders !<i class="fa-solid fa-shopping-cart msgicon"></i></h6>

                                <a href="#" class="text-light ps-2 vbtn" ><div class="card-body p-3 ">
                                  View details <i class=" vbtnang fa-solid fa-angle-right float-end p-2" style="color: #ffffff;"></i>
                                </div></a>
                              </div>
                            </div>
                            <div class="col col-lg-3 col-md-3 col-sm-6 col-12">
                              <div class="card dcard4" style="max-width: 18rem;">
                                <h6 class="p-4 pt-4  text-light">{{$ven_count}} Vendors<i class="fa-solid  fa-life-ring"></i></i></h6>

                                <a href="vendors.html" class="text-light ps-2 vbtn" ><div class="card-body p-3 ">
                                  View details <i class=" vbtnang fa-solid fa-angle-right float-end p-2" style="color: #ffffff;"></i>
                                </div></a>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="bottom">
                          <p class="text-center py-3 text-light">Ambe Technologies 2023</p>
                    {{-- </div> --}}
                      </div>

                    <!-- Content Row -->

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Lata Medical Research 2024</span>
                    </div>
                </div>
            </footer>
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
                    <a class="btn btn-primary" href="login.html">Logout</a>
                </div>
            </div>
        </div>
    </div>

@endsection
