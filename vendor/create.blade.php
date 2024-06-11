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
 <h1 class="h3 mb-2 text-gray-800">New Vendor</h1>

 <!-- DataTales Example -->
 <div class="card shadow mb-4">
     <div class="card-header py-3">
         <h6 class="m-0 font-weight-bold text-primary">Fill the below details</h6>
         {{-- <div class="box">This is a css block</dxiv> --}}
     </div>
     <div class="card-body">
        @if($editing ?? false)
        <form class="user" method="post" action="{{Route('vendors_update',$vendor->id)}}">
            @csrf
            @method('put')
            <div class="form-group row">
                {{-- <div class="col-sm-6 mb-3 mb-sm-0">
                    <input type="text" class="form-control form-control-user"
                        id="customerid" placeholder="Customer Id" name="customerid">
                        @error('customerid')
                        <span class="d-block fs-6 text-danger mt-2"> {{ $message }} </span>
                    @enderror
                </div> --}}
                <div class="col-sm-6">
                    <label for="">Vendor Name</label>
                    <input type="text" class="form-control form-control-user"
                        id="vendorname" placeholder="Cumtomer Name" name="vendor_name"value="{{$vendor->vendor_name}}">
                        @error('vendorname')
                        <span class="d-block fs-6 text-danger mt-2"> {{ $message }} </span>
                    @enderror
                </div>
                <div class="col-sm-6 mb-3 mb-sm-0">
                    <label for="">Contact</label>
                    <input type="text" class="form-control form-control-user"
                        id="exampleRepeatContact1" placeholder="contact" name="contact" value="{{$vendor->contact}}">
                        @error('contact')
                        <span class="d-block fs-6 text-danger mt-2"> {{ $message }} </span>
                    @enderror
                </div>
            </div>
            <div class="form-group row">

                <div class="col-sm-6">
                    <label for="">GSTIN no.</label>
                    <input type="text" class="form-control form-control-user"
                        id="gstin" placeholder="GSTIN NO" name="gstinno" value="{{$vendor->gstinno}}">
                        @error('gstin')
                        <span class="d-block fs-6 text-danger mt-2"> {{ $message }} </span>
                    @enderror
                </div>
                <div class="col-sm-6 mb-3 mb-sm-0">
                    <label for="">Email</label>
                    <input type="email" class="form-control form-control-user"
                    id="exampleInputEmail" placeholder="Email Address" name="email" value="{{$vendor->email}}">
                    @error('email')
                    <span class="d-block fs-6 text-danger mt-2"> {{ $message }} </span>
                @enderror
                </div>
                {{-- <div class="col-sm-6">
                    <input type="text" class="form-control form-control-user"
                        id="exampleRepeatContact2" placeholder="Whatsapp No." name="whatsapp">
                        @error('contact2')
                        <span class="d-block fs-6 text-danger mt-2"> {{ $message }} </span>
                    @enderror
                </div> --}}
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
                    <label for="">Address</label>
                    <input type="text" class="form-control form-control-user"
                    id="address" placeholder="Address" name="address" value="{{$vendor->address}}">
                    @error('address')
                    <span class="d-block fs-6 text-danger mt-2"> {{ $message }} </span>
                @enderror
                </div>
                <div class="col-sm-6 mb-3 mb-sm-0">
                    <label for="">Update details  by clicking below</label>
                    <button type="submit" class="btn btn-success btn-user btn-block" name="submit">
                        Update
                    </button>
                </div>
            </div>

            <div class="form-group row">

                {{-- <div class="col-sm-6">
                    <input type="text" class="form-control form-control-user"
                        id="refe" placeholder="Reference" name="refe">
                        @error('cumtomername')
                        <span class="d-block fs-6 text-danger mt-2"> {{ $message }} </span>
                    @enderror
                </div> --}}
            </div>


            <div class="form-group row">
            </div>

            <hr>

        </form>
        @else
        <form class="user" method="post" action="{{Route('vendors_store')}}">
            @csrf
            @method('post')
            <div class="form-group row">
                {{-- <div class="col-sm-6 mb-3 mb-sm-0">
                    <input type="text" class="form-control form-control-user"
                        id="customerid" placeholder="Customer Id" name="customerid">
                        @error('customerid')
                        <span class="d-block fs-6 text-danger mt-2"> {{ $message }} </span>
                    @enderror
                </div> --}}
                <div class="col-sm-6">
                    <label for="">Vendor Name</label>
                    <input type="text" class="form-control form-control-user"
                        id="vendorname" placeholder="Cumtomer Name" name="vendor_name">
                        @error('vendorname')
                        <span class="d-block fs-6 text-danger mt-2"> {{ $message }} </span>
                    @enderror
                </div>
                <div class="col-sm-6 mb-3 mb-sm-0">
                    <label for="">Contact</label>
                    <input type="text" class="form-control form-control-user"
                        id="exampleRepeatContact1" placeholder="contact" name="contact">
                        @error('contact')
                        <span class="d-block fs-6 text-danger mt-2"> {{ $message }} </span>
                    @enderror
                </div>
            </div>
            <div class="form-group row">

                <div class="col-sm-6">
                    <label for="">GSTIN no.</label>
                    <input type="text" class="form-control form-control-user"
                        id="gstin" placeholder="GSTIN NO" name="gstinno">
                        @error('gstin')
                        <span class="d-block fs-6 text-danger mt-2"> {{ $message }} </span>
                    @enderror
                </div>
                <div class="col-sm-6 mb-3 mb-sm-0">
                    <label for="">Email</label>
                    <input type="email" class="form-control form-control-user"
                    id="exampleInputEmail" placeholder="Email Address" name="email">
                    @error('email')
                    <span class="d-block fs-6 text-danger mt-2"> {{ $message }} </span>
                @enderror
                </div>
                {{-- <div class="col-sm-6">
                    <input type="text" class="form-control form-control-user"
                        id="exampleRepeatContact2" placeholder="Whatsapp No." name="whatsapp">
                        @error('contact2')
                        <span class="d-block fs-6 text-danger mt-2"> {{ $message }} </span>
                    @enderror
                </div> --}}
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
                    <label for="">Address</label>
                    <input type="text" class="form-control form-control-user"
                    id="address" placeholder="Address" name="address">
                    @error('address')
                    <span class="d-block fs-6 text-danger mt-2"> {{ $message }} </span>
                @enderror
                </div>
                <div class="col-sm-6 mb-3 mb-sm-0">
                    <label for="">Submit details  by clicking below</label>
                    <button type="submit" class="btn btn-success btn-user btn-block" name="submit">
                        Save
                    </button>
                </div>
            </div>

            <div class="form-group row">

                {{-- <div class="col-sm-6">
                    <input type="text" class="form-control form-control-user"
                        id="refe" placeholder="Reference" name="refe">
                        @error('cumtomername')
                        <span class="d-block fs-6 text-danger mt-2"> {{ $message }} </span>
                    @enderror
                </div> --}}
            </div>


            <div class="form-group row">
            </div>

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
