@extends('layouts.about')
@section('content')
<style>
a.disabled {
  pointer-events: none;
  cursor: default;
}
</style>
<div class="sub-banner overview-bgi" style="background: rgba(0, 0, 0, 0.04) url(../img/banner/banner-3.jpg) top left repeat; background-size:cover; background-position:center; background-repeat:no-repeat ">
    <div class="container">
        <div class="breadcrumb-area">
            <h1>Pricing Tables</h1>
            <ul class="breadcrumbs">
                <li><a href="{{url('/')}}">Home</a></li>
                <li class="active">Tenant Plans</li>
            </ul>
        </div>
    </div>
</div>
<!-- Pricing tables start -->
<div class="pricing-tables content-area">
    <div class="container">
        <!-- Main title -->
        <div class="main-title text-center">
            <h1>Tenant Packages</h1>
            <p>Finding your perfect package.</p>
        </div>
        <div class="row">
            @foreach($packages as $package)
                <div class="col-xl-4 col-lg-4 col-md-12">
                    <div class="pricing-1 plan">
                        <div class="plan-header">
                            <h5>{{$package->plan_name}}</h5>
                            <div class="plan-price"><sup>Rs</sup>{{$package->price}}<span>/{{$package->duration}}</span> </div>
                        </div>
                        <div class="plan-list">
                            <ul>
                                @foreach(explode(',', $package->features) as $feature)
                                    <li>
                                        <i class="fa fa-star"></i>{{$feature}}
                                    </li>
                                @endforeach
                            </ul>
                            <div class="plan-button text-center">
                            @if($package->price == 0)
                                <a href="{{url('subscription/'.$package->id)}}" class="btn btn-outline pricing-btn {{(count(App\Subscription::where('plan_id',$package->id)->where('user_id',Auth::user()->id)->get()) == 0)?'': 'disabled'}}">
                                {{(count(App\Subscription::where('plan_id',$package->id)->where('user_id', Auth::user()->id)->get()) == 0)?'Subscribe': 'Already Subscribed'}}
                                </a>
                            @else 
                             <!--    <a href="#" onclick="alert('Currently You can subscribe only free Plan')" class="btn btn-outline pricing-btn">Subscribe</a> -->


                             <form method="get"  class="col-md-12" id="formafterMath<?php echo $package->id; ?>" action="{{url('tenant_paid_subscription')}}" 
                  >
                  <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                       <input type="hidden" name="do_data<?php echo $package->id; ?>" id="do_data<?php echo $package->id; ?>" value="">
                        <input type="hidden" name="package_id" id="package_id" value="<?php echo $package->id; ?>">
                        <input type="hidden" name="package_price" id="package_price" value="<?php echo $package->price; ?>">



                            <button type="button" onclick="init_pay(<?php echo $package->id; ?>,<?php echo $package->price; ?>)" id="rzp-button<?php echo $package->id; ?>" class="btn btn-outline pricing-btn" style="cursor: pointer;"  >Subscribe</button>

                    </form>
                            @endif
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
            
            <!-- <div class="col-xl-4 col-lg-4 col-md-12">
                <div class="pricing-1 plan">
                    <div class="plan-header">
                        <h5>Easy Plan</h5>
                        <div class="plan-price"><sup>Rs</sup>499<span>/one time</span> </div>
                    </div>
                    <div class="plan-list">
                        <ul>
                            <li><i class="fa fa-star"></i>Relationship Manager</li>
                            <li><i class="fa fa-star"></i>5 Owner Contacts Sharing</li>
                            <li><i class="fa fa-star"></i>3 Property Visit</li>
                            <li><i class="fa fa-star"></i>Instant Property Alert</li>
                            <li><i class="fa fa-star"></i>Property Locality Alert</li>
                            <li><i class="fa fa-star"></i>Contact Owner and fixes Meetings</li>
                            <li><i class="fa fa-star"></i>Negotiates On your behalf</li>
                        </ul>
                        <div class="plan-button text-center">
                            <a href="#" class="btn btn-outline pricing-btn button-theme">Subscribe</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-lg-4 col-md-12">
                <div class="pricing-1 plan">
                    <div class="plan-header">
                        <h5>Relax Plan</h5>
                        <div class="plan-price"><sup>Rs</sup>999<span>/one time</span> </div>
                    </div>
                    <div class="plan-list">
                        <ul>
                            <li><i class="fa fa-star"></i>Refundable</li>
                            <li><i class="fa fa-star"></i>10 Property Contacts Sharing</li>
                            <li><i class="fa fa-star"></i>10 Property Visit</li>
                            <li><i class="fa fa-star"></i>15 Owner Contacts Sharing</li>
                            <li><i class="fa fa-star"></i>Locality Experts</li>
                            <li><i class="fa fa-star"></i>Contact Owner and Fixes Meeting</li>
                            <li><i class="fa fa-star"></i>Negotiates rent on your behalf</li>
                        </ul>
                        <div class="plan-button text-center">
                            <a href="#" class="btn btn-outline pricing-btn">Subscribe</a>
                        </div>
                    </div>
                </div>
            </div> -->
        </div>
    </div>
</div>
<!-- Pricing tables end -->
<div class="faq content-area-9">
    <div class="container">
        <!-- Main title -->
        <div class="main-title text-center">
            <h1>Faqs</h1>
            <p>We take a 100% Refundable deposit of 500rs in order  to ensure that we work only for serious buyers.</p>
        </div>
        <div class="row">
            <div class="col-lg-10 offset-lg-1">
                <div id="faq" class="faq-accordion">
                    <div class="card m-b-0">
                        <div class="card-header">
                            <a class="card-title collapsed" data-toggle="collapse" data-parent="#faq" href="#collapse1">
                                Who is the Relationship Manager?
                            </a>
                        </div>
                        <div id="collapse1" class="card-block collapse">
                            <div class="p-text">
                                Relationship Manager is an expert who is aware of all property details. Once your payment is successfully processed, then a  relationship manager is assigned to you. who will contact you and understand your property requirements in detail and start sending you matching properties on a regular basis on emails or whatsapp as per your convenience. He will also help you with site visits for the properties you have shortlisted and try to get you the best deal from the seller.

                            </div>
                        </div>
                        <div class="card-header">
                            <a class="card-title collapsed" data-toggle="collapse" data-parent="#faq" href="#collapse2">
                                Why do you take a security deposit Rs 500 when you say it is FREE? Is it refundable?
                            </a>
                        </div>
                        <div id="collapse2" class="card-block collapse">
                            <div class="p-text">
                               We take this security deposit in oder to ensure that the related  relationship manager focus only concerned buyers. Rentobro as a site is completely free for all buyers looking for home. Since there are dedicated field executive move around in search of home in order to fullfill your dream home. We take a minimum security deposit in order to make you feel that we are serious about your work. But the Deposit taken is 100% refundable and paid when a buyer finds his dream home or 4months which ever is earlier. This service is completely free and the deposit is 100% refunded without any conditions.

                            </div>
                        </div>
                        <div class="card-header">
                            <a class="card-title collapsed" data-toggle="collapse" data-parent="#faq" href="#collapse3">
                                How can I make my payment?
                            </a>
                        </div>
                        <div id="collapse3" class="card-block collapse">
                            <div class="p-text">
                                After filling up your form which contans your basic contact details and property requirements etc, you can make an online payment or cash payment in our office, through cheque in our collection centers. You can also make bank transfers and send a mail to our customer care executive with your transaction details.

                            </div>
                        </div>
                        <div class="card-header bd-none">
                            <a class="card-title collapsed" data-toggle="collapse" data-parent="#faq" href="#collaps4">
                                Will you charge a brokerage or any other fees If I find a home?
                            </a>
                        </div>
                        <div id="collapse4" class="card-block collapse">
                            <div class="p-text">
                                No! This service is completely free, we dont charge any brokerage even after you find your dream home. We will be happy to helped you finding your home and refund your deposit without any condition.

                            </div>
                        </div>
                        <div class="card-header">
                            <a class="card-title collapsed" data-toggle="collapse" data-parent="#faq" href="#collapse5">
                                What if I dont find my home? Will I be charged? Can I extend this?
                            </a>
                        </div>
                        <div id="collapse5" class="card-block collapse">
                            <div class="p-text">
                              No we provide this service for a period of 4 months. In this period, we try to provide you properties matching your needs that are available with us. In case you still didn't find your dream home, the deposit is refundable back to you without condition. This program is a one time service for a user. Hence we do not extend this further.
                            </div>
                        </div>
                         <div class="card-header bd-none">
                            <a class="card-title collapsed" data-toggle="collapse" data-parent="#faq" href="#collapse6">
                                I am looking for a Rental Property, Can I enroll for this program?
                            </a>
                        </div>
                        <div id="collapse6" class="card-block collapse">
                            <div class="p-text">
                                YEs , You can enroll for the program.
                            </div>
                        </div>
                         <div class="card-header bd-none">
                            <a class="card-title collapsed" data-toggle="collapse" data-parent="#faq" href="#collapse7">
                                This program seems too be good to be true. what's the catch(trust)? How do I trust you?
                            </a>
                        </div>
                        <div id="collapse7" class="card-block collapse">
                            <div class="p-text">
                                Yes it is true and there is no catch. We are in the business of connecting buyers and sellers wherein we are paid by the advertisers for their property listings. This program aims to bring the segment of serious buyers and sellers together. It is initiated by rentobro.com, a venture by Gear Up Marketing, one of the biggest and most trusted Brands in the Media across Jabalpur.

                            </div>
                        </div>
                        <div class="card-header bd-none">
                            <a class="card-title collapsed" data-toggle="collapse" data-parent="#faq" href="#collapse8">
                                Is my enrollment confirmed post payment?
                            </a>
                        </div>
                        <div id="collapse8" class="card-block collapse">
                            <div class="p-text">
                                Yes. However, rentobro reserves the right to withheld the service and refund the entire amount back based on the seriousness of the buyer.
                            </div>
                        </div>
                        <div class="card-header bd-none">
                            <a class="card-title collapsed" data-toggle="collapse" data-parent="#faq" href="#collapse9">
                                I paid the amount but I didn't recieve any notifications. What should I do?
                            </a>
                        </div>
                        <div id="collapse9" class="card-block collapse">
                            <div class="p-text">
                                First thing will be to relax since all the payment made to rentobro are securely tracked and safe. In case of any discrepancies, you can write to us at info@rentobro.com or contact us on 8081 381 382.
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

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