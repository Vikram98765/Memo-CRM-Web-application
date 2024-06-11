<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Invoice</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        @import url("https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css");
    </style>
    <link href="{{ asset('/assets/css/Invoice.css') }}" rel="stylesheet" type="text/css">
    <style>
        .invoice {
            max-width: 1000px;
            margin: auto;
        }

        .invoice-footer {
            background-color: #fce2db;
            padding: 10px 20px;
        }

        .invoice-header {
            padding: 10px;
        }

        .invoice-body {
            padding: 20px;
        }

        .table thead th {
            background-color: #ff5722;
            color: white;
        }

        .colo {
            color: #ff5722;
            font-weight: 700;
        }

        .bgtr {
            background-color: #ff5722;
            color: white;
        }

        .table {
            width: 100%;

        }

        .table td {
            padding: 10px;
        }

        .tdm {
            margin-left: 100%;
        }

        .box2 {
            float: left;
            margin-right: 50px
        }

        .box11 {
            clear: both;
        }

        .leftmar {
            margin-left: 165px;
        }

        .leftmar2 {
            margin-left: 150px;
        }

        .invoice-footer table{
            text-align: right;
            margin-left: 350px
        }
        .boxend{
            float: right;
        }

    </style>
</head>

<body>
    <div class="invoice border rounded">
        <div class="invoice-header d-flex justify-content-end align-items-between">
            {{-- <form method="POST" action="{{route('print.pdf',Arr::get($groupedInvoices,'commonData.customer_id'))}}">
                @csrf
                @method('post')
                <button class="btn btn-success">PDF</button>
            </form> --}}
            <div class="text-right">
                @if ($view ?? false)
                    <img src="{{ asset('./storage/images/radhass.png') }}" alt=""width="250px">
                @else
                    <img src="{{ public_path('./storage/images/radhass.png') }}" alt=""width="250px">
                @endif

                <p><b>351, Great Nag Road, Nagpur - 440009</b></p>
            </div>

        </div>
        <div class="invoice-body">
            <div class="box1">
                <div class="box2">
                    <p><span class="colo">Memo No.:
                        </span>{{ 'RV' . '/24-25A' . $groupedInvoices['commonData']['customer_id'] }}</p>
                    {{-- <p>{{dd(Arr::get($groupedInvoices,'commonData.customer_name'))}}</p> --}}
                    {{-- {{dd($groupedInvoices['commonData'])}} --}}
                    <p><span class="colo">Date:</span> {{ $groupedInvoices['commonData']['invoice_date'] }}</p>
                </div>
                <div class="box2 leftmar">
                    <h5 class="colo">To:</h5>
                    <p>{{ $groupedInvoices['commonData']['customer_name'] }}</p>
                    <p>{{ $groupedInvoices['commonData']['customer_address'] }}</p>
                    <p>{{ $groupedInvoices['commonData']['customer_contact'] }}</p>
                </div>
            </div>
            <div class="box11">
                <div class="box2">
                    <p>Website: www.radhavilas.in</p>
                </div>
                <div class="box2 leftmar2">
                    <p>Mob No: 7304 706263 / 7304 743101</p>

                </div>
                <div class="box11">
                    <p>Email: salesinradhavilas@gmail.com</p>

                </div>
            </div>

            <table class="table mt-4">
                <thead>
                    <tr>
                        <th>Sr. No.</th>
                        <th>Description</th>
                        <th>Qty</th>
                        <th>Unit Price</th>
                        <th>Total(Rs.)</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($products as $index => $product)
                        <tr>
                            <td>{{ $loop->index + 1 }}</td>
                            <td>{{ $product['description'] }}</td>
                            <td>{{ $product['quantity'] }}</td>
                            <td>{{ $product['unit_price'] }}</td>
                            <td>{{ $product['total'] }}</td>

                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>




        <div class="invoice-footer ">


                <table class="table table-borderless w-50 ms-5 ">
                    <tbody>
                        <tr>
                            <td  >Subtotal</td>
                            <td  >{{ $groupedInvoices['commonData']['sub_total'] }}</td>
                        </tr>
                        <tr>
                            <td >less</td>
                            <td >{{ $groupedInvoices['commonData']['discount'] }}</td>
                        </tr>
                        <tr>
                            <td  >Advance Received</td>
                            <td  >{{ $groupedInvoices['commonData']['paid'] }}</td>

                        </tr>

                    </tbody>

                </table>



        </div>
        <table class="table">
            <tr class="bgtr">
                <td><strong>Carting</strong></td>
                <td class="text-right"style="margin-left:50px;"><strong>Total</strong></td>
                <td class="text-right" style="width: 200px;">
                    <strong>{{ $groupedInvoices['commonData']['grand_total'] }}</strong></td>
            </tr>
        </table>
        <div class="boxend">
            <p class="colo">Payment Type:{{ $groupedInvoices['commonData']['payment_method'] }}</p>
        </div>
    </div>
</body>

</html>
