<?php

namespace App\Http\Controllers\Owner;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Property;
use Validator;
use Auth;
use DB;
use Illuminate\Support\Str;
use Intervention\Image\Image;
use App\ContactOwner;
use App\Appointment;
use App\OwnerPlanUsed;
use App\Agreement;
use Razorpay\Api\Api;


class PropertyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $properties= Property::orderBy('id','DESC')->paginate(10);
        $rec_properties= Property::orderBy('id','desc')->take(3)->get();
        return view('Owner.properties', compact('properties','rec_properties'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(\Auth::user()->subscribed_plan_id != null){
            return view('Owner.submit_property');
        }
        else{
            return redirect('owner/pricing')->with('error','Please Subscribe a Plan');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
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
            $location= array("address"=> $request->address, "state"=> $request->state, "city"=> $request->city,
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
            return redirect('/submit_property')->with('success','Your Property Inserted successfully');
        }
        catch(ValidationException $e){
            return redirect()->back()->with('error',$e->getMessage())->withInput();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $property= Property::find($id);
        return view('Owner.edit_property',compact('property'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
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
                $submit_property->features= implode(",", $request->get('feature'));
            $submit_property->contact_detail= json_encode($contact_detail);
            $submit_property->update();
            return redirect('/owner/my_properties')->with('success','Your Property Updated successfully');
        }
        catch(ValidationException $e){
            return redirect()->back()->with('error',$e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        ContactOwner::where('property_id',$id)->delete();
        Appointment::where('property_id',$id)->delete();
        OwnerPlanUsed::where('property_id',$id)->delete();
        Agreement::where('property_id',$id)->delete();
        Property::where('id',$id)->delete();
        return redirect('/owner/my_properties')->with('success','Property Deleted successfully');
    }

    public function property_detail($id){
         $is_booked=  DB::table('booked_property')
                     ->select("*")
                     ->where('property_id', '=', $id)                    
                     ->first();
        $property= Property::where('id',$id)->first();
        $sim_properties= Property::where('status',$property->status)
                        ->where('location->address', json_decode($property->location)->address)
                        ->orWhere('property_type', $property->property_type)
                        ->get()->except($property->id); 
        $rec_properties= Property::orderBy('id','desc')->take(3)->get();
        $gallery= json_decode($property->gallery);
        return view('Owner.property_detail', compact('property', 'sim_properties','rec_properties','gallery','is_booked'));
    }

    public function search(Request $request){
        // try{
            $status= $request->status;
            $property_type= $request->property_type;
            $neighbour= $request->neighbour;
            $bedrooms= $request->bedrooms;
            $bathrooms= $request->bathroom;
            $room= $request->room;
            $rental_floor= $request->rental_floor;
            $location= $request->location;
            $area= $request->area;
            $min_price= $request->price;
            $sa_status= \DB::table('properties')->where('status','=',$status)->get()->toArray();
            $sa_neighbour= \DB::table('properties')->where('location->neighbourhood','=',$neighbour)->get()->toArray();
            $sa_bedroom= \DB::table('properties')->where('bedrooms','=',$bedrooms)->get()->toArray();
            $sa_bathroom= \DB::table('properties')->where('bathroom','=',$bathrooms)->get()->toArray();
            $sa_room= \DB::table('properties')->where('rooms','=',$room)->get()->toArray();
            $sa_location= \DB::table('properties')->where('location->address','=',$location)->get()->toArray();
            $sa_property_type= \DB::table('properties')->where('property_type','=',$property_type)->get()->toArray();
            $sa_rental= \DB::table('properties')->where('rental_floor',$rental_floor)->get()->toArray();
            $sa_area= \DB::table('properties')->where('area',$area)->get()->toArray();
            $sa_price= \DB::table('properties')->where('price','>',$min_price)->get()->toArray();
            $property_arr= array_merge($sa_status, $sa_neighbour, $sa_bedroom, $sa_bathroom, $sa_room, $sa_location, $sa_property_type, $sa_rental, $sa_area, $sa_price);
            
            $items = array();
            foreach ($property_arr as $c) {
                $items[$c->id] = $c; // Get unique country by code.
            }
            $data= collect($items);
            $properties = $data->paginate(10); //Filter the page var
                         
            $rec_properties= Property::orderBy('id','desc')->take(3)->get();
            // return dd($sa_bedroom);
            return view('Owner.properties', compact('properties','rec_properties'));
        // }
        // catch(\Exception $e){
        //     return redirect()->back()->with('error','No data Found');
        // }
    }
    
    public function type_property($type){
        try{
            $properties= Property::where('property_type',$type)->paginate(5);
            $rec_properties= Property::orderBy('id','desc')->take(3)->get();
            return view('Owner.properties',compact('properties','rec_properties'));
        }
        catch(\Exception $e){
            return redirect()->back()->with('error','Something Went Wrong');
        }
    }

    public function property_booking(Request $request){



        $api_key = "rzp_test_0xLy4mH4lPxkWB";
        $api_secret = "cheaJis0P4g16R7VsrdGrpY4";

        $api = new Api($api_key, $api_secret);
          $pay_id = $request->input('do_data');
         //$pay_id ="pay_CsieNxsC6jJIJR";

             $payment = $api->payment->fetch($pay_id);


        $order = $api->order->create(array(
                  'receipt' => "Receipt #".$payment['id'],
                  'amount' => $payment['amount'],
                  'currency' => 'INR',
              )
            );

        //save order 
        $is_booked=  DB::table('booked_property')
                     ->select("*")
                     ->where('property_id', '=', $request->input('property_id'))             
                     ->where('booker_id', '=', Auth::user()->id)         
                     ->first();

                     if(empty($is_booked))
                     {
          $save= DB::table('booked_property')->insert(
    [

         'property_id' => $request->input('property_id'),
         'booker_id' => Auth::user()->id,
         'razor_pay_id' => $order['id']


    ]);

          if($save)
          {
            return view('Owner.success');
          }
          else
          {
            return view('Owner.error');
          }
          

             }
             return view('Owner.error');

    }
}

