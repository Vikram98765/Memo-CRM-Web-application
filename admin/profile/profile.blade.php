@extends('layout.app')
@section('title', 'Dashboard')
@section('content')
    {{-- @include('shared.head') --}}
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
                    <h1 class="h3 mb-2 text-gray-800 pt-4">Profile</h1>

                    @include('shared.success-message')
                    <!-- DataTales Example -->
                    <form action="{{ route('profile.store') }}" method="POST" enctype="multipart/form-data" class="mt-3">
                        @csrf
                        <div class="form-group row border rounded">
                            <div class="col-md-4 my-2">
                                <label for="company_name">Company Name</label>
                                <input type="text" class="form-control" id="company_name" name="company_name">
                            </div>
                            <div class="col-md-8 my-2">
                                <label for="address">Address</label>
                                <input type="text" class="form-control" id="address" name="address">
                            </div>
                            <div class="col-md-4 my-2">
                                <label for="mobile">Mobile</label>
                                <input type="text" class="form-control" id="mobile" name="mobile">
                            </div>
                            <div class="col-md-4 my-2">
                                <label for="mobile2">Mobile 2</label>
                                <input type="text" class="form-control" id="mobile2" name="mobile2">
                            </div>
                            <div class="col-md-4 my-2">
                                <label for="landline">Landline</label>
                                <input type="text" class="form-control" id="landline" name="landline">
                            </div>
                            <div class="col-md-4 my-2">
                                <label for="email">Email</label>
                                <input type="email" class="form-control" id="email" name="email">
                            </div>
                            <div class="col-md-4 my-2">
                                <label for="website">Website</label>
                                <input type="text" class="form-control" id="website" name="website">
                            </div>
                            <div class="col-md-4 my-2">
                                <label for="current_logo">Current Logo</label>
                                <input type="file" class="form-control-file" id="current_logo" name="current_logo">
                            </div>
                        </div>
                        <div class="form-group row border rounded">
                            <div class="col-md-4 my-2">
                                <label for="customer_prefix">Customer Prefix</label>
                                <input type="text" class="form-control" id="customer_prefix" name="customer_prefix" required>
                            </div>
                            <div class="col-md-4 my-2">
                                <label for="invoice_prefix">Invoice Prefix</label>
                                <input type="text" class="form-control" id="invoice_prefix" name="invoice_prefix" required>
                            </div>
                            <div class="col-md-4 my-2">
                                <label for="gstinno">GSTIN No</label>
                                <input type="text" class="form-control" id="gstinno" name="gstinno">
                            </div>

                            <div class="col-md-4 my-2">
                                <label for="bankname">Bank Name</label>
                                <input type="text" class="form-control" id="bankname" name="bankname">
                            </div>
                            <div class="col-md-4 my-2">
                                <label for="bankaccno">Bank Account No</label>
                                <input type="text" class="form-control" id="bankaccno" name="bankaccno">
                            </div>
                            <div class="col-md-4 my-2">
                                <label for="ifsc">IFSC</label>
                                <input type="text" class="form-control" id="ifsc" name="ifsc">
                            </div>
                            <div class="col-md-4 my-2">
                                <label for="pan_no">PAN No</label>
                                <input type="text" class="form-control" id="pan_no" name="pan_no">
                            </div>
                            <div class="col-md-4 my-2">
                                <label for="qr">QR Code</label>
                                <input type="file" class="form-control-file" id="qr" name="qr">
                            </div>
                            <div class="col-4 my-2"></div>
                        </div>
                        <button type="submit" class="btn btn-primary ">Submit</button>
                    </form>
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


