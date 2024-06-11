
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
                    @include('shared.success-message')
                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Invoice Details</h1>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Invoice Information</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>S_no.</th>
                                            <th>Invoice No.</th>
                                            <th>Date</th>
                                            <th>Amount</th>
                                            <th>Status </th>
                                            <th> Contact</th>
                                            <th>Customer Name</th>
                                            <th>Refernce Name </th>
                                            <th>Action Name</th>

                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                        <tr>
                                            <th>S_no.</th>
                                            <th>Invoice No.</th>
                                            <th>Date</th>
                                            <th>Amount</th>
                                            <th>Status </th>
                                            <th> Contact</th>
                                            <th>Customer Name</th>
                                            <th>Refernce Name </th>
                                            <th>Action Name</th>

                                        </tr>

                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        @foreach ($groupedInvoices as $index => $groupedInvoice)
                                            <tr>
                                                <td>{{ $groupedInvoice['commonData']['customer_id'] }}</td>
                                                <td>{{ $profile->id . '/24-25A' . $groupedInvoice['commonData']['id'] }}
                                                </td>
                                                <td>{{ $groupedInvoice['commonData']['invoice_date'] }}</td>
                                                <td>{{ $groupedInvoice['commonData']['grand_total'] }}</td>
                                                {{-- <td>
                                                    @if ($groupedInvoice['commonData']['due'] > 0)
                                                        <button style="background-color: red"
                                                            class="btn-sm rounded border-0 mb-5">Pending</button>
                                                    @else
                                                        <button style="background-color: green"
                                                            class="btn-sm rounded border-0 mb-5">Received</button>
                                                    @endif
                                                </td> --}}
                                                <td class="text-center">
                                                    @if ($groupedInvoice['commonData']['due'] < 1)
                                                        <span class="bg-success rounded px-2 text-light">Received</span>
                                                    @else
                                                        <button class="bg-danger rounded px-2 text-light border-0" onclick="toggleAmount({{ $loop->iteration }}, {{ $groupedInvoice['commonData']['due'] }})" id="pendingButton{{ $loop->iteration }}">Pending</button>
                                                        <p id="pendingAmount{{ $loop->iteration }}" style="display: none;" class="mt-2">{{ $groupedInvoice['commonData']['due'] }}</p>
                                                        <script type="text/javascript">
                                                            let clickCount{{ $loop->iteration }} = 0;

                                                            function toggleAmount(iteration, due) {
                                                                const button = document.getElementById('pendingButton' + iteration);
                                                                const amount = document.getElementById('pendingAmount' + iteration);

                                                                clickCount{{ $loop->iteration }}++;

                                                                if (clickCount{{ $loop->iteration }} % 2 === 0) {
                                                                    button.textContent = "Pending";
                                                                    amount.style.display = "none";
                                                                } else {
                                                                    button.textContent = "Pending";
                                                                    amount.style.display = "block";
                                                                }
                                                            }
                                                        </script>
                                                    @endif
                                                </td>
                                                <td>{{ $groupedInvoice['commonData']['customer_contact'] ?? '' }}</td>
                                                <td>{{ $groupedInvoice['commonData']['customer_name'] }}</td>
                                                <td>{{ $groupedInvoice['commonData']['customer_reference'] ?? '' }}</td>
                                                <td>
                                                    <form method="post"
                                                        action="{{ route('invoice_destroy', Arr::get($groupedInvoice,'commonData.customer_id')) }}">
                                                        @csrf
                                                        @method('delete')

                                                        <button class="ms-2 btn btn-danger btn-sm btn-block">X</button>
                                                    </form>
                                                    <a href="{{ route('invoice_edit', $groupedInvoice['commonData']['customer_id']) }}" class="btn btn-primary btn-sm btn-block">Edit</a>
                                                    <form method="POST" action="{{route('print.pdf',Arr::get($groupedInvoice,'commonData.customer_id'))}}" class="py-0">
                                                        @csrf
                                                        <button class="btn btn-success btn-sm btn-block py-0 bt-0 no-margin-btn">PDF</button>
                                                    </form>
                                                    <a href="{{Route('view.pdf',Arr::get($groupedInvoice,'commonData.customer_id'))}}" class="btn btn-info btn-sm btn-block">View PDF</a>
                                                    {{-- <a href="" class="btn btn-success">PDF</a> --}}
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
