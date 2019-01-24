@extends('layouts.master')
@section('title', 'MarketPlace')
@section('pagebody')

 <section class="sliders">
        <div class="container">
            <div class="center-block slider_content">
                <h1 class="slideInDown animated">market place</h1>
                <p>This is for you if you need extra cash or want to sell or buy a product & Serivce</p>              
                <div class="input-group main_sec"> 
                    <form role="search" method="get" id="searchform" action="#">
                        <input type="text" value="" name="search"  class="form-control" placeholder="Search by product">
                        <i class="fa fa-search" aria-hidden="true"></i>
                        <div class="select-style">
                            <select name="cat" id="cat" class="postform">
                                <option class="level-0" value="562">Industry</option>
                                <option class="level-0" value="563">Social Entrepreneur</option>
                                <option class="level-0" value="564">Youth</option>
                                <option class="level-0" value="565">Diaspora</option>
                                <option class="level-0" value="566">Women</option>
                                <option class="level-0" value="567">Uncategorized</option>
                            </select>
                        </div>
                    </form>
                </div>
                <ul class="sec_list">
                    <li><a href="{{url('/')}}/requirement-new">Add Product Enquiry</a></li>
                    <li><div></div></li>
                    <li><a href="{{url('/')}}/requirement-list">Product Enquirys</a></li>                
                </ul>
            </div><!-- slider_content -->
            <ul class="s_list">
                <li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                <li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                <li><a href="#"><i class="fa fa-google-plus" aria-hidden="true"></i></a></li>
                <li><a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
            </ul>
        </div>
    </section>
    <!-- section for images -->
    <section class="mourinze_tomato">        
        <div class="container">
            <ul class="nav pills tomato_link">
                <li class="active"><a href="#most" data-toggle="tab">most recent</a></li>
                <li><div class="cent_line"></div></li>
                <li><a href="#top" data-toggle="tab">top products</a></li>
                <li><div class="cent_line"></div></li>            
                <li><a href="#feature" data-toggle="tab">featured products</a></li>             
            </ul> 
            <!-- Most Recent -->
            <div class="tab-content right_divs">
                <div class="tab-pane text-style 123 active" id="most">
                    <div class="row">
                        <div class="woocommerce columns-4">   
                        @foreach($products as $product)          
                            <div class="col-md-2 col-xs-12 img_sec">
                                <div class="reach" style="height: 289px;">
                                    <div class="animate_img">
                                        <div class="loop_prdt_img">             
                                            <img src="{{$product->imagepath}}" class="attachment-shop_catalog img-responsive size-shop_catalog img-responsive wp-post-image" alt="5" srcset="{{$product->imagepath}} 300w, images/5.jpg 150w, {{$product->imagepath}} 180w" sizes="(max-width: 300px) 100vw, 300px" pagespeed_url_hash="816394685" onload="pagespeed.CriticalImages.checkImageForCriticality(this);" width="300" height="300">
                                        </div>
                                        <div class="textbox">
                                            <div class="v_center">
                                                <form class="cart1" action="{{url('/')}}/buynow" method="post">
                                                    {{csrf_field()}}
                                                    <input name="product_id" value="{{$product->id}}" type="hidden">
                                                    <button type="submit" class="btn btn-primary btn-lg btn-block">BUY NOW</button>
                                                </form>                                                             
                                                <button type="button" class="btn btn-primary btn-lg btn-block" data-toggle="modal" data-target="#myModal{{$product->id}}">DETAILS</button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="clearfix">
                                        <h6>{{$product->name}}</h6>
                                        <div class="mar_rating"></div>
                                    </div>
                                    <div class="modal fade" id="myModal{{$product->id}}" role="dialog">
                                        <div class="modal-dialog modal-lg">
                                            <div class="modal-content">
                                                <div class="">
                                                    <button type="button" class="close" data-dismiss="modal">x</button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="row">
                                                        <div class="col-md-5 col-sm-5 col-xs-12">
                                                            <div class="pop_img">
                                                                <figure>
                                                                    <img src="{{$product->imagepath}}" class="attachment-shop_catalog img-responsive size-shop_catalog img-responsive wp-post-image" alt="5" srcset="{{$product->imagepath}} 300w, images/5.jpg 150w, {{$product->imagepath}} 180w" sizes="(max-width: 300px) 100vw, 300px" pagespeed_url_hash="816394685" onload="pagespeed.CriticalImages.checkImageForCriticality(this);" width="300" height="300">                                         
                                                                </figure>
                                                                <ul>
                                                                    <li id="shareit-menu" class="share" tabindex="1000"><a class="addthis_button_compact">
                                                                        <i class="fa fa-plus" aria-hidden="true"></i> Share</a>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-7 col-sm-7 col-xs-12">
                                                            <div class="pop_content">
                                                                <h6>{{$product->name}}</h6>
                                                                <p></p><p>{{$product->description}}</p>
                                                                <p></p>
                                                                <h1>
                                                                    <i class="fa" aria-hidden="true"></i> <span><span class="woocommerce-Price-amount amount"><span class="woocommerce-Price-currencySymbol">$</span>{{$product->sale_price}}</span></span>
                                                                </h1>
                                                               <div class="buttons_pop">
                                                                    <a rel="nofollow" href="{{url('/')}}/addcart/{{$product->id}}" data-quantity="1" data-product_id="4524" data-product_sku="" class="btn btn-default btn-lg add_tocart buttons_pop product_type_simple add_to_cart_button ajax_add_to_cart">Add to cart</a>
                                                                    
                                                                    <form class="cart1" action="{{url('/')}}/buynow" method="post">
                                                                    {{csrf_field()}}
                                                                        <input name="product_id" value="{{$product->id}}" type="hidden">
                                                                        <input name="add-to-cart" value="4524" type="hidden">
                                                                        <button type="submit" class="btn btn-default btn-lg buy_now"><i class="fa fa-usd" aria-hidden="true"></i> BUY NOW</button>
                                                                    </form>  
                                                                </div>
                                                                <a id="id-4524" href="{{url('/product')}}/{{$product->id}}" title="Product 3"><button type="button" class="btn btn-default btn-lg btn-block">More Details</button></a>                                         
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                            <!--div class="col-md-2 col-xs-12 img_sec">
                                <div class="reach" style="height: 289px;">
                                    <div class="animate_img">
                                        <div class="loop_prdt_img">             
                                            <img src="{{url('/')}}/assets_new/images/6.jpg" class="attachment-shop_catalog img-responsive size-shop_catalog img-responsive wp-post-image" alt="6" srcset="{{url('/')}}/assets_new/images/6.jpg 300w, images/6.jpg 150w, images/6.jpg 180w" sizes="(max-width: 300px) 100vw, 300px" pagespeed_url_hash="816394685" onload="pagespeed.CriticalImages.checkImageForCriticality(this);" width="300" height="300">
                                        </div>
                                        <div class="textbox">
                                            <div class="v_center">
                                                <form class="cart1" action="#" method="post">
                                                    <input name="add-to-cart" value="4524" type="hidden">
                                                    <button type="submit" class="btn btn-primary btn-lg btn-block">BUY NOW</button>
                                                </form>                                                             
                                                <button type="button" class="btn btn-primary btn-lg btn-block" data-toggle="modal" data-target="#myModal5001">DETAILS</button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="clearfix">
                                        <h6>Subscription</h6>
                                        <div class="mar_rating"></div>
                                    </div>
                                    <div class="modal fade" id="myModal5001" role="dialog">
                                        <div class="modal-dialog modal-lg">
                                            <div class="modal-content">
                                                <div class="">
                                                    <button type="button" class="close" data-dismiss="modal">x</button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="row">
                                                        <div class="col-md-5 col-sm-5 col-xs-12">
                                                            <div class="pop_img">
                                                                <figure>
                                                                    <img src="{{url('/')}}/assets_new/images/6.jpg" class="attachment-shop_catalog img-responsive size-shop_catalog img-responsive wp-post-image" alt="6" srcset="{{url('/')}}/assets_new/images/6.jpg 300w, images/6.jpg 150w, images/6.jpg 180w" sizes="(max-width: 300px) 100vw, 300px" pagespeed_url_hash="816394685" onload="pagespeed.CriticalImages.checkImageForCriticality(this);" width="300" height="300">                                         
                                                                </figure>
                                                                <ul>
                                                                    <li id="shareit-menu" class="share" tabindex="1000"><a class="addthis_button_compact">
                                                                        <i class="fa fa-plus" aria-hidden="true"></i> Share</a>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-7 col-sm-7 col-xs-12">
                                                            <div class="pop_content">
                                                                <h6>Subscription</h6>
                                                                <p></p><p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras nisi metus, sollicitudin quis posuere eget, rhoncus eget leo. Cras pulvinar turpis vel massa feugiat, ac varius magna pharetra. Integer ultrices lorem odio. Quisque bibendum vulputate rutrum. Cras nisl nibh, tristique at eros id, aliquam ultricies justo. Vivamus enim neque, malesuada at maximus eget, dignissim sed nulla. Nulla euismod mollis congue. Etiam vel pretium purus. Vivamus enim sem, suscipit eget magna id, iaculis ultrices orci. Sed finibus nibh id elit varius suscipit. Nunc lobortis mauris ac augue mollis, quis lobortis ante faucibus. Curabitur pellentesque metus vitae est mattis, id tempus tellus aliquam. Morbi eu magna pharetra, tempor nisi ut, mattis odio. Nunc ornare id neque a luctus. Mauris massa lorem, volutpat eget facilisis scelerisque, tempor nec libero.</p>
                                                                <p></p>
                                                                <h1>
                                                                    <i class="fa" aria-hidden="true"></i> <span><span class="woocommerce-Price-amount amount"><span class="woocommerce-Price-currencySymbol">$</span>300.00</span></span>
                                                                </h1>
                                                               <div class="buttons_pop">
                                                                    <a rel="nofollow" href="#" data-quantity="1" data-product_id="4524" data-product_sku="" class="btn btn-default btn-lg add_tocart buttons_pop product_type_simple add_to_cart_button ajax_add_to_cart">Add to cart</a>
                                                                    <form class="cart1" action="#" method="post">
                                                                        <input name="add-to-cart" value="4524" type="hidden">
                                                                        <button type="submit" class="btn btn-default btn-lg buy_now"><i class="fa fa-usd" aria-hidden="true"></i> BUY NOW</button>
                                                                    </form>
                                                                </div>
                                                                <a id="id-4524" href="product-3.html" title="Product 3"><button type="button" class="btn btn-default btn-lg btn-block">More Details</button></a>                                         
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div-->
                        </div>             
                        
                        
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <a href="recent-products.html">
                                <button type="button" class="btn btn-default btn-block btn-raise btn_veiw_all">View All</button>
                            </a>
                        </div>
                    </div><!-- row -->
                </div>
                <!-- top products -->
                <div class="tab-pane text-style 1234" id="top">
                    <div class="row">
                        <div class="woocommerce columns-4">             
                            <div class="col-md-2 col-xs-12 img_sec">
                                <div class="reach" style="height: 289px;">
                                    <div class="animate_img">
                                        <div class="loop_prdt_img">             
                                            <img src="{{url('/')}}/assets_new/images/5.jpg" class="attachment-shop_catalog img-responsive size-shop_catalog img-responsive wp-post-image" alt="5" srcset="{{url('/')}}/assets_new/images/5.jpg 300w, images/5.jpg 150w, images/5.jpg 180w" sizes="(max-width: 300px) 100vw, 300px" pagespeed_url_hash="816394685" onload="pagespeed.CriticalImages.checkImageForCriticality(this);" width="300" height="300">
                                        </div>
                                        <div class="textbox">
                                            <div class="v_center">
                                                <form class="cart1" action="#" method="post">
                                                    <input name="add-to-cart" value="4524" type="hidden">
                                                    <button type="submit" class="btn btn-primary btn-lg btn-block">BUY NOW</button>
                                                </form>                                                             
                                                <button type="button" class="btn btn-primary btn-lg btn-block" data-toggle="modal" data-target="#myModal45245">DETAILS</button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="clearfix">
                                        <h6>Product 3</h6>
                                        <div class="mar_rating"></div>
                                    </div>
                                    <div class="modal fade" id="myModal45245" role="dialog">
                                        <div class="modal-dialog modal-lg">
                                            <div class="modal-content">
                                                <div class="">
                                                    <button type="button" class="close" data-dismiss="modal">x</button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="row">
                                                        <div class="col-md-5 col-sm-5 col-xs-12">
                                                            <div class="pop_img">
                                                                <figure>
                                                                    <img src="{{url('/')}}/assets_new/images/5.jpg" class="attachment-shop_catalog img-responsive size-shop_catalog img-responsive wp-post-image" alt="5" srcset="{{url('/')}}/assets_new/images/5.jpg 300w, images/5.jpg 150w, images/5.jpg 180w" sizes="(max-width: 300px) 100vw, 300px" pagespeed_url_hash="816394685" onload="pagespeed.CriticalImages.checkImageForCriticality(this);" width="300" height="300">                                         
                                                                </figure>
                                                                <ul>
                                                                    <li id="shareit-menu" class="share" tabindex="1000"><a class="addthis_button_compact">
                                                                        <i class="fa fa-plus" aria-hidden="true"></i> Share</a>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-7 col-sm-7 col-xs-12">
                                                            <div class="pop_content">
                                                                <h6>Product 3</h6>
                                                                <p></p><p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras nisi metus, sollicitudin quis posuere eget, rhoncus eget leo. Cras pulvinar turpis vel massa feugiat, ac varius magna pharetra. Integer ultrices lorem odio. Quisque bibendum vulputate rutrum. Cras nisl nibh, tristique at eros id, aliquam ultricies justo. Vivamus enim neque, malesuada at maximus eget, dignissim sed nulla. Nulla euismod mollis congue. Etiam vel pretium purus. Vivamus enim sem, suscipit eget magna id, iaculis ultrices orci. Sed finibus nibh id elit varius suscipit. Nunc lobortis mauris ac augue mollis, quis lobortis ante faucibus. Curabitur pellentesque metus vitae est mattis, id tempus tellus aliquam. Morbi eu magna pharetra, tempor nisi ut, mattis odio. Nunc ornare id neque a luctus. Mauris massa lorem, volutpat eget facilisis scelerisque, tempor nec libero.</p>
                                                                <p></p>
                                                                <h1>
                                                                    <i class="fa" aria-hidden="true"></i> <span><span class="woocommerce-Price-amount amount"><span class="woocommerce-Price-currencySymbol">$</span>300.00</span></span>
                                                                </h1>
                                                               <div class="buttons_pop">
                                                                    <a rel="nofollow" href="{{url('/')}}/addcart/{{$product->id}}" data-quantity="1" data-product_id="4524" data-product_sku="" class="btn btn-default btn-lg add_tocart buttons_pop product_type_simple add_to_cart_button ajax_add_to_cart">Add to cart</a>
                                                                    <form class="cart1" action="#" method="post">
                                                                        <input name="add-to-cart" value="4524" type="hidden">
                                                                        <button type="submit" class="btn btn-default btn-lg buy_now"><i class="fa fa-usd" aria-hidden="true"></i> BUY NOW</button>
                                                                    </form>
                                                                </div>
                                                                <a id="id-4524" href="#" title="Product 3"><button type="button" class="btn btn-default btn-lg btn-block">More Details</button></a>                                         
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>  
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <a href="top-rated-products.html"><button type="button" class="btn btn-default btn-block btn-raise btn_veiw_all">View All</button></a>
                        </div>
                    </div><!-- row -->
                </div>
                <!-- featured project -->
                <div class="tab-pane text-style 12345" id="feature">
                    <div class="row">
                        <div class="woocommerce columns-4"><p class="woocommerce-info no_products">No products found </p></div>
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <a href="#"><button type="button" class="btn btn-default btn-block btn-raise btn_veiw_all">View All</button></a>
                        </div>
                    </div><!-- row -->
                </div><!-- pan -->
            </div><!-- tab content -->
        </div><!-- container -->
    </section>
    <section class="form_sec">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-sm-6 col-xs-12 slideInLeft animated">
                    <p><span>Have</span> custom Product Enquiry?</p>
                    <h1 class="text-right">post here</h1>
                </div>
                <div class="col-md-6 col-sm-6 col-xs-12 slideInRight animated ">
                    <form class="req_success_messsage">
                        <div class="form-group">
                            <label class="sr-only">Email</label>
                            <input class="form-control name required" id="exampleInputtext" name="name" placeholder="Name" type="text">
                        </div>
                        <div class="select-style form_arrow">
                            <select name="cat" id="cat" class="postform">
                                <option class="level-0" value="562">Industry</option>
                                <option class="level-0" value="563">Social Entrepreneur</option>
                                <option class="level-0" value="564">Youth</option>
                                <option class="level-0" value="565">Diaspora</option>
                                <option class="level-0" value="566">Women</option>
                                <option class="level-0" value="567">Uncategorized</option>
                            </select> 
                        </div>
                        <textarea class="form-control requirement required" rows="3" placeholder="Enter requirement" name="requirement" required="required"></textarea>
                        <button type="submit" class="btn btn-default btn-block btn-raise btn_veiw_all requirement_submit">Submit</button>
                    </form>
                </div>            
            </div><!-- row -->
        </div><!-- container -->
    </section>
    <section class="top_seller">
        <div class="container">
            <div class="row">
                <h2 class="vendor-headding-custom">Top sellers</h2>
                <div class="col-md-2 col-sm-2 col-xs-12 img_sec">
                    <div class="images_12_sell" style="height: 350px;">
                        <div class="animate_img">
                            <a href="exeleadmen.html">
                                <img class="img-responsive vendor_img" src="{{url('/')}}/assets_new/images/WP-stdavatar.png" id="vendor_image_display" width="125">
                            </a>
                            <div class="textbox">
                                <div class="v_center">
                                    <a href="exeleadmen.html"> 
                                        <button type="button" class="btn btn-primary btn-lg btn-block">DETAILS</button>
                                    </a>                     
                                </div>
                            </div>
                        </div>
                        <h6>Exeleadmen INTERNATIONAL CONSULTING</h6>
                        <div class="row lead">
                            <div style="width:100%; height:50px; margin-bottom:5px; padding-left:15px;">
                                <div>No Rating Yet</div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-2 col-sm-2 col-xs-12 img_sec">
                    <div class="images_12_sell" style="height: 350px;">
                        <div class="animate_img">
                            <a href="exeleadmen.html">
                                <img class="img-responsive vendor_img" src="{{url('/')}}/assets_new/images/WP-stdavatar.png" id="vendor_image_display" width="125">
                            </a>
                            <div class="textbox">
                                <div class="v_center">
                                    <a href="exeleadmen.html"> 
                                        <button type="button" class="btn btn-primary btn-lg btn-block">DETAILS</button>
                                    </a>                     
                                </div>
                            </div>
                        </div>
                        <h6>Exeleadmen INTERNATIONAL CONSULTING</h6>
                        <div class="row lead">
                            <div style="width:100%; height:50px; margin-bottom:5px; padding-left:15px;">
                                <div>No Rating Yet</div>
                            </div>
                        </div>
                    </div>
                </div>
                    
            </div><!-- row -->
        </div><!-- container -->
    </section>
    <!-- Contact Section Starts Here    -->
        <section class="contact-form">
            <button type="button" id="getform" class="btn btn-default btn-circle btn-lg"><img src="{{url('/')}}/assets_new/images/call.png" /></button>
            <div id="contact-toggle" class="contact-content">
                <div class="container"> 
                    <form name="" action="#" method="post" >
                        <h3 style="color:#fff !important;">Contact Form</h3>
                        <div class="form-group">
                            <label style="color:#fff !important;">Your Name (Required)</label>                              
                            <input name="your-name" value="" size="40" class="form-control" type="text">                                
                        </div>
                        <div class="form-group">
                            <label style="color:#fff !important;">Your Email (Required)</label>                             
                            <input name="your-email" value="" size="40" class="form-control" type="email">                              
                        </div>
                        <div class="form-group">
                            <label style="color:#fff !important;">Subject</label>
                            <input name="your-subject" value="" size="40" class="form-control" type="text">                             
                        </div>
                        <div class="form-group">
                            <label style="color:#fff !important;">Your Message</label>                              
                            <textarea name="your-message" cols="40" rows="10" class="form-control"></textarea>                              
                        </div>                          
                        <input value="send" class="btn btn-primary" type="submit">
                    </form>                 
                </div>  
            </div>
        </section>

@endsection