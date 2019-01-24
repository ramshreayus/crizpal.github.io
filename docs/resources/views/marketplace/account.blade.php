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
                                <h1>Market Pace Account Details</h1>
                                <hr />
                                <div class="row">
                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                        <div class="btn-group button_ds">
                                            <button class="wcmp_ass_btn edit_billing btn tody">Edit</button>
                                        </div>
                                        <form method="post" name="shop_settings_form" class="wcmp_billing_form">
                                            <div class="wcmp_form1">
                                                <h4>Bank Information</h4>
                                                <p>Enter your Bank Details</p>
                                                <div class="two_third_part">
                                                    <div class="select_box no_input">
                                                        <select id="vendor_bank_account_type" disabled name="vendor_bank_account_type" class="user-profile-fields">
                                                            <option value="current">Current</option>
                                                            <option value="savings">Savings</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <input class="long no_input" readonly type="text" id="vendor_bank_account_number" name="vendor_bank_account_number" class="user-profile-fields" value="" placeholder="Account Holder Name" />
                                                <div class="half_part">
                                                    <input class="long no_input" readonly type="text" id="vendor_bank_name" name="vendor_bank_name" class="user-profile-fields" value="" placeholder="Bank Name" />
                                                </div>
                                                <div class="half_part">
                                                    <input class="long no_input" readonly type="text" id="vendor_aba_routing_number" name="vendor_aba_routing_number" class="user-profile-fields" value="" placeholder="ABA Routing Number" />
                                                </div>
                                                <div class="clear"></div>
                                                <textarea class="long no_input" readonly name="vendor_bank_address" cols="" rows="" placeholder="Bank Address"></textarea>
                                                <div class="one_third_part">
                                                    <input class="long no_input" readonly type="text" placeholder="Destination Currency" name="vendor_destination_currency" value="" />
                                                </div>
                                                <div class="one_third_part">
                                                    <input class="long no_input" readonly type="text" placeholder="IBAN"  name="vendor_iban" value="" />
                                                </div>
                                                <div class="one_third_part">
                                                    <input class="long no_input" readonly type="text" placeholder="Account Holder Name"  name="vendor_account_holder_name" value="" />
                                                    <div class="clear"></div>
                                                </div>
                                                <div class="action_div_space"> </div>
                                                <div class="action_div">                        
                                                    <!--div class="green_massenger"><i class="fa fa-check"></i> All Options Saved</div-->   
                                                    <button class="wcmp_orange_btn" name="store_save_billing" >Save Options</button>
                                                    <div class="clear"></div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <style>.wcmp_form1 p { font-size: 15px !important; }</style>                    
                        </div>
                    </div>
                </div>
            </div>
        </section>
    <!-- section for images -->
    


@endsection