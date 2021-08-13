<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Property;
use App\Blog;
use App\Mail\ContactMail;

class PagesController extends Controller
{
    public function home(){
        $properties= Property::orderBy('id', 'DESC')->get();
        $blogs= Blog::orderBy('id', 'DESC')->get();
        $housevillpro=Property::where('property_type','HouseorVilla')->count();
        $couple_friendlypro=Property::where('property_type','couple_friendly')->count();
        $office_spacepro=Property::where('property_type','office_space')->count();
        $shopspro=Property::where('property_type','shops')->count();
        $flatpro=Property::where('property_type','flat')->count();
        return view('index',compact('properties','blogs','flatpro','shopspro','office_spacepro','couple_friendlypro','housevillpro'));
    }
    
    public function about_us(){
        return view('Pages.about_us');
    }

    public function faq(){
        return view('Pages.faq');
    }
    
    public function tnc(){
        return view('Pages.tnc');
    }
    
    public function privacy_policy(){
        return view('Pages.privacy_policy');
    }

    public function contact(){
        return view('Pages.contact');
    }

    public function contactMail(Request $request){
        $mailData= ['message'=> $request->message, 'name'=>$request->name, 'email'=>$request->email, 'subject'=>$request->subject, 'phone'=>$request->phone];
        \Mail::to('rentobro@gmail.com')->send(new ContactMail($mailData));
        return redirect()->back()->with('success','mail sended Successfully');
    }

    public function index_search(Request $request){
        try{
            $status= $request->status;
            $neighbour= $request->neighbour;
            $bedrooms= $request->bedrooms;
            $bathrooms= $request->bathrooms;
            $location= $request->location;
            $property_type= $request->property_type;
            $sa_status= \DB::table('properties')->where('status','=',$status)->get()->toArray();
            $sa_neighbour= \DB::table('properties')->where('location->neighbourhood','=',$neighbour)->get()->toArray();
            $sa_bedroom= \DB::table('properties')->where('bedrooms','=',$bedrooms)->get()->toArray();
            $sa_bathroom= \DB::table('properties')->where('bathroom','=',$bathrooms)->get()->toArray();
            $sa_location= \DB::table('properties')->where('location->address','=',$location)->get()->toArray();
            $sa_property_type= \DB::table('properties')->where('property_type','=',$property_type)->get()->toArray();
            $property_arr= array_merge($sa_status, $sa_neighbour, $sa_bedroom, $sa_bathroom, $sa_location, $sa_property_type);
            $items = array();
            foreach ($property_arr as $c) {
                $items[$c->id] = $c; // Get unique country by code.
            }
            $data= collect($items);
            $properties = $data->paginate(10); //Filter the page var
            
            $rec_properties= Property::orderBy('id','desc')->take(3)->get();
            
            return view('Owner.properties', compact('properties', 'rec_properties'));
        }
        catch(\Exception $e){
            return redirect()->back()->with('error','No data Found');
        }
    }
        
    
}
