<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Http\Requests;
use Session;
use DB;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $product = DB::table('products')->where('id',$id)->get();
        return view("product.index",compact("product"));
    }

    public function recent()
    {
        return view("product.recent");
    }

    public function requirement_lists()
    {
        return view("product.requirements");
    }

    public function requirement_new()
    {
        return view("product.requirement-new");
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
         $product_img = Input::file('product_img');
         $userid = Session::get('userid');
        $category = implode(',', $request->category);
       
 
        //print_r($category); exit();

        if($product_img)
         {
  
              $destinationPath1 = $_SERVER['DOCUMENT_ROOT'].'/files/documents';           
              $timestamp1 = str_replace([' ', ':'], '-', date("YmdHis"));
              $namefile1 = $product_img->getClientOriginalName();    
              $recfilename1 = preg_replace('/\s+/', '', $namefile1);
              $recfilename1 = $timestamp1."_123_".$recfilename1;
              $upload_success1 = Input::file('product_img')->move($destinationPath1, $recfilename1);
              $certificatePath1 = ('http://'.$_SERVER['HTTP_HOST']."/files/documents/".$recfilename1);

         }
         
         DB::table('products')->insert(['name' => $request->name,'short_desc' => $request->short_message,'description' => $request->message,'categories' => $category,'imagepath' => $certificatePath1,'product_data' => $request->product_data,'sale_price' => $request->price,'tags' => $request->tags,'userid' => $userid,'created_by' => $userid,'updated_by' => $userid]);
         return redirect('/market-place');
        
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
