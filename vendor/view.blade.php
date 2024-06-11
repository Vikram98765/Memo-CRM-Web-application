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
 <h1 class="h3 mb-2 text-gray-800">Vendors Details</h1>

 <!-- DataTales Example -->
 <div class="card shadow mb-4">
     <div class="card-header py-3">
         <h6 class="m-0 font-weight-bold text-primary">Vendors Information</h6>
         @include('shared.success-message')
     </div>
     <div class="card-body">
         <div class="table-responsive">
             <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                 <thead>
                     <tr>
                         <th>S no</th>
                         <th>Vendorname</th>
                         <th>Contact</th>
                         <th> GstinNo</th>

                         <th> Email</th>
                         <th>Address</th>

                         <th>Action </th>

                     </tr>
                 </thead>
                 <tfoot>
                     <tr>
                        <th>S no</th>
                         <th>Vendorname</th>
                         <th>Contact</th>
                         <th> GstinNo</th>

                         <th> Email</th>
                         <th>Address</th>

                         <th>Action </th>


                     </tr>
                 </tfoot>
                 <tbody>
                    @php
                        $loop=0;
                    @endphp
                    @foreach($vendors as $vendor)
                     <tr>
                         <td>{{$loop->index +1}}</td>
                         <td>{{$vendor->vendor_name}}</td>
                         <td>{{$vendor->contact}}</td>
                         <td>{{$vendor->gstinno}}</td>
                         <td>{{$vendor->address}}</td>
                         <td>{{$vendor->email}}</td>



                         <td>
                            <form method="post" action="{{route('vendors_destroy',$vendor->id)}}" >
                            @csrf
                            @method('delete')
                            <button class="ms-2 btn btn-danger btn-sm">X</button>
                            <a href="{{route('vendor_edit',$vendor->id)}}" class="btn btn-sm btn-success">Edit</a>
                        </form>
                    </td>


                     </tr>
                     @endforeach
                 </tbody>
             </table>
         </div>
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
