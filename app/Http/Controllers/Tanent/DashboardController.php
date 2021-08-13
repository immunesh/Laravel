<?php

namespace App\Http\Controllers\Tanent;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Requirement;
use App\ContactOwner;
use App\Appointment;
use Validator;
use App\Agreement;
use App\Property;
use App\User;
use Auth;


class DashboardController extends Controller
{
    public function create_req(){
        return view('Tanent.post_req');
    }

    public function short_property(){
        $pro_co= Property::join('contact_owners','properties.id','=','contact_owners.property_id')->
                    where('contact_owners.user_id',\Auth::user()->id)->select('gallery','property_title',
                    'location','price','properties.user_id','contact_detail')->get();
        $pro_ap= Property::join('appointments','properties.id','=','appointments.property_id')->
        where('appointments.user_id',\Auth::user()->id)->select('gallery','property_title',
                    'location','price','properties.user_id','contact_detail')->get();
        $data= collect($pro_co, $pro_ap);
        $pro_appoint= $data->paginate(2);
        return view('Tanent.short_property',compact('pro_appoint'));
    }

    public function invoice(){
        return view('Tanent.invoice');
    }
    
    public function profile(){
        $user= User::where('id',Auth::user()->id)->first();
        return view('Tanent.profile', compact('user'));
    }

    public function schedule_appoint(){
        $appoints= Appointment::join('properties','properties.id','=','appointments.property_id')
                            ->join('users','users.id','=','properties.user_id')
                            ->where('appointments.user_id',Auth::user()->id)->get();
        // return dd($appoints);
        return view('Tanent.schedule_appoint',compact('appoints'));
    }

    public function rentagreement(){
        $agreements= Agreement::where('tenant_id',\Auth::user()->id)->get();
        return view('Tanent.rentagreement',compact('agreements'));
    }

    public function store_req(Request $request){
        try{
            $validator= Validator::make($request->all(),[
                'name'=>'required',
                'email'=>'required',
                'phone'=>'required',
                'req_name'=>'required|max:15',
                'area'=>'required',
                'req_in_days'=>'required',
            ]);
            if($validator->fails()){
                return redirect()->back()->with('error',$validator->errors());
            }
            Requirement::create($request->all());
            return redirect('/short_property')->with('success','Your Requirement Submitted Successfully');
        }
        catch(\Exception $e){
            return redirect()->back()->with('error',$e->getMessage());
        }
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
        return redirect('home')->with('success','Profile Updated Successfully!');   
    }

    public function change_pass(Request $request){
        $id= $request->id;
        $user= User::find($id);
        if(\Hash::check($request->current_password, Auth::user()->password)){
            if($request->new_password == $request->confirm_password){
                $user->password= \Hash::make($request->new_password);
                $user->update();
                return redirect('profile')->with('success', 'Password Changed Successfully');
            }
            return redirect()->back()->with('error', 'Confirm Password not Matched');
        }
        else{
            return redirect()->back()->with('error', 'Current Password is Wrong');
        }
    }
}
