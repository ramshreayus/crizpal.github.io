<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Http\Requests;
use Session;
use DB;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    public function cart(Request $request)
    {
         $userid = Session::get('userid');
        // $products = DB::table('products')
        //     ->join('product_cart', 'products.id', '=', 'product_cart.product_id')
        //     ->select('products.*', 'product_cart.qty', 'product_cart.id as cartid ')
        //     ->where('product_cart.created_by',$userid)
        //     ->get();
        $products = DB::table('product_cart')
            ->join('products', 'product_cart.product_id', '=', 'products.id')
            ->select('product_cart.*', 'products.name', 'products.imagepath', 'products.sale_price', 'products.product_data')
            ->where('product_cart.created_by',$userid)
            ->get();
        //print_r($product); exit();
        return view("order.cart",compact("products"));
    }

    public function buynow(Request $request)
    {

         $userid = Session::get('userid');
        $id = $request->product_id;
        DB::table('product_cart')->insert(['product_id' => $id, 'qty' => 1,'created_by' => $userid,'updated_by' => $userid]);
        return redirect('/cart');
    }    
    public function checkout()
    {
         $userid = Session::get('userid');
        $products = DB::table('products')
            ->join('product_cart', 'products.id', '=', 'product_cart.product_id')
            ->select('products.*', 'product_cart.qty', 'product_cart.id as cartid ')
            ->where('product_cart.created_by',$userid)
            ->get();
        return view("order.checkout",compact("products"));
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

        $userid = Session::get('userid');
        $username = Session::get('username');
        $id = DB::table('order_address')->insertGetId(['firstname' => $request->firstname, 'lastname' => $request->lastname, 'companyname' => $request->companyname, 'email' => $request->email, 'phone' => $request->phone, 'country' => $request->country, 'address' => $request->address, 'appartmentno' => $request->appartmentno, 'city' => $request->city, 'state' => $request->state, 'zipcode' => $request->zipcode, 'notes' => $request->order_comments,'created_by' => $userid,'updated_by' => $userid]);

        $total_amount = $request->total_amount;
        $row_count = $request->product_count;
        for ($i=1; $i <=$row_count ; $i++) { 
            $product_ids = $request->input('product_id'.$i);
            $product_qty = $request->input('product_qty'.$i);
            $product_amount = $request->input('product_amount'.$i);
           // print_r($product_amount);
          $orderid = DB::table('orders')->insertGetId(['product_id' => $product_ids, 'qty' => $product_qty, 'amount' => $product_amount,'created_by' => $userid,'updated_by' => $userid]);  
        } //exit();

            // Set your secret key: remember to change this to your live secret key in production
            // See your keys here: https://dashboard.stripe.com/account/apikeys

            \Stripe\Stripe::setApiKey("sk_test_x72DLrJsBn6pvMgpvtEHJ4xp");

            // Token is created using Checkout or Elements!
            // Get the payment token ID submitted by the form:
            $token = $_POST['stripeToken'];
            $charge = \Stripe\Charge::create([
            'amount' => $total_amount*100,
            'currency' => 'usd',
            'description' => 'order from : '.$username,
            'source' => $token,
            ]);

        DB::table('product_cart')->where('created_by',$userid)->delete();
            //dd("payment successfully!");
            return view('order.placeorder');

    }

    public function funding(Request $request)
    { 

        //print_r($request->all()); exit();

        $userid = Session::get('userid');
        $groupid = Session::get('groupid');
        $username = Session::get('username');
        $amount = $request->amount;
        if($groupid == '4'){
        $id = DB::table('project_funding')->insertGetId(['project_from' => $request->project_id, 'amount' => $request->amount, 'pay_type' => $request->pay_type, 'comments' => $request->comments,'created_by' => $userid,'updated_by' => $userid]);
        }
        else if($groupid == '3'){
        $id = DB::table('project_donations')->insertGetId(['project_from' => $request->project_id, 'amount' => $request->amount, 'pay_type' => $request->pay_type, 'comments' => $request->comments,'created_by' => $userid,'updated_by' => $userid]);
        }


            // Set your secret key: remember to change this to your live secret key in production
            // See your keys here: https://dashboard.stripe.com/account/apikeys

            \Stripe\Stripe::setApiKey("sk_test_x72DLrJsBn6pvMgpvtEHJ4xp");

            // Token is created using Checkout or Elements!
            // Get the payment token ID submitted by the form:
            $token = $_POST['stripeToken'];
            $charge = \Stripe\Charge::create([
            'amount' => $amount*100,
            'currency' => 'usd',
            'description' => 'funding from : '.$username,
            'source' => $token,
            ]);

            //dd("payment successfully!");
            return view('order.donation');

    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('order.view');
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
    public function delcart($id)
    {
        DB::table('product_cart')->where('id',$id)->delete();
        return redirect('/cart');
    }

    public function destroy($id)
    {
        //
    }
}
