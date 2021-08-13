@extends('layouts.about')
@section('content')
<!-- Sub banner start -->
<div class="sub-banner overview-bgi" style="background: rgba(0, 0, 0, 0.04) url(../img/banner/banner-3.jpg) top left repeat; background-size:cover; background-position:center; background-repeat:no-repeat ">
    <div class="container">
        <div class="breadcrumb-area">
            <h1>FAQ</h1>
            <ul class="breadcrumbs">
                <li><a href="{{url('/')}}">Home</a></li>
                <li class="active">faq</li>
            </ul>
        </div>
    </div>
</div>
<!-- Sub Banner end -->
<!-- Faq start -->
<div class="faq content-area-9">
    <div class="container">
        <!-- Main title -->
        <div class="main-title text-center">
            <h1>Faq</h1>
            <p>Got a question? We've got answers. If you have some other questions, see our support center.</p>
        </div>
        <div class="row">
            <div class="col-lg-10 offset-lg-1">
                <div id="faq" class="faq-accordion">
                    <div class="card m-b-0">
                        <div class="card-header">
                            <a class="card-title collapsed" data-toggle="collapse" data-parent="#faq" href="#collapse1">
                                Why do I need a verified account to use Rentobro services?
                            </a>
                        </div>
                        <div id="collapse1" class="card-block collapse">
                            <div class="p-text">
                                At Rentobro.com our main aim is to eliminate brokers from whole rental scene. In order to achieve that we verify each owner/tenant's account and activate it after verifying that the user is genuine.
                            </div>
                        </div>
                        <div class="card-header">
                            <a class="card-title collapsed" data-toggle="collapse" data-parent="#faq" href="#collapse2">
                                I received a SMS stating that my property listing was rejected, Can you explain why?
                            </a>
                        </div>
                        <div id="collapse2" class="card-block collapse">
                            <div class="p-text">
                                Our main aim at Rentobro.com is to eliminate brokers from the rental scene and if we find a property listing by a user who is a broker or suspected to be a broker, we reject the listing. While doing so we may end up rejecting genuine listings sometimes. For such cases, please contact us on +91-8839799621 (call or whatsapp) or drop us a mail on hello@rentobro.com
                            </div>
                        </div>
                        <div class="card-header">
                            <a class="card-title collapsed" data-toggle="collapse" data-parent="#faq" href="#collapse3">
                                Can I view properties until my account is verified?
                            </a>
                        </div>
                        <div id="collapse3" class="card-block collapse">
                            <div class="p-text">
                                Yes, you can search and shortlist the properties with an un-verified account. But to receive owner's email & phone number you will have to wait for the account verification to complete.
                            </div>
                        </div>
                        <div class="card-header bd-none">
                            <a class="card-title collapsed" data-toggle="collapse" data-parent="#faq" href="#collaps4">
                                I am new to city, how can I use Rentobro to find a suitable house for me?
                            </a>
                        </div>
                        <div id="collapse4" class="card-block collapse">
                            <div class="p-text">
                                To help new migrants to the city, we have map search feature which provides the exact location of the property on the map. You can also look for details such as nearby schools, hospital etc. on the map on the detail page of the property
                            </div>
                        </div>
                        <div class="card-header">
                            <a class="card-title collapsed" data-toggle="collapse" data-parent="#faq" href="#collapse5">
                                I didn't find property for my requirement, what should i do?
                            </a>
                        </div>
                        <div id="collapse5" class="card-block collapse">
                            <div class="p-text">
                               Please post your requirements using "Post your Requirement" button on top right corner of the page and our system will recommend a property as soon as it finds something matching your requirement.
                            </div>
                        </div>
                         <div class="card-header bd-none">
                            <a class="card-title collapsed" data-toggle="collapse" data-parent="#faq" href="#collapse6">
                                What's the rent that I can get for my property?
                            </a>
                        </div>
                        <div id="collapse6" class="card-block collapse">
                            <div class="p-text">
                                Relationship Manager has city level knowledge of rents in various localities, He will provide the rent consultation and inform you about the correct rent to be quoted for your property.
                            </div>
                        </div>
                         <div class="card-header bd-none">
                            <a class="card-title collapsed" data-toggle="collapse" data-parent="#faq" href="#collapse7">
                                How will my relationship manager help me negotiate the rent?
                            </a>
                        </div>
                        <div id="collapse7" class="card-block collapse">
                            <div class="p-text">
                                Your Relationship Manager tries to negotiate rent for in case there are inconsistencies in rent amount as per the market standard in the specific locality. However, rent and deposit amount are on the sole discretion of the owners.
                            </div>
                        </div>
                        <div class="card-header bd-none">
                            <a class="card-title collapsed" data-toggle="collapse" data-parent="#faq" href="#collapse8">
                                Will Relationship Manager be present during the house visit?
                            </a>
                        </div>
                        <div id="collapse8" class="card-block collapse">
                            <div class="p-text">
                                We help our customers shortlist properties and speak with owners on their behalf to set up meeting appointments. Hence, there is no need to get on the field. Once the appointment is fixed all that you would have to do is to visit the property and we will finalise the deal..
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Faq end -->
@endsection