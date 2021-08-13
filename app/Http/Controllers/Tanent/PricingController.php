<?php

namespace App\Http\Controllers\Tanent;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Plan;
use App\Subscription;
use App\User;
use App\ContactOwner;
use App\Appointment;
use App\OwnerPlanUsed;
use App\Property;
use App\OwnerPlan;
use App\OwnerSubscription;
use Razorpay\Api\Api;

class PricingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $packages= Plan::where('user_type','3')->get();
        return view('Tanent.pricing',compact('packages'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function subscription($plan_id,$payment_id="NA"){
        $subs= new Subscription();
        $subs->plan_id = $plan_id;
        $subs->user_id = \Auth::user()->id;
         if($payment_id != "NA") {
             $subs->razor_pay_id = $payment_id;
        }
        $subs->save();
        $user= User::find(\Auth::user()->id);
        $user->subscribed_plan_id = $plan_id;
        $user->update();
        return redirect('properties')->with('success','Enjoy! Your Plan is Activated');
    }





        public function tenant_paid_subscription(Request $request){



        $api_key = "rzp_test_0xLy4mH4lPxkWB";
        $api_secret = "cheaJis0P4g16R7VsrdGrpY4";

        $api = new Api($api_key, $api_secret);
        $plan_id = $request->input('package_id');

          $pay_id = $request->input('do_data'.$plan_id);

        
         //$pay_id ="pay_CsieNxsC6jJIJR";

             $payment = $api->payment->fetch($pay_id);


        $order = $api->order->create(array(
                  'receipt' => "Receipt #".$payment['id'],
                  'amount' => $payment['amount'],
                  'currency' => 'INR',
              )
            );

        $this->subscription($plan_id,$order['id']);
        return redirect('properties')->with('success','Enjoy! Your Plan is Activated');

}

    public function contactOwner($id){
        $colimit= Plan::where('id',\Auth::user()->subscribed_plan_id)->first()->no_of_contact_owner;
        $total_co= ContactOwner::where('user_id',\Auth::user()->id)->count('user_id');
        $dup= ContactOwner::where('user_id',\Auth::user()->id)->where('property_id',$id)->count();
        $pro_owner= Property::find($id)->user_id;
        $ownerSubs= \DB::table('owner_subscriptions')->where('user_id',$pro_owner)->first();

        if(\Auth::user()->id == $pro_owner || \Auth::user()->user_type== 1){
            return response()->json(['co_status'=>'success']);
        }
        if($pro_owner == 2){
            if($dup >= 1){
                return response()->json(['co_status'=>'success']);
            }
            else if($total_co < $colimit){
                $co= new ContactOwner();
                $co->property_id= $id;
                $co->user_id= \Auth::user()->id;
                $co->save();
               
                return response()->json(['co_status'=>'success']);
            }
            else{
                return response()->json(['co_status'=>'fail']);
            }
        }
        
        else if($ownerSubs == null || $ownerSubs->lead_used >= $ownerSubs->no_of_lead || $ownerSubs->plan_ex <= \Carbon \Carbon::now()){
            return response()->json(['co_status'=> 'planExpired']);
        }
        else{
            if($dup >= 1){
                return response()->json(['co_status'=>'success']);
            }
            else if($total_co < $colimit){
                $co= new ContactOwner();
                $co->property_id= $id;
                $co->user_id= \Auth::user()->id;

                $opu= new OwnerPlanUsed();
                $opu->tenant_id= \Auth::user()->id;
                $opu->property_id= $id;
                $opu->owner_id= $pro_owner;
                $opu->con_type= "Contact Owner";

                $co->save();
                $opu->save();

                $planused= OwnerPlanUsed::where('owner_id',$pro_owner)->count();
                \DB::table('owner_subscriptions')->where('user_id',$pro_owner)->update([
                    'lead_used'=> $planused
                ]);

                return response()->json(['co_status'=>'success']);
            }
            else{
                return response()->json(['co_status'=>'fail']);
            }
        }
        
    }

    public function appointment(Request $request){
        $meetingtime= $request->meetingtime;
        $id= $request->id;
        $appointlimit= Plan::where('id',\Auth::user()->subscribed_plan_id)->first()->no_of_appointment;
        $total_appoint= Appointment::where('user_id',\Auth::user()->id)->count();
        $dup_a= Appointment::where('user_id',\Auth::user()->id)->where('property_id',$id)->count();
        $pro_owner= Property::find($id)->user_id;
        $ownerSubs= OwnerSubscription::where('user_id',$pro_owner)->first();
        
        if(\Auth::user()->id == $pro_owner || \Auth::user()->user_type== 1){
            return response()->json(['co_status'=>'success']);
        }
        if($pro_owner == 2){
            if($dup_a >= 1){
                return response()->json(['co_status'=>'success']);
            }
            else if($total_appoint < $appointlimit){
                $appoint= new Appointment();
                $appoint->property_id= $id;
                $appoint->user_id= \Auth::user()->id;
                $appoint->appointment_time= $meetingtime;
                $appoint->save();

                return response()->json(['appoint_status'=>'success']);
            }
            else{
                return response()->json(['co_status'=>'fail']);
            }
        }

        else if($pro_owner != 2 || $ownerSubs == null || $ownerSubs->plan_ex <= \Carbon \Carbon::now() || $ownerSubs->lead_used >= $ownerSubs->no_of_lead){
            return response()->json(['appoint_status'=>'planExpired']);
        }
        else{
            if($dup_a >= 1){
                return response()->json(['appoint_status'=>'subscribed']);
            }
            else if($total_appoint < $appointlimit){
                $appoint= new Appointment();
                $appoint->property_id= $id;
                $appoint->user_id= \Auth::user()->id;
                $appoint->appointment_time= $meetingtime;

                $opu= new OwnerPlanUsed();
                $opu->tenant_id= \Auth::user()->id;
                $opu->property_id= $id;
                $opu->owner_id= $pro_owner;
                $opu->con_type= "Appointment";

                $appoint->save();
                $opu->save();

                $planused= OwnerPlanUsed::where('owner_id',$pro_owner)->count();
                \DB::table('owner_subscriptions')->where('user_id',$pro_owner)->update([
                    'lead_used'=> $planused
                ]);

                return response()->json(['appoint_status'=>'success']);
            }
            else{
                return response()->json(['appoint_status'=>'fail']);
            }
        }
    }
}
