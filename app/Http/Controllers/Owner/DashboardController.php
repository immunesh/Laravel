<?php

namespace App\Http\Controllers\Owner;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Property;
use Auth;
use App\User;
use App\OwnerPlanUsed;
use App\Agreement;
use App\OwnerSubscription;

class DashboardController extends Controller
{
    public function dashboard(){
        $property= Property::where('user_id',\Auth::user()->id)->count();
        $appoint= OwnerPlanUsed::where('owner_id',\Auth::user()->id)
                            ->where('con_type','Appointment')->count();
        $co= OwnerPlanUsed::where('owner_id',\Auth::user()->id)
                            ->where('con_type','Contact Owner')->count();
        $tenant= OwnerPlanUsed::where('owner_id',\Auth::user()->id)
                            ->select('tenant_id')->groupBy('tenant_id')->count();
        $subs=OwnerSubscription::where('user_id',\Auth::user()->id)->first();
        return view('Owner.dashboard',compact('property','appoint','co','tenant','subs'));
    }
    public function my_properties(){
        $my_properties= Property::where('user_id', Auth::user()->id)->paginate(5);
        return view('Owner.my_properties',compact('my_properties'));
    }
    public function invoice(){
        return view('Owner.invoice');
    }
    public function schedule_appoint(){
        $appoint= OwnerPlanUsed::where('owner_id',\Auth::user()->id)->where('con_type','Appointment')->get();
        // return dd($appoint);
        return view('Owner.schedule_appoint',compact('appoint'));
    }
    public function rent_agreemnt(){
        $agreements= Agreement::where('owner_id', \Auth::user()->id)->get();
        return view('Owner.rent_agreemnt',compact('agreements'));
    }
    public function tanents(){
        $tenants= OwnerPlanUsed::where('owner_id',\Auth::user()->id)->select('tenant_id')->groupBy('tenant_id')->get();
        // return dd($tenants);
        return view('Owner.tanents',compact('tenants'));
    }
    public function profile(){
        $user= User::where('id',Auth::user()->id)->first();
        return view('Owner.profile', compact('user'));
    }
    public function refer(){
        return view('Owner.refer');
    }
    public function editprofile(Request $request){
        $id= $request->id;
        $user= User::find($id);
        $user->name= $request->name;
        $user->title= $request->title;
        $user->phonenumber= $request->phonenumber;
        $user->personal_info= $request->personal_info;
        if($request->hasFile('profile')){
            $file = $request->file('profile');
            $filename = $file->getClientOriginalName();
            $path = public_path().'/uploads/';
            $file->move($path, $filename);
            $user->profile= $filename;
        }
        $user->update();
        return redirect('owner/dashboard')->with('success','Profile Updated Successfully!');   
    }

    public function change_pass(Request $request){
        $id= $request->id;
        $user= User::find($id);
        if(\Hash::check($request->current_password, Auth::user()->password)){
            if($request->new_password == $request->confirm_password){
                $user->password= \Hash::make($request->new_password);
                $user->update();
                return redirect('owner/profile')->with('success', 'Password Changed Successfully');
            }
            return redirect()->back()->with('error', 'Confirm Password not Matched');
        }
        else{
            return redirect()->back()->with('error', 'Current Password is Wrong');
        }
    }
}
