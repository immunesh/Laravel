<?php

namespace App\Http\Controllers\Owner;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\OwnerPlan;
use App\OwnerSubscription;
use App\User;
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
        $oplans= OwnerPlan::all();
        return view('Owner.pricing',compact('oplans'));
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

    public function subscribe($plan_id,$payment_id="NA"){
        $oplan= OwnerPlan::where('id', $plan_id)->first();
         
        $subs= new OwnerSubscription();
        $subs->plan_id = $plan_id;
        if($payment_id != "NA") {
             $subs->razor_pay_id = $payment_id;
        }
       
        $subs->user_id = \Auth::user()->id;
        $subs->no_of_lead= $oplan->no_of_tenant_sharing;
        $subs->plan_ex= \Carbon \Carbon::now()->addDays($oplan->duration);
        $subs->save();
       

        $user= User::find(\Auth::user()->id);
        $user->subscribed_plan_id = $plan_id;
        $user->update();
        return redirect('submit_property')->with('success','Congratulation! Now you can list Property');
    }



        public function owner_paid_subscription(Request $request){



        $api_key = "rzp_test_0xLy4mH4lPxkWB";
        $api_secret = "cheaJis0P4g16R7VsrdGrpY4";

        $api = new Api($api_key, $api_secret);
        $plan_id = $request->input('plan_id');

          $pay_id = $request->input('do_data'.$plan_id);

        
         //$pay_id ="pay_CsieNxsC6jJIJR";

             $payment = $api->payment->fetch($pay_id);


        $order = $api->order->create(array(
                  'receipt' => "Receipt #".$payment['id'],
                  'amount' => $payment['amount'],
                  'currency' => 'INR',
              )
            );

        $this->subscribe($plan_id,$order['id']);
        return redirect('submit_property')->with('success','Congratulation! Now you can list Property');

}


}