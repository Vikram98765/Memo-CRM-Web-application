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
                    <h1 class="h3 mb-2 text-gray-800">Profile</h1>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4 ">


                        <div class="border border-2 m-3 p-3">
                            <form class="row g-3" action="{{ Route('update_profiles', $profile->id) }}"
                                enctype="multipart/form-data" method="POST">
                                @csrf
                                @method('put')
                                <div class="container-fluid">
                                    <div class="row">
                                        <div class="col-md-4 mb-3">
                                            <label for="inputEmail4" class="form-label"><b>Company Name <span
                                                        class="text-danger">*</span></b></label>
                                            <input type="text" class="form-control" id="companyname" name="company_name"
                                                value="{{ $profile->company_name }}">
                                        </div>
                                        <div class="col-md-8">
                                            <label for="inputPassword4" class="form-label"><b>Address <span
                                                        class="text-danger">*</span></b></label>
                                            <input type="text" class="form-control" id="address" name="address"
                                                value="{{ $profile->address }}">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-4 mb-3">
                                            <label for="inputAddress" class="form-label"><b>Mobile No.<span
                                                        class="text-danger">*</span></b></label>
                                            <input type="text" class="form-control" id="mobile" name="mobile"
                                                value="{{ $profile->mobile }}">
                                        </div>
                                        <div class="col-4">
                                            <label for="inputAddress" class="form-label"><b>Alternate Mobile No.</b></label>
                                            <input type="text" class="form-control" id="mobile2" name="mobile2"
                                                value="{{ $profile->mobile2 }}">
                                        </div>
                                        <div class="col-4">
                                            <label for="inputAddress" class="form-label"><b>LandLine No.</b></label>
                                            <input type="text" class="form-control" id="landline" name="landline"
                                                value="{{ $profile->landline }}">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-4 mb-4">
                                            <label for="inputAddress2" class="form-label"><b>Email</b></label>
                                            <input type="email" class="form-control" id="email" name="email"
                                                value="{{ $profile->email }}">
                                        </div>
                                        <div class="col-md-4">
                                            <label for="inputCity" class="form-label"><b>Website</b></label>
                                            <input type="text" class="form-control" id="website" name="website"
                                                value="{{ $profile->website }}">
                                        </div>
                                        <div class="col-md-4">
                                            <label for="current_logo" class="form-label"><b>Current Logo</b></label><br>
                                             <label for="image">Choose Image:</label>
                                             <input type="file" name="current_logo" id="currentlogo">
                                            <img src="{{ asset($profile->current_logo) }}" width="50px" alt="">


                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-md-3 mb-3">
                                            <label for="inputZip" class="form-label"><b>Customer Prefix<span
                                                        class="text-danger">*</span></b><span> (for customer
                                                    series)</span></label>
                                            <input type="text" class="form-control" id="customerprefix"
                                                name="customer_prefix" value="{{ $profile->customer_prefix }}">
                                        </div>
                                        <div class="col-md-3">
                                            <label for="inputZip" class="form-label"><b>Invoice Prefix<span
                                                        class="text-danger">*</span></b><span> (for customer
                                                    series)</span></label>
                                            <input type="text" class="form-control" id="invoiceprefix"
                                                name="invoice_prefix" value="{{ $profile->invoice_prefix }}">
                                        </div>
                                        <div class="col-md-3">
                                            <label for="inputZip" class="form-label"><b>GSTIN No.</b></label>
                                            <input type="text" class="form-control" id="gstinno" name="gstinno"
                                                value="gstinno" value="{{ $profile->invoice_prefix }}">
                                        </div>
                                        <div class="col-md-3">
                                            <label for="inputZip" class="form-label"><b>PAN No.</b></label>
                                            <input type="text" class="form-control" id="panno" name="panno"
                                                value="{{ $profile->pan_no }}">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-3">
                                            <label for="inputZip" class="form-label"><b>Bank Account No.</b></label>
                                            <input type="text" class="form-control" id="bankaccno" name="bankaccno"
                                                value="{{ $profile->bankaccno }}">
                                        </div>
                                        <div class="col-md-3">
                                            <label for="inputZip" class="form-label"><b>Bank Name</b></label>
                                            <input type="text" class="form-control" id="bankname" name="bankname"
                                                value="{{ $profile->bankname }}">
                                        </div>
                                        <div class="col-md-3">
                                            <label for="inputZip" class="form-label"><b>Bank IFSC Code</b></label>
                                            <input type="text" class="form-control" id="ifsc" name="ifsc"
                                                value="{{ $profile->ifsc }}">
                                        </div>
                                        <div class="col-md-3 text-center">
                                            <label for="qr" class="form-label"><b>QR for Scan</b></label><br>
                                             <input type="file" name="qr" id="qr" >
                                            <img src="{{ asset($profile->qr) }}" width="50px" alt="">


                                        </div>
                                    </div>
                                    <div class="row">

                                        <div class="col-md-3">
                                            <p class="p-2"></p>
                                            {{-- <a href="#" class="btn btn-success px-5"> Update</a> --}}
                                            <button type="submit" class="btn btn-success" name="submit"> Update</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
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
