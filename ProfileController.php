<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Profile;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function create()
    {
        return view('admin.profile.profile');
    }
    public function login_check(Request $request){
        // $request->user()->fill([
        //     'password' => Hash::make($request->password)
        // ])->save();

        $cred=request()->validate([
            'email'=>['required','email'],
            'password'=>['required'],
        ]);
        $pass=$cred['password'];


        // $request['password']=Hash::make($pass);
        //     dd($request['password']);

        //  dd($cred);
        // $cred=$request->only('email','password');
        // dd($cred);

        if (auth()->attempt($cred)) {
            // Authentication was successful...

            request()->session()->regenerate();

            return redirect()->route('dashboard');
        }
        return redirect()->route('login')->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    }
    public function login(){

        return view('auth.login');
    }
    public function showform()
    {
        $profile = Profile::latest()->first();

        return view('admin.profile.view',compact('profile'));
    }
    public function editform()
    {

        $profile = Profile::latest()->first();

        return view('admin.profile.edit',compact('profile'));
    }
    public function update(Request $request, $id)
    {
        // Find the existing profile by ID
        $profile = Profile::findOrFail($id);

        // Update the profile attributes
        $profile->company_name = $request->company_name;
        $profile->address = $request->address;
        $profile->mobile = $request->mobile;
        $profile->mobile2 = $request->mobile2; // Corrected typo
        $profile->landline = $request->landline;
        $profile->email = $request->email;
        $profile->website = $request->website;

        // Handle the current_logo file if it's uploaded
        if ($request->hasFile('current_logo')) {
            $imageName = time() . '.' . $request->current_logo->getClientOriginalName();
            $request->current_logo->move(public_path('images'), $imageName);
            $profile->current_logo = 'images/' . $imageName;
        }

        // Handle the qr file if it's uploaded
        if ($request->hasFile('qr')) {
            $imageName = time() . '.' . $request->qr->getClientOriginalName();
            $request->qr->move(public_path('images'), $imageName);
            $profile->qr = 'images/' . $imageName;
        }

        // Update other attributes
        $profile->customer_prefix = $request->customer_prefix;
        $profile->invoice_prefix = $request->invoice_prefix;
        $profile->gstinno = $request->gstinno;
        $profile->pan_no = $request->panno;
        $profile->bankname = $request->bankname;
        $profile->bankaccno = $request->bankaccno;
        $profile->ifsc = $request->ifsc;

        // Save the updated profile
        $profile->save();

        // Return the view with the updated profile
        // return view('admin.profile.view', compact('profile'));
        return redirect()->route('formshow', ['id' => $profile->id])->with('success','Data Updated Successfully' );

    }
      public function store(Request $request)
    {
        $profile = new Profile;

        $profile->company_name = $request->company_name;
        $profile->address = $request->address;
        $profile->mobile = $request->mobile;
        $profile->mobile2 = $request->mobile2; // Corrected typo
        $profile->landline = $request->landline;
        $profile->email = $request->email;
        $profile->website = $request->website;
        $imageName = time().'.'.$request->current_logo->getClientOriginalName();
        $request->current_logo->move(public_path('images'), $imageName);
        $profile->current_logo = 'images/' . $imageName;
        // $imagePath1 = $request->file('current_logo')->store('images', 'public');
        // $profile->current_logo=$imagePath1;
        // if ($request->hasFile('current_logo')) {
        //     $currentlogoname = file_get_contents($request->file('current_logo')->getRealPath());
        //     $profile->current_logo = $currentlogoname;
        // }

        $profile->customer_prefix = $request->customer_prefix;
        $profile->invoice_prefix = $request->invoice_prefix;
        $profile->gstinno = $request->gstinno;
        $profile->pan_no = $request->pan_no;
        $profile->bankname = $request->bankname;
        $profile->bankaccno = $request->bankaccno;
        $profile->ifsc = $request->ifsc;
        $imageName = time().'.'.$request->qr->getClientOriginalName();
        $request->qr->move(public_path('images'), $imageName);
        $profile->qr = 'images/' . $imageName;

        // $imagePath2 = $request->file('qr')->store('images', 'public');
        // $profile->qr=$imagePath2;

        // if ($request->hasFile('qr')) {
        //     $qrname = file_get_contents($request->file('qr')->getRealPath());
        //     $profile->qr = $qrname;
        // }

        $profile->save();

        return view('admin.profile.view',compact('profile'));
    }
}

