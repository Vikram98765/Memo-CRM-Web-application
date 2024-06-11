<?php

namespace App\Http\Controllers;

use App\Models\Invoice;
use Illuminate\Http\Request;
use App\Models\Customer;
use App\Models\Profile;
use Illuminate\Support\Facades\DB;
use Barryvdh\DomPDF\Facade\Pdf;
use Dompdf\Options;

class InvoiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    /**
     * Show the form for creating a new resource.
     */

    /**
     * Store a newly created resource in storage.
     */
    public function view()
    {
        $customers = Customer::all();
        return view('Invoice.create', compact('customers'));
    }
    public function destroy($customerId)
    {
        Invoice::where('customer_id', $customerId)->delete();
        return redirect()->route('index_invoice')->with('success', 'Entry Deleted Successfully');
    }
    public function printPDF($id)
    {
        // Retrieve and group invoices by customer_id
        $invoices = Invoice::where('customer_id', $id)->get()->groupBy('customer_id');
        $groupedInvoices = $invoices->map(function ($customerInvoices) {
            $firstInvoice = $customerInvoices->first();

            // Extract common data from the first invoice of the group
            $commonData = $firstInvoice->only([
                'customer_id', 'customer_name', 'customer_address',
                'customer_gstin', 'invoice_date', 'grand_total', 'due',
                'discount', 'sub_total', 'paid', 'payment_method'
            ]);
            $commonData['customer_contact'] = $firstInvoice->customer->contact ?? 'N/A';
            $commonData['customer_reference'] = $firstInvoice->customer->reference ?? 'N/A';

            // Extract product details from each invoice for the customer
            $products = $customerInvoices->map(function ($invoice) {
                return [
                    'description' => $invoice->description,
                    'unit_price' => $invoice->unit_price,
                    'quantity' => $invoice->quantity,
                    'total' => $invoice->total,
                    'id' => $invoice->id
                ];
            });

            // Return structured data for each customer
            return [
                'commonData' => $commonData,
                'products' => $products
            ];
        })->first(); // Adjusted to get the first element directly

        $products = $groupedInvoices['products'];

        // Set up PDF instance
        // $pdf=new Pdf(Option)
        $pdf = app('dompdf.wrapper');
        $pdf->setBasePath(public_path());

        // Load HTML content for PDF
        $html = view('pdf.view', compact('groupedInvoices', 'products'))->render();

        // Load HTML into PDF instance
        $pdf->loadHtml($html);

        // Set paper size and orientation
        $pdf->setPaper('A4', 'portrait');

        // Render PDF
        $pdf->render();

        // Return the PDF for download
        return $pdf->download('invoice_' . $id . '.pdf');
    }

    public function viewpdf($id)
    {
        $invoices = Invoice::where('customer_id', $id)->get()->groupBy('customer_id');
        $groupedInvoices = $invoices->map(function ($customerInvoices) {
            $firstInvoice = $customerInvoices->first();

            // Extract common data from the first invoice of the group
            $commonData = $firstInvoice->only([
                'customer_id', 'customer_name', 'customer_address',
                'customer_gstin', 'invoice_date', 'grand_total', 'due',
                'discount', 'sub_total', 'paid', 'payment_method'
            ]);
            $commonData['customer_contact'] = $firstInvoice->customer->contact ?? 'N/A';
            $commonData['customer_reference'] = $firstInvoice->customer->reference ?? 'N/A';

            // Extract product details from each invoice for the customer
            $products = $customerInvoices->map(function ($invoice) {
                return [
                    'description' => $invoice->description,
                    'unit_price' => $invoice->unit_price,
                    'quantity' => $invoice->quantity,
                    'total' => $invoice->total,
                    'id' => $invoice->id
                ];
            });

            // Return structured data for each customer
            return [
                'commonData' => $commonData,
                'products' => $products
            ];
        })->first(); // Adjusted to get the first element directly

        // $products = $groupedInvoices['products'];

        $products = $groupedInvoices['products'];
        $view=true;
        // $pdf = Pdf::loadView('pdf.view', compact('groupedInvoices','products'));
        // return $pdf->download('invoice_'.$id.'.pdf');
        return view('pdf.view', compact('groupedInvoices', 'products','view'));
    }
    public function index()
    {
        $profile = DB::table('profile')->first();
        $invoices = Invoice::with('customer')
            ->orderBy('customer_id')
            ->get()
            ->groupBy('customer_id');
        $groupedInvoices = $invoices->map(function ($customerInvoices) {
            $firstInvoice = $customerInvoices->first();
            // Extract common data from the first invoice of the group
            $commonData = $customerInvoices->first()->only([
                'customer_id',  'customer_name', 'customer_address', 'id',
                'customer_gstin', 'invoice_date', 'grand_total', 'due', 'discount', 'sub_total', 'paid', 'payment_method', 'invoice_date'
            ]);
            $commonData['customer_contact'] = $firstInvoice->customer->contact ?? 'N/A';
            $commonData['customer_reference'] = $firstInvoice->customer->reference ?? 'N/A';


            // Extract product details from each invoice for the customer
            $products = $customerInvoices->map(function ($invoice) {
                return [
                    'description' => $invoice->description,
                    'unit_price' => $invoice->unit_price,
                    'quantity' => $invoice->quantity,
                    'total' => $invoice->total
                ];
            });

            // Return structured data for each customer
            return [
                'commonData' => $commonData,
                'products' => $products
            ];
        });
        $groupedInvoices->each(function ($groupedInvoice) use (&$common, &$products) {
            $common = $groupedInvoice['commonData'];
            $products = $groupedInvoice['products'];
        });
        // dd($common);
        // dd($groupedInvoices);

        return view('Invoice.view', compact('profile', 'groupedInvoices'));
    }
    public function store(Request $request)
    {

        $commonData = [
            'customer_id' => $request->customer_id,
            'profile_id' => $request->profile_id,
            'customer_name' => $request->customer,
            'customer_address' => $request->customerAddress,
            'customer_gstin' => $request->customerGstin,
            'sub_total' => $request->subTotal,
            'grand_total' => $request->grandTotal,
            'paid' => $request->amountReceived,
            'due' => $request->grandTotal - $request->amountReceived,
            'invoice_date' => $request->date,
            'discount' => $request->less,
            'payment_method' => $request->paymentMethod,
            // 'description' => $request->description,
        ];
        foreach ($request->description as $index => $description) {
            $invoice = new Invoice($commonData);
            $invoice->description = $request->description[$index];
            $invoice->unit_price = $request->unitPrice[$index];
            $invoice->quantity = $request->unit[$index];
            $invoice->total = $request->total[$index];
            $invoice->save();
        };
        return redirect()->route('index_invoice')->with('success', 'Entry created successfully');
    }
    public function edit($customerId)
    {
        $customers = Customer::all();
        $invoices = Invoice::where('customer_id', $customerId)->get()->groupBy('customer_id');
        $groupedInvoices = $invoices->map(function ($customerInvoices) {
            $firstInvoice = $customerInvoices->first();
            // Extract common data from the first invoice of the group
            $commonData = $customerInvoices->first()->only([
                'customer_id',  'customer_name', 'customer_address',
                'customer_gstin', 'invoice_date', 'grand_total', 'due', 'discount', 'sub_total', 'paid', 'payment_method', 'invoice_date'
            ]);
            $commonData['customer_contact'] = $firstInvoice->customer->contact ?? 'N/A';
            $commonData['customer_reference'] = $firstInvoice->customer->reference ?? 'N/A';


            // Extract product details from each invoice for the customer
            $products = $customerInvoices->map(function ($invoice) {
                return [

                    'description' => $invoice->description,
                    'unit_price' => $invoice->unit_price,
                    'quantity' => $invoice->quantity,
                    'total' => $invoice->total,
                    'id' => $invoice->id
                ];
            });

            // Return structured data for each customer
            return [
                'commonData' => $commonData,
                'products' => $products
            ];
        });

        $editing = true;
        $groupedInvoices->each(function ($groupedInvoice) use (&$common, &$products) {
            $common = $groupedInvoice['commonData'];
            $products = $groupedInvoice['products'];
        });

        return view('Invoice.edit', compact('groupedInvoices', 'editing', 'customers', 'common', 'products'));
    }
    public function update($customerId, Request $request)
    {
        // Retrieve the invoices related to the customer ID

        $invoices = Invoice::where('customer_id', $customerId)->get();

        // Define common data for all invoices
        $commonData = [
            'customer_id' => $customerId,
            'customer_name' => $request->customer,
            'customer_address' => $request->customerAddress,
            'customer_gstin' => $request->customerGstin,
            'sub_total' => $request->subTotal,
            'grand_total' => $request->grandTotal,
            'paid' => $request->amountReceived,
            'due' => $request->grandTotal - $request->amountReceived,
            'invoice_date' => $request->date,
            'discount' => $request->less,
            'payment_method' => $request->paymentMethod,
        ];
        // dd($commonData);

        // Update existing invoices and handle deleted rows
        foreach ($invoices as $index => $invoice) {
            if (isset($request->description[$index])) {
                $invoice->update([
                    'description' => $request->description[$index],
                    'unit_price' => $request->unitPrice[$index],
                    'quantity' => $request->unit[$index],
                    'total' => $request->total[$index],
                ]);

                // Update commonData fields for existing invoices
                foreach ($commonData as $key => $value) {
                    $invoice->$key = $value;
                }
                $invoice->save(); // Save the updated commonData fields
            } else {
                $invoice->delete(); // Handle the case where the user has removed a row
            }
        }

        // Create new invoices for additional rows
        for ($i = count($invoices); $i < count($request->description); $i++) {
            $newInvoice = new Invoice($commonData);
            $newInvoice->description = $request->description[$i];
            $newInvoice->unit_price = $request->unitPrice[$i];
            $newInvoice->quantity = $request->unit[$i];
            $newInvoice->total = $request->total[$i];
            $newInvoice->customer_id = $customerId;
            $newInvoice->save();
        }

        return redirect()->route('index_invoice')->with('success', 'Entry updated successfully');
    }
}
