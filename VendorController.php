<?php

namespace App\Http\Controllers;
use App\Models\Vendor;
use Illuminate\Http\Request;

class VendorController extends Controller
{
    public function create(){
        return view('vendor.create');
    }
    public function store(Request $request){
        $validated=$request->validate([
            'vendor_name'=>'required|min:3|max:20',
            'contact'=>'required|numeric|min_digits:10',
            'gstinno'=>'required|unique:vendors,gstinno',
            'email'=>'required|email',
            'address'=>'required',

        ]);
        Vendor::create(
            $validated
        );
        return redirect()->route('vendors_index');

    }

    public function index(){
        $vendors=Vendor::all();
        return view('vendor.view',compact('vendors'));
    }
    public function destroy(Vendor $id){

        Vendor::where('id',$id)->delete();

        return redirect()->route('vendors_index')->with('success','Record deleted Successfully');
    }
    public function edit($id){
        $vendor=Vendor::find($id);
        $editing=true;
        // dd($vendor);
        return view('vendor.create',compact('vendor','editing'));

    }
    public function update($id,Request $request){
        Vendor::where('id',$id)->update(['vendor_name'=>$request->vendor_name,'contact'=>$request->contact,'gstinno'=>$request->gstinno,'email'=>$request->email,'address'=>$request->address]);
        return redirect()->route('vendors_index')->with('success','Record Updated Successfully');
    }
}
