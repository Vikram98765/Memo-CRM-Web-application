<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Customer;
use App\Models\Invoice;
use App\Models\Vendor;

class CustomerController extends Controller
{
    public function counting(){

        $cus_count=Customer::count();
        $inv_count=Invoice::count();
        $ven_count=Vendor::count();
        return view('dashboard',compact('cus_count','inv_count','ven_count'));
    }
    public function index()
    {
        $customers=Customer::all();

        return view('admin.customer.index',compact('customers'));
    }

    public function create()
    {
        return view('admin.customer.create');
    }

    public function save(Request $req)
    {
        $customer = new Customer;
        $customer->customer_id = $req->customerid;
        $customer->customer_name = $req->customername;
        $customer->contact = $req->contact1;
        $customer->whatsapp = $req->whatsapp;
        $customer->email = $req->email;
        $customer->gstinno = $req->gstin;
        $customer->address = $req->address;
        $customer->reference = $req->refe;
        $customer->save();
        return view('admin.customer.create');
    }
    public function destroy(Customer $id){
        // if(auth()->id() != $id->customerid){
        //     abort(404);
        // }
        $id->delete();
        return redirect()->route('show_customers');
    }
    public function edit(Customer $id){
        $editing=true;
        return view("admin.customer.edit",compact('editing','id'));
    }
    public function update(Customer $id){
        $validated=request()->validate([
            'customer_id'=>"required"
            ,'customer_name'=>"required"
            ,'contact'=>"required"
            ,'whatsapp'=>"required"
            ,'email'=>"required",
            'gstinno'=>"required"
            ,
            'address'=>"required"
            ,'reference'=>"required",
        ]);
        // dd($validated);
        $up=$id->update($validated);
        // dd($up);
        // $id->save();
        return redirect()->route('show_customers',$id->customer_id);

    }

}


