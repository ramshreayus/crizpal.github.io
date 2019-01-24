<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Http\Requests;
use Session;
use DB;

class MarketplaceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = DB::table('products')->get();
        return view("marketplace.index",compact("products"));
    }

    public function dashboard()
    {
        return view("marketplace.dashboard");
    }

    public function settings()
    {
        return view("marketplace.setting");
    }

    public function account()
    {
        return view("marketplace.account");
    }

    public function product()
    {
        return view("marketplace.product");
    }

    public function product_list()
    {
        $products = DB::table('products')->get();
        return view("marketplace.product-list",compact("products"));
    }

    public function orders()
    {
        return view("marketplace.orders");
    }

    public function report()
    {
        return view("marketplace.report");
    }

    public function requirment()
    {
        return view("marketplace.requirment");
    }

    public function requirment_details()
    {
        return view("marketplace.requirment-r");
    }

    public function messages()
    {
        return view("marketplace.messages");
    }

    public function payment()
    {
        return view("marketplace.payment");
    }

    public function exeleadmen()
    {
        return view("marketplace.exeleadmen");
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
        //print_r($request->all()); exit();
        // $product_img = Input::file('product_img');
         $userid = Session::get('userid');
      
       
 

        // if($product_img)
        //  {
  
        //       $destinationPath1 = $_SERVER['DOCUMENT_ROOT'].'/files/documents';           
        //       $timestamp1 = str_replace([' ', ':'], '-', date("YmdHis"));
        //       $namefile1 = $product_img->getClientOriginalName();    
        //       $recfilename1 = preg_replace('/\s+/', '', $namefile1);
        //       $recfilename1 = $timestamp1."_123_".$recfilename1;
        //       $upload_success1 = Input::file('product_img')->move($destinationPath1, $recfilename1);
        //       $certificatePath1 = ('http://'.$_SERVER['HTTP_HOST']."/files/documents/".$recfilename1);

        //  }
         
         DB::table('marketplace_settings')->insert(['storename' => $request->store_name,'store_slug' => $request->store_slug,'description' => $request->description,'phone' => $request->phone,'buyer_msg' => $request->buyer_msg,'addressline1' => $request->address_1,'addressline2' => $request->address_2,'country' => $request->country,'state' => $request->state,'city' => $request->city,'zipcode' => $request->zipcode,'org_id' => $userid,'created_by' => $userid,'updated_by' => $userid]);
         return redirect('/');
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
}
