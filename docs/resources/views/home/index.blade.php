@extends('layouts.master')
@section('title', 'Home')
@section('pagebody')

<!-- Start Inner Contents -->       
        
        <section class="working-process">
            <div class="container">
                <h1 class="text-center">How it Works</h1>
                <div class="row">
                    <div class="col-md-3 col-sm-6 col-xs-12 res-worklist chevron animated fadeInLeft">
                        <div class="work-list">
                            <figure class="text-center">
                                <img src="{{url('/')}}/assets_new/images/business-plan.png" alt="SUBMIT YOUR BUSINESS PLAN" >
                                <h3>Become an </br>Entrepreneur!</h3>
                                <p class="working_p" style="height: 96px;">Share your business plan with potential investors and supporters on the AIM platform.</p>
                                <button onclick="location.href='{{url('/ent-register')}}'" style="padding:10px;border:none; border-radius:8px;background-color:#ff3e02;color:#ffffff;padding: 15px 32px;text-align: center;text-decoration: none;display: inline-block;font-size: 16px;">
                                    <a style="color:#ffffff;" href="#">Sign Up</a>
                                </button>
                            </figure>
                            <br><br>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6 col-xs-12 res-worklist chevron2 animated fadeInLeft">
                        <div class="work-list">
                            <figure class="text-center">
                                <img src="{{url('/')}}/assets_new/images/feedback.png" alt="GET EXPERT FEEDBACK" >
                                <h3>Become an <br>Investor!</h3>
                                <p class="working_p" style="height: 96px;">Connect with and receive feedback from experts to improve your business plan.</p>
                                <button onclick="location.href='{{url('/inv-register')}}'" style="padding:10px;border:none; border-radius:8px;background-color:#ff3e02;color:#ffffff;padding: 15px 32px;text-align: center;text-decoration: none;display: inline-block;font-size: 16px;">
                                <a style="color:#ffffff;" href="#">Sign Up</a>
                                </button>
                            </figure>
                            <br><br>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6 col-xs-12 chevron animated fadeInRight">
                        <div class="work-list">
                            <figure class="text-center">
                                <img src="{{url('/')}}/assets_new/images/funding.png" alt="PICK YOUR FUNDING OPTION" >
                                <h3>Become an </br>Organization!</h3>
                                <p class="working_p" style="height: 96px;">Secure funding for your business by selecting from a wide range of options.</p>
                                <button onclick="location.href='{{url('/org-register')}}'" style="padding:10px;border:none; border-radius:8px;background-color:#ff3e02;color:#ffffff;padding: 15px 32px;text-align: center;text-decoration: none;display: inline-block;font-size: 16px;">
                                    <a style="color:#ffffff;" href="#">Sign Up</a>
                                </button>                        
                            </figure>
                            <br><br>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6 col-xs-12 chevron2 animated fadeInRight">
                        <div class="work-list">
                            <figure class="text-center">
                                <img src="{{url('/')}}/assets_new/images/business-grow.png" alt="GROW YOUR BUSINESS" >
                                <h3>Become a </br>Supporter!</h3>
                                <p class="working_p" style="height: 96px;">Scale your business and connect with mentors, coaches, investors, and other entrepreneurs for professional advice. </p>
                                <button onclick="location.href='{{url('/sup-register')}}'" style="padding:10px;border:none; border-radius:8px;background-color:#ff3e02;color:#ffffff;padding: 15px 32px;text-align: center;text-decoration: none;display: inline-block;font-size: 16px;">
                                    <a style="color:#ffffff;" href="#">Sign Up</a>
                                </button>                        
                            </figure>
                            <br><br>
                        </div>
                    </div>
                </div>  <br>
        <div class="nav pills tomato_link">
            <li class="col-md-4"><a href="{{url('/entrepreneur')}}/search/11" style="color: white;font-size: 20px;text-align: center;">Recent Entrepreneurs</a></li>  
            <li class="col-md-4"><a href="{{url('/entrepreneur')}}/search/12" style="color: white;font-size: 20px;text-align: center;">Top Entrepreneurs</a>  </li>        
            <li class="col-md-4"><a href="{{url('/entrepreneur')}}/search/13" style="color: white;font-size: 20px;text-align: center;">Featured Entrepreneurs</a> </li>         
        </div>
            </div>
        </section>
        
<!-- End Inner Contents -->                 
                        

@endsection