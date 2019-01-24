@extends('layouts.master')
@section('title', 'Settings MarketPlace')
@section('pagebody')

 <div id="s-share-buttons" class="horizontal-w-c-circular s-share-w-c"></div>
        <section class="about_datails">
            <div class="bread_crumb">
                <div class="container">           
                    <ul class="breadcrumb">
                        <li><a href="#">HOME</a></li>
                        <li><a href="#">Marketplace Settings</a></li>
                    </ul>
                </div>
            </div><!-- bread_crumb -->
        </section>
        <section class="dash_board_pages">
            <div class="container">
                <div class="row">   
                    <div class="pages_content"> 
                        @include('marketplace.sidebar')
                        <div class="col-md-9 col-sm-9 col-xs-12">                       
                            <div class="new_dashboard">
                                <h1>Marketplace Settings</h1>
                                <hr />
                                <div class="row">
                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                        <div class="btn-group button_ds">
                                            <button class="wcmp_ass_btn edit_shop_settings btn tody">Edit</button>
                                        </div>
                                        <h4>General</h4>
                                        <form action="{{url('/')}}/marketplace/store" method="post" name="shop_settings_form" class="wcmp_shop_settings_form" enctype="multipart/form-data">
                                                    {{csrf_field()}} 
                                            <div class="wcmp_form1">
                                                <p>Store Name *<span class="tooltip_gybi"><i class="fa fa-question-circle"></i></span></p>
                                                <input class="no_input"  type="text" name="store_name" value=""  placeholder="Enter your Store Name here" />
                                                <p>Store Slug1 *<span class="tooltip_gybi"><i class="fa fa-question-circle"></i></span></p>
                                                <span style="display:block;" class="txt">
                                                    <input class="no_input"  type="text" name="store_slug"  value="" placeholder="Enter your Store Name here" />
                                                </span>             
                                                <p>Shop Description<span class="tooltip_gybi"><i class="fa fa-question-circle"></i></span>              
                                                <span class="input-group-addon beautiful" ><input type="checkbox" name="vendor_description"  value="Enable" ><span>Hide from user</span></span></p>                
                                                <textarea class="no_input"  name="description" cols="" rows="" placeholder="It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. "></textarea>               
                                                <p>Message to Buyers</p>
                                                <textarea class="no_input"  name="buyer_msg" cols="" rows="" placeholder="It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. "></textarea>             
                                                <div class="half_part">
                                                    <p>Phone <span class="input-group-addon beautiful" >
                                                    <input type="checkbox" name="vendor_hide_phone"  value="Enable" >
                                                    <span> Hide from user</span> </span> </p>
                                                    <input class="no_input"  type="text" name="phone" placeholder="" value="">
                                                </div>
                                                <div class="half_part">
                                                    <p>Email * <span class="input-group-addon beautiful" >
                                                        <input type="checkbox"  name="email_hide"  value="Enable" >
                                                        <span>Hide from user</span> </span></p>
                                                    <input class="no_input vendor_email"  type="text" name="email"  placeholder=""  value="" />
                                                </div>
                                                <div class="clear"></div>
                                                <p>Address <span class="input-group-addon beautiful" >
                                                <input type="checkbox" name="vendor_hide_address"  value="Enable" >
                                                <span>Hide from user</span> </span> </p>
                                                <input class="no_input"  type="text" placeholder="Addressl line 1" name="address_1"  value="" />
                                                <input class="no_input"  type="text" placeholder="Addressl line 2" name="address_2"  value="" />
                                                <div class="one_third_part">
                                                    <input class="no_input"  type="text" placeholder="Country" name="country" value="" />
                                                </div>
                                                <div class="one_third_part">
                                                    <input class="no_input"   type="text" placeholder="state"  name="state" value="" />
                                                </div>
                                                <div class="one_third_part">
                                                    <input class="no_input"  type="text" placeholder="city"  name="city" value="" />
                                                </div>
                                                <input class="no_input"  type="text" placeholder="Zipcode" style="width:50%;" name="zipcode" value="" />
                                                <!--div class="half_part">
                                                    <input class="no_input"  type="text" placeholder="External store URL" name="vendor_external_store_url" value="" />
                                                </div>
                                                <div class="half_part">
                                                    <input class="no_input"  type="text" placeholder="External store URL Label" name="vendor_external_store_label" value="" />
                                                </div-->                    
                                            </div>
                                            <h4>Media Files <span class="tooltip_gybi"><i class="fa fa-question-circle"></i>
                                                <span class="tooltip_gybitext tooltip_gybi-right">Add photos, videos, articles, etc. related to your products here.</span></span>
                                            </h4>
                                            <div class="wcmp_media_block">      
                                                <span class="dc-wp-fields-uploader">
                                                <img class="one_third_part" id="vendor_image_display" width="300" src="" class="placeHolder" />
                                                <input type="text" name="vendor_image" id="vendor_image" style="display: none;" class="user-profile-fields"  value=""  />
                                                <input type="button" class="upload_button wcmp_black_btn moregap two_third_part" name="vendor_image_button" id="vendor_image_button" value="" />
                                                <input type="button" class="remove_button wcmp_black_btn moregap two_third_part" name="vendor_image_remove_button" id="vendor_image_remove_button" value="" />
                                                </span>
                                                <div class="clear"></div>
                                            </div>
                                            <div class="wcmp_media_block">
                                                <span class="dc-wp-fields-uploader">
                                                    <img class="one_third_part" id="vendor_banner_display" width="300" src="" class="placeHolder" />
                                                    <input type="text" name="vendor_banner" id="vendor_banner" style="display: none;" class="user-profile-fields"  value=""  />
                                                    <input type="button" class="upload_button wcmp_black_btn moregap two_third_part" name="vendor_banner_button" id="vendor_banner_button" value="" />
                                                    <input type="button" class="remove_button wcmp_black_btn moregap two_third_part" name="vendor_banner_remove_button" id="vendor_banner_remove_button" value="" />
                                                </span>
                                                <div class="clear"></div>
                                            </div>
                                            <h4>Social Media</h4>
                                            <div class="wcmp_media_block">
                                                <p>Enter your Facebook, Twitter, etc. profile URL below:</p>
                                                <div class="full_part"><img src="{{url('/')}}/assets_new/img/facebook.png" alt="" class="social_icon" >
                                                  <input class="long no_input"  type="text"   name="fb_link" value="">
                                                </div>
                                                <div class="full_part"><img src="{{url('/')}}/assets_new/img/twitter.png" alt="" class="social_icon">
                                                  <input class="long no_input"  type="text"   name="tw_link" value="">
                                                </div>
                                                <div class="full_part"><img src="{{url('/')}}/assets_new/img/linkedin_33x35.png" alt="" class="social_icon">
                                                  <input class="long no_input"  type="text"  name="linked_link" value="">
                                                </div>
                                                <div class="full_part"><img src="{{url('/')}}/assets_new/img/googleplus.png" alt="" class="social_icon">
                                                  <input class="long no_input"  type="text"   name="gp_link" value="">
                                                </div>
                                                <div class="full_part"><img src="{{url('/')}}/assets_new/img/youtube.png" alt="" class="social_icon wcmp_to_disable">
                                                  <input class="long no_input"  type="text"   name="yt_link" value="">
                                                </div>
                                                <div class="full_part"><img src="{{url('/')}}/assets_new/img/instagram.png" alt="" class="social_icon wcmp_to_disable">
                                                  <input class="long no_input"  type="text"   name="insta_link" value="">
                                                </div>
                                                <div class="clear"></div>
                                            </div>      
                                            <div class="action_div_space"> </div>
                                            <p class="error_wcmp">* This field is required, you must fill some information.</p>
                                            <div class="action_div">                
                                                <!--div class="green_massenger"><i class="fa fa-check"></i> All Options Saved</div-->
                                                <button class="wcmp_orange_btn" name="store_save">Save Options</button>
                                                <div class="clear"></div>
                                            </div>
                                        </form>
                                    </div>
                                </div>    
                            </div>
                            <style>
                            .input-group .form-control, .input-group-addon, .input-group-btn {
                                display: inline !important; float: none !important; background: none !important; border:none !important; font-size: small; }.wcmp_form1 p { font-size: 15px !important; }
                            </style>
                                                        
                        </div>
                    </div>
                </div>
            </div>
        </section>
    <!-- section for images -->


@endsection