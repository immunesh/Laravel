<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator;
use App\Requirement;
use App\User;
use App\Property;
use App\Blog;
use App\Agreement;
use App\Appointment;
use App\Subscription;
use App\OwnerSubscription;
use App\OwnerPlanUsed;
use App\ContactOwner;

class DashboardController extends Controller
{
    public function dashboard(){
        $req= Requirement::count();
        $owner= User::where('user_type',2)->count();
        $tenant= User::where('user_type',3)->count();
        $appoint= Appointment::count();
        $property= Property::count();
        return view('admin.dashboard',compact('req','owner','appoint','property','tenant'));
    }

    public function blogs(){
        $blogs= Blog::all();
        return view('admin.blog',compact('blogs'));
    }

    public function booking(){
        return view('admin.booking');
    }

    public function ownerinvoices(){
        return view('admin.ownerinvoices');
    }

    public function addblog(){
        return view('admin.addBlog');
    }

    public function ownerpackages(){
        $o_package= User::join('owner_plans','owner_plans.id','=','subscribed_plan_id')->where('users.user_type',2)->get();
        return view('admin.ownerpackeges',compact('o_package'));
    }

    public function properties(){
        $properties=Property::paginate(5);
        return view('admin.properties',compact('properties'));
    }

    public function requirement(){
        $requirements= Requirement::all();
        return view('admin.requirement', compact('requirements'));
    }

    public function rentagreement(){
        $agreements=Agreement::all();
        return view('admin.rentagreement',compact('agreements'));
    }

    public function scheduleappoint(){
        $appointments= Appointment::all();
        return view('admin.scheduleappoint',compact('appointments'));
    }

    public function tenantinvoice(){
        return view('admin.tenantinvoices');
    }

    public function tenantpackages(){
        $t_package= User::join('plans','plans.id','=','subscribed_plan_id')->where('users.user_type', 3)->get();
        return view('admin.tenantpackeges',compact('t_package'));
    }

    public function tenants(){
        $tenants= User::where('user_type',3)->get();
        return view('admin.tenant',compact('tenants'));
    }

    public function ownerlist(){
        $owners= User::where('user_type',2)->get();
        return view('admin.ownerlist',compact('owners'));
    }

    public function sendagreement(){
        $tenants= User::where('user_type',3)->get();
        $owners= User::where('user_type',2)->get();
        $properties= Property::all();
        return view('admin.sentagreement',compact('tenants','owners','properties'));
    }

    public function store_agreement(Request $request){
        try{
            $validator= Validator::make($request->all(),[
                'tenant'=>'required',
                'owner'=>'required',
                'property_id'=>'required',
                'start_date'=>'required',
                'end_date'=>'required',
                'agrmt_file'=>'required',
            ]);
            if($validator->fails()){
                return redirect()->back()->with('error',$validator->errors());
            }
            $agreement= new Agreement();
            if($request->hasFile('agrmt_file')){
                $file = $request->file('agrmt_file');
                $filename = $file->getClientOriginalName();
                $path = public_path().'/AgreementFiles/';
                $file->move($path, $filename);
                $agreement->agrmt_file= $filename;
            }
            $agreement->tenant_id= $request->tenant;
            $agreement->owner_id= $request->owner;
            $agreement->property_id= $request->property_id;
            $agreement->start_date= $request->start_date;
            $agreement->end_date= $request->end_date;
            $agreement->message= $request->message;
            $agreement->save();
            return redirect('rentagreement')->with('success','Agreement Created Successfully');
        }
        catch(ValidationException $e){
            return redirect()->back()->with('error',$e->getMessage());
        }
    }

    public function storeblog(Request $request){
        try{
            $validator= Validator::make($request->all(),[
                'title'=>'required',
                'image'=>'required',
                'description'=>'required',
            ]);
            if($validator->fails()){
                return redirect()->back()->with('error',$validator->errors());
            }
            $blog= new Blog();
            if($request->hasFile('image')){
                $file = $request->file('image');
                $filename = $file->getClientOriginalName();
                $path = public_path().'/uploads/';
                $file->move($path, $filename);
                $blog->image= $filename;
            }
            $blog->title= $request->title;
            $blog->description= $request->description;
            $blog->save();
            return redirect('blogs')->with('success','BLog Created Successfully');
        }
        catch(ValidationException $e){
            return redirect()->back()->with('error',$e->getMessage());
        }
    }
    
    public function delBlog($id){
        // return dd($id);
        Blog::where('id',$id)->delete();
        return redirect('blogs')->with('success','BLog Deleted Successfully');
    }

    public function blogDetail($id){
        $blog= Blog::where('id',$id)->first();
        return view('admin.blog_detail',compact('blog'));
    }
    
    public function delete_user($id){
        $user= User::find($id);
        if($user->user_type != 1){
            Agreement::where('tenant_id',$id)->orWhere('owner_id',$id)->delete();
            Appointment::where('user_id',$id)->delete();
            ContactOwner::where('user_id',$id)->delete();
            OwnerPlanUsed::where('tenant_id',$id)->orWhere('owner_id',$id)->delete();
            OwnerSubscription::where('user_id',$id)->delete();
            Property::where('user_id',$id)->delete();
            Requirement::where('user_id',$id)->delete();
            Subscription::where('user_id',$id)->delete();
            $user->delete();
            return redirect('dashboard')->with('success','User Deleted Successfully');
        }
        else{
            return redirect('dashboard')->with('error','You Can not delete Admin');
        }
    }
}
