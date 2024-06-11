
@extends('layout.app')
<link rel="stylesheet" href="{{ asset('Public/assets/css/Invoice.css') }}" type="text/css">
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
                <div class="p-3">
                    <div class="container-fluid border border-dark ">
                        <h1>Create Invoice</h1>
                        <form id="invoiceForm" method="POST" action="{{route('update_invoice',Arr::get($common,'customer_id'))}}">
                            @csrf
                            @method('PUT')
                            <div class="row d-flex justify-content-between">
                                <div class="col-3">
                                    <label for="customer">Select Customer <span class="text-danger">*</span></label>
                                    <select id="customer" name="customer" required>
                                        {{-- <option value="" disabled selected hidden>Select Customer</option> --}}
                                        @foreach ($customers as $customer)
                                            <option value="{{ $customer->customer_name }}"
                                                data-address="{{ $customer->address }}"
                                                data-gstin="{{ $customer->gstinno }}" data-id="{{ $customer->id }}"
                                                {{ $common['customer_name'] == $customer->customer_name ? 'selected' : '' }}>
                                                {{ $customer->customer_name }}
                                            </option>
                                        @endforeach
                                    </select>

                                </div>

                                <div class="col-3">
                                    <label for="date">Date <span class="text-danger">*</span></label>
                                    <input type="date" id="date" name="date" value="{{ old('date', Arr::get($common, 'invoice_date')) }}" required>
                                </div>
                            </div>
                            <div class="customer-details">
                                <div class="row">
                                    <div class="col-4">
                                        <label>Customer Address</label>
                                        <input type="text" id="customerAddress" name="customerAddress" value="{{Arr::get($common,'customer_address')}}"  readonly>
                                    </div>
                                    <div class="col-4">
                                        <label>Customer GSTIN No</label>
                                        <input type="text" id="customerGstin" name="customerGstin" value="{{Arr::get($common,'customer_gstin')}}" readonly>
                                    </div>
                                    <div class="col-4">

                                        <input type="hidden" id="customer_id" name="customer_id" readonly>
                                    </div>
                                </div>
                            </div>

                            <div class="table-responsive">
                                <table>
                                    <thead>
                                        <tr>
                                            <th style="width: 3%;">#</th>
                                            <th style="width: 40%;">Description</th>
                                            <th style="width: 13%;">Unit</th>
                                            <th style="width: 13%;">Unit Price</th>
                                            <th style="width: 23%;">Total</th>
                                            <th style="width: 8%;"></th>
                                        </tr>
                                    </thead>
                                    <tbody id="invoiceItems">
                                        {{-- @php
                                        $products = Arr::get($groupedInvoices, 'products', []);
                                        @endphp --}}

                                        @foreach ($products as $index => $product)
                                            <tr>
                                                <td>{{ $index + 1 }}</td>
                                                <td><input type="text" name="description[]" value="{{ Arr::get($product, 'description') }}">
                                                </td>
                                                <td><input type="text" name="unit[]" value="{{  Arr::get($product, 'quantity') }}"></td>
                                                <td><input type="number" name="unitPrice[]" class="unit-price" value="{{  Arr::get($product, 'unit_price') }}"></td>
                                                <td><input type="number" name="total[]" class="total" value="{{  Arr::get($product, 'total') }}" readonly></td>
                                                <td><button type="button" class="remove text-center">X</button></td>
                                            </tr>
                                        @endforeach
                                        <tr id="addItemRow">
                                            <td colspan="3"><button type="button" id="addItem" class="border-0">Add Fields</button></td>
                                            <td><label>Less</label></td>
                                            <td><input type="number" id="less" name="less" value="{{  Arr::get($common, 'discount') }}"></td>
                                        </tr>
                                        <tr>
                                            <td colspan="2"></td>
                                            <td>
                                                <select name="paymentMethod" id="paymentMethod" class="paytype">
                                                    <option value="cash" {{ old('paymentMethod', Arr::get($common, 'payment_method')) == 'cash' ? 'selected' : '' }}>Cash</option>
                                                    <option value="card" {{ old('paymentMethod', Arr::get($common, 'payment_method')) == 'card' ? 'selected' : '' }}>Card</option>
                                                    <option value="cheque" {{ old('paymentMethod', Arr::get($common, 'payment_method')) == 'cheque' ? 'selected' : '' }}>Cheque</option>
                                                    <option value="online" {{ old('paymentMethod', Arr::get($common, 'payment_method')) == 'online' ? 'selected' : '' }}>Online</option>
                                                </select>
                                            </td>
                                            <td><label>Amount Received</label></td>
                                            <td><input type="number" id="amountReceived" name="amountReceived" value="{{Arr::get($common, 'paid') }}"></td>
                                        </tr>
                                        <tr>
                                            <td colspan="3"></td>
                                            <td>
                                                <label>Sub-Total</label>
                                                <input type="number" id="subTotal" name="subTotal" value="{{ Arr::get($common, 'sub_total') }}" readonly>
                                            </td>
                                            <td>
                                                <label>Grand Total</label>
                                                <input type="number" id="grandTotal" name="grandTotal" value="{{ Arr::get($common, 'grand_total') }}" readonly>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>

                            <div class="row">
                                <div class="col-4">
                                    <button type="submit" class="btn2 border-0">Update</button>
                                </div>
                            </div>
                        </form>

                    </div>
                </div>

                <script src="script.js"></script>
                <script>
                    document.getElementById('customer').addEventListener('change', function() {
                        var selectedOption = this.options[this.selectedIndex];

                        document.getElementById('customerAddress').value = selectedOption.getAttribute('data-address');
                        document.getElementById('customerGstin').value = selectedOption.getAttribute('data-gstin');
                        document.getElementById('customer_id').value = selectedOption.getAttribute('data-id');
                        a=document.getElementById('customer').value;
                        console.log(a);




                    });

                    document.getElementById('addItem').addEventListener('click', function() {
                        const tbody = document.getElementById('invoiceItems');
                        const newRow = document.createElement('tr');
                        newRow.innerHTML = `
                            <td></td>
                            <td><input type="text" name="description[]"></td>
                            <td><input type="text" name="unit[]"></td>
                            <td><input type="number" name="unitPrice[]" class="unit-price"></td>
                            <td><input type="number" name="total[]" class="total" readonly></td>
                            <td><button type="button" class="remove">X</button></td>
                        `;
                        tbody.insertBefore(newRow, document.getElementById('addItemRow'));
                        updateRowNumbers();
                        addRemoveFunctionality();
                        addCalculationFunctionality();
                    });

                    document.getElementById('less').addEventListener('input', updateGrandTotal);

                    function updateRowNumbers() {
                        const rows = document.querySelectorAll('#invoiceItems tr');
                        let counter = 1;
                        rows.forEach((row, index) => {
                            const firstChild = row.querySelector('td:first-child');
                            if (firstChild && !row.querySelector('button.border-0') && !row.querySelector('select.paytype')) {
                                firstChild.innerText = counter++;
                            }
                        });
                    }

                    function addRemoveFunctionality() {
                        const removeButtons = document.querySelectorAll('.remove');
                        removeButtons.forEach(button => {
                            button.addEventListener('click', function() {
                                this.closest('tr').remove();
                                updateRowNumbers();
                                calculateSubTotal();
                            });
                        });
                    }

                    function addCalculationFunctionality() {
                        const unitPrices = document.querySelectorAll('.unit-price');
                        unitPrices.forEach(input => {
                            input.addEventListener('input', calculateTotal);
                        });

                        const units = document.querySelectorAll('input[name="unit[]"]');
                        units.forEach(input => {
                            input.addEventListener('input', calculateTotal);
                        });

                        function calculateTotal() {
                            const row = this.closest('tr');
                            const unitPrice = parseFloat(row.querySelector('input[name="unitPrice[]"]').value) || 0;
                            const unit = parseFloat(row.querySelector('input[name="unit[]"]').value) || 0;
                            row.querySelector('.total').value = unitPrice * unit;
                            calculateSubTotal();
                        }
                    }

                    function calculateSubTotal() {
                        let subTotal = 0;
                        document.querySelectorAll('.total').forEach(totalInput => {
                            subTotal += parseFloat(totalInput.value) || 0;
                        });
                        document.getElementById('subTotal').value = subTotal;
                        updateGrandTotal();
                    }

                    function updateGrandTotal() {
                        const subTotal = parseFloat(document.getElementById('subTotal').value) || 0;
                        const less = parseFloat(document.getElementById('less').value) || 0;
                        document.getElementById('grandTotal').value = subTotal - less;
                    }

                    addRemoveFunctionality();
                    addCalculationFunctionality();
                    calculateSubTotal();
                </script>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white mt-auto">
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
                    <a class="btn btn-primary" href="logout_url">Logout</a>
                </div>
            </div>
        </div>
    </div>
@endsection
