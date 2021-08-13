<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Property;
use Validator;
use Auth;
use Illuminate\Support\Str;
use Intervention\Image\Image;
use App\ContactOwner;
use App\Appointment;
use App\OwnerPlanUsed;
use App\Agreement;

class PropertyController extends Controller
{
    public function admin_property(){
        return view('admin.submit_property');
    }

    public function store(Request $request)
    {
        try{
            $validator= Validator::make($request->all(),[
                'property_title'=>'required',
                // 'property_type'=>'required',
                // 'status'=>'required',
                // 'price'=>'required',
                // 'area'=>'required',
                // 'dpst_cost'=>'required',
                // 'mtnc_cost'=>'required',
                // 'address'=>'required',
                // 'state'=>'required',
                // 'postal_code'=>'required',
                // 'gallery'=>'required',
                
                'name'=>'required',
                'email'=>'required',
            ]);
            if($request->hasfile('gallery'))
            {
                $Filea=$request->file('gallery');
                $count=0;
                foreach($Filea as $image1)
                {
                     $count++;
                        $image = $image1;
                        $filename = Str::random()."as".$count.time() . '.' . $image->getClientOriginalExtension();
                        \Image::make($image)->resize(300, 300)->save(public_path("/uploads/" . $filename));
                        $data[] = $filename;

                }
            }
            if($validator->fails()){
                return redirect()->back()->with('error',$validator->errors());
            }
            $submit_property= new Property();
            $location= array("address"=> $request->address, "city"=> $request->city, "state"=> $request->state, 
                        "neighbourhood"=> $request->neighbourhood.$request->neighbourhoodI, "postal_code"=> $request->postal_code);
            $contact_detail= array("name"=> $request->name, "email"=> $request->email,
                         "phone"=> $request->phone);
            $feature= $request->input('feature');
    
            $submit_property->user_id= Auth::user()->id;
            $submit_property->property_title= $request->property_title;
            $submit_property->property_type= $request->property_type;
            $submit_property->status= $request->status;
            $submit_property->price= $request->price;
            $submit_property->area= $request->area;
            $submit_property->dpst_cost= $request->dpst_cost;
            $submit_property->mtnc_cost= $request->mtnc_cost;
            $submit_property->rooms= $request->rooms;
            $submit_property->bedrooms= $request->bedrooms;
            $submit_property->bathroom= $request->bathroom;
            $submit_property->rental_floor= $request->rental_floor;
            $submit_property->location= json_encode($location);
            $submit_property->gallery= json_encode($data);
           
            $submit_property->description= $request->description;
            if($feature != null)
                $submit_property->features= implode(",", $request->get('feature'));;
            $submit_property->contact_detail= json_encode($contact_detail);
            $submit_property->save();
            return redirect('/adminproperties')->with('success','Your Property Inserted successfully');
        }
        catch(ValidationException $e){
            return redirect()->back()->with('error',$e->getMessage())->withInput();
        }
    }

    public function edit($id)
    {
        $property= Property::find($id);
        return view('admin.edit_property',compact('property'));
    }

    public function update(Request $request, $id)
    {
        try{
            $validator= Validator::make($request->all(),[
                'property_title'=>'required',
                // 'status'=>'required',
                // 'price'=>'required',
                // 'area'=>'required',
                // 'dpst_cost'=>'required',
                // 'mtnc_cost'=>'required',
                // 'address'=>'required',
                // 'state'=>'required',
                // 'postal_code'=>'required',
                // 'gallery'=>'required',
                
                'name'=>'required',
                'email'=>'required',
            ]);
            if($request->hasfile('gallery'))
            {
                $Filea=$request->file('gallery');
                $count=0;
                foreach($Filea as $image1)
                {
                     $count++;
                        $image = $image1;
                        $filename = Str::random()."as".$count.time() . '.' . $image->getClientOriginalExtension();
                        \Image::make($image)->resize(300, 300)->save(public_path("/uploads/" . $filename));
                        $data[] = $filename;

                }
            }
            if($validator->fails()){
                return redirect()->back()->with('error',$validator->errors());
            }
            $submit_property= Property::find($id);
            $location= array("address"=> $request->address, "state"=> $request->state, "city"=> $request->city,
                        "neighbourhood"=> $request->neighbourhood.$request->neighbourhoodI, "postal_code"=> $request->postal_code);
            $contact_detail= array("name"=> $request->name, "email"=> $request->email,
                         "phone"=> $request->phone);
            $feature= $request->input('feature');
    
            $submit_property->property_title= $request->property_title;
            $submit_property->status= $request->status;
            $submit_property->price= $request->price;
            $submit_property->area= $request->area;
            $submit_property->dpst_cost= $request->dpst_cost;
            $submit_property->mtnc_cost= $request->mtnc_cost;
            $submit_property->rooms= $request->rooms;
            $submit_property->bedrooms= $request->bedrooms;
            $submit_property->bathroom= $request->bathroom;
            $submit_property->rental_floor= $request->rental_floor;
            $submit_property->location= json_encode($location);
            if($request->gallery != null)
            $submit_property->gallery= json_encode($data);
            
            $submit_property->description= $request->description;
            if($feature != null)
                $submit_property->features= implode(",", $request->get('feature'));;
            $submit_property->contact_detail= json_encode($contact_detail);
            $submit_property->update();
            return redirect('/adminproperties')->with('success','Your Property Updated successfully');
        }
        catch(ValidationException $e){
            return redirect()->back()->with('error',$e->getMessage());
        }
        
    }

    public function destroy($id)
    {
        ContactOwner::where('property_id',$id)->delete();
        Appointment::where('property_id',$id)->delete();
        OwnerPlanUsed::where('property_id',$id)->delete();
        Agreement::where('property_id',$id)->delete();
        Property::where('id',$id)->delete();
        return redirect('/adminproperties')->with('success','Property Deleted successfully');
    }

}
