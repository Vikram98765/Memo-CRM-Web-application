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
 <h1 class="h3 mb-2 text-gray-800">Customers Details</h1>

 <!-- DataTales Example -->
 <div class="card shadow mb-4">
     <div class="card-header py-3">
         <h6 class="m-0 font-weight-bold text-primary">Customer Information</h6>
         {{-- <div class="box">This is a css block</dxiv> --}}
     </div>
     <div class="card-body">
        @if($editing ??false)


        <form  method="post" action="{{Route('customer_update',$id->id)}}">
            @csrf
            @method('put')
            <div class="form-group row">
                <div class="col-sm-6 mb-3 mb-sm-0">
                    <input type="text" class="form-control form-control-user"
                        id="customerid" placeholder="Customer Id" name="customer_id" value="{{$id->customer_id}}">
                        @error('customerid')
                        <span class="d-block fs-6 text-danger mt-2"> {{ $message }} </span>
                    @enderror
                </div>
                <div class="col-sm-6">
                    <input type="text" class="form-control form-control-user"
                        id="cumtomername" placeholder="Cumtomer Name" name="customer_name" value="{{$id->customer_name}}">
                        @error('cumtomername')
                        <span class="d-block fs-6 text-danger mt-2"> {{ $message }} </span>
                    @enderror
                </div>
            </div>
            <div class="form-group row">
                <div class="col-sm-6 mb-3 mb-sm-0">
                    <input type="text" class="form-control form-control-user"
                        id="exampleRepeatContact1" placeholder="Contact1" name="contact" value="{{$id->contact}}">
                        @error('contact1')
                        <span class="d-block fs-6 text-danger mt-2"> {{ $message }} </span>
                    @enderror
                </div>
                <div class="col-sm-6">
                    <input type="text" class="form-control form-control-user"
                        id="exampleRepeatContact2" placeholder="Whatsapp No." name="whatsapp" value="{{$id->whatsapp}}">
                        @error('contact2')
                        <span class="d-block fs-6 text-danger mt-2"> {{ $message }} </span>
                    @enderror
                </div>
            </div>

            {{-- <div class="form-group">
                <input type="email" class="form-control form-control-user"
                    id="exampleInputEmail" placeholder="Email Address" name="email">
                    @error('email')
                    <span class="d-block fs-6 text-danger mt-2"> {{ $message }} </span>
                @enderror
            </div> --}}
            <div class="form-group row">
                <div class="col-sm-6 mb-3 mb-sm-0">
                    <input type="email" class="form-control form-control-user"
                    id="exampleInputEmail" placeholder="Email Address" name="email" value="{{$id->email}}">
                    @error('email')
                    <span class="d-block fs-6 text-danger mt-2"> {{ $message }} </span>
                @enderror
                </div>
                <div class="col-sm-6">
                    <input type="text" class="form-control form-control-user"
                        id="gstin" placeholder="GSTIN NO" name="gstinno" value="{{$id->gstinno}}">
                        @error('gstin')
                        <span class="d-block fs-6 text-danger mt-2"> {{ $message }} </span>
                    @enderror
                </div>
            </div>

            <div class="form-group row">
                <div class="col-sm-6 mb-3 mb-sm-0">
                    <input type="text" class="form-control form-control-user"
                    id="address" placeholder="Address" name="address" value="{{$id->address}}">
                    @error('address')
                    <span class="d-block fs-6 text-danger mt-2"> {{ $message }} </span>
                @enderror
                </div>
                <div class="col-sm-6">
                    <input type="text" class="form-control form-control-user"
                        id="refe" placeholder="Reference" name="reference" value="{{$id->reference}}">
                        @error('cumtomername')
                        <span class="d-block fs-6 text-danger mt-2"> {{ $message }} </span>
                    @enderror
                </div>
            </div>


            <div class="form-group row">
            </div>
            <button type="submit" class="btn btn-primary btn-user btn-block" name="submit2">
                Submit
            </button>
            <hr>

        </form>
        @endif
     </div>
 </div>



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
