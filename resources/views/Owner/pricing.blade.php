@extends('layouts.about')
@section('content')
<div class="sub-banner overview-bgi" style="background: rgba(0, 0, 0, 0.04) url(../img/banner/banner-3.jpg) top left repeat; background-size:cover; background-position:center; background-repeat:no-repeat ">
    <div class="container">
        <div class="breadcrumb-area">
            <h1>Pricing Table</h1>
            <ul class="breadcrumbs">
                <li><a href="{{url('/')}}">Home</a></li>
                <li class="active">Owner Plans</li>
            </ul>
        </div>
    </div>
</div>

<!-- Pricing tables start -->
<div class="pricing-tables content-area">
    <div class="container">
        <!-- Main title -->
        <div class="main-title text-center">
            <h1>Property Owner Packages</h1>
            <p>Finding Your Perfect Plan.</p>
        </div>
        @if (session('error'))
            <div class="alert alert-danger" role="alert">
                {{ session('error') }}
            </div>
        @endif
        <div class="row">
            @foreach($oplans as $oplan)
                <div class="col-xl-4 col-lg-4 col-md-12">
                    <div class="pricing-1 plan">
                        <div class="plan-header">
                            <h5>{{$oplan->plan_name}}</h5>
                            @if($oplan->id == 1)
                                <p>We take 50% rent as closing commission </p>
                            @endif
                            <div class="plan-price"><sup>Rs</sup>{{$oplan->price}}<span>/{{$oplan->duration}} days</span> </div>
                        </div>
                        <div class="plan-list">
                            <ul>
                                @foreach(explode(',', $oplan->features) as $feature)
                                    <li>
                                        <i class="fa fa-check"></i>{{$feature}}
                                    </li>
                                @endforeach
                            </ul>
                            <div class="plan-button text-center">
                            @if($oplan->price == 0)
                                <a href="{{url('owner/subs/'.$oplan->id)}}" class="btn btn-outline pricing-btn {{(count(App\OwnerSubscription::where('plan_id',$oplan->id)->where('user_id',Auth::user()->id)->get()) == 0)?'': 'disabled'}}">
                                {{(count(App\OwnerSubscription::where('plan_id',$oplan->id)->where('user_id', Auth::user()->id)->get()) == 0)?'Subscribe': 'Already Subscribed'}}
                                </a>
                            @else 
                             <form method="get"  class="col-md-12" id="formafterMath<?php echo $oplan->id; ?>" action="{{url('owner_paid_subscription')}}" 
                  >
                  <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                       <input type="hidden" name="do_data<?php echo $oplan->id; ?>" id="do_data<?php echo $oplan->id; ?>" value="">
                        <input type="hidden" name="plan_id" id="plan_id" value="<?php echo $oplan->id; ?>">
                        <input type="hidden" name="plan_price" id="plan_price" value="<?php echo $oplan->price; ?>">



                            <button type="button" onclick="init_pay(<?php echo $oplan->id; ?>,<?php echo $oplan->price; ?>)" id="rzp-button<?php echo $oplan->id; ?>" class="btn btn-outline pricing-btn" style="cursor: pointer;"  >Subscribe</button>

                    </form>
                              

                     

                            @endif
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
            <div class="col-xl-8 col-lg-8 col-md-12">
                <div class="main-title text-center">
                    <h1>Faqs</h1>
                    <p></p>
                 </div>
                <div class="row">
                    <div class="col-lg-10 offset-lg-1">
                        <div id="faq" class="faq-accordion">
                            <div class="card m-b-0">
                                <div class="card-header">
                                    <a class="card-title collapsed" data-toggle="collapse" data-parent="#faq" href="#collapse1">
                                        What will the Relationship Manager do?
                                    </a>
                                </div>
                                <div id="collapse1" class="card-block collapse">
                                    <div class="p-text">
                                        The relationship manager will handle all enquiries on call and will filter tenants meeting your requirements, so that you can peacefully work & enjoy quality time with friends and family, while your relationship manager is out there searching for an ideal tenant.

                                    </div>
                                </div>
                                <div class="card-header">
                                    <a class="card-title collapsed" data-toggle="collapse" data-parent="#faq" href="#collapse2">
                                        How will my property get promoted?
                                    </a>
                                </div>
                                <div id="collapse2" class="card-block collapse">
                                    <div class="p-text">
                                       By subscribing to the Owner Plan you will boost your rentobro listing rank and your property will be listed higher on the property listing page.

                                    </div>
                                </div>
                                <div class="card-header">
                                    <a class="card-title collapsed" data-toggle="collapse" data-parent="#faq" href="#collapse3">
                                        What will happen in case of Social Media Marketing?
                                    </a>
                                </div>
                                <div id="collapse3" class="card-block collapse">
                                    <div class="p-text">
                                        Our main aim at Rentobro.com is to eliminate brokers from the rental scene and if we find a property listing by a user who is a broker or suspected to be 
                                    </div>
                                </div>
                                <div class="card-header">
                                    <a class="card-title collapsed" data-toggle="collapse" data-parent="#faq" href="#collapse4">
                                        What is the process of making rental agreement?
                                    </a>
                                </div>
                                <div id="collapse4" class="card-block collapse">
                                    <div class="p-text">
                                        You can make your rental agreement by following just 3 easy steps. Enter rental information and an appointment for biometric registration will be scheduled, as per your convenience. Our team will visit your house and the hard copy of your e-stamped rental agreement will be delivered to your doorstep. To create your own rental agreement,
                                    </div>
                                </div>
                                <div class="card-header">
                                    <a class="card-title collapsed" data-toggle="collapse" data-parent="#faq" href="#collapse5">
                                        Are there any hidden charges?
                                    </a>
                                </div>
                                <div id="collapse5" class="card-block collapse">
                                    <div class="p-text">
                                       Our expert marketing team will design promotional ads for your property and it will be posted through our rentobro Social media channels like Facebook.
                                    </div>
                                </div>
                                <div class="card-header">
                                    <a class="card-title collapsed" data-toggle="collapse" data-parent="#faq" href="#collapse6">
                                        How will I get faster closures?
                                    </a>
                                </div>
                                <div id="collapse6" class="card-block collapse">
                                    <div class="p-text">
                                       Your RM will find tenants for you from Our monthly active users. He will shortlist tenants based on your requirement and you just have to select your ideal tenant.
                                    </div>
                                </div>
                                <div>
                                    <h3>Terms and condition for Money back Plan
                                        For MoneyBack and Super MoneyBack Plans:</h3>

                                    <p>100% refund has to be claimed within a week of plan expiry

                                    For claiming the refund, you just need to submit a valid copy of your Rental Agreement.

                                    The rental agreement should match the requirement given to Rentobro. rentobro will verify the claim, this may include physical visit of the property premises.

                                    The rent and deposit amount in the registered rental agreement should be equal or higher than the one given to rentobro relationship manager at the time of plan subscription..</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>


                      <script src="https://checkout.razorpay.com/v1/checkout.js"></script></script><script>

function init_pay(plan_id,plan_price)
{


var options = {
    "key": "rzp_test_0xLy4mH4lPxkWB",
    "amount": parseInt(plan_price)*100 , //  = INR 1
    "name": "RentoBro Plan Subscribe",
    "description": "Paying using Razorpay for subscription .",
  
    "handler": function (response){
         $('#do_data'+plan_id).val(response.razorpay_payment_id);

            console.log("preparing");

         $("#formafterMath"+plan_id).submit();
    },
    "prefill": {
        "name": "<?php echo Auth::user()->name; ?>",
        "email": "<?php echo Auth::user()->email; ?>",
        "contact": "+91+<?php echo Auth::user()->phonenumber; ?>"
    },
    "notes": {
        
    },
     
    "theme": {
        "color": "#ff214f"
    }
};
var rzp1 = new Razorpay(options);
rzp1.open();

}
// document.getElementById('rzp-button1').onclick = function(e){
//     rzp1.open();
//     e.preventDefault();
// }






</script>


@endsection