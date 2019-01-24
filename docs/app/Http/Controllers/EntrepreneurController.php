<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;                                       
use Illuminate\Support\Facades\Input;
use App\Http\Requests;
use App\entrepreneur;
use Session;
use DB;

class EntrepreneurController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $entrepreneur = DB::table('entrepreneurs')->where('created_by',Session::get('userid'))->get();
        $ent_company = DB::table('ent_company')->where('created_by',Session::get('userid'))->get();
        $ent_market = DB::table('ent_market')->where('created_by',Session::get('userid'))->get();
        $ent_funding = DB::table('ent_funding')->where('created_by',Session::get('userid'))->get();
        $ent_mgmnt_team = DB::table('ent_mgmnt_team')->where('created_by',Session::get('userid'))->get();
        $ent_businessplan = DB::table('ent_businessplan')->where('created_by',Session::get('userid'))->get();
        $campaigns = DB::table('campaigns')->where('created_by',Session::get('userid'))->get();
        $user_invites = DB::table('user_invites')->where('invited_by',Session::get('userid'))->get();
        $blogs = DB::table('blogs')->where('created_by',Session::get('userid'))->get();
        $project = DB::table('projects')->where('created_by',Session::get('userid'))->get();
        $orders = DB::table('orders')->where('created_by',Session::get('userid'))->get();
        $recentblogs = DB::table('blogs')->skip(0)->take(1)->get();
        $recentmsgs = DB::table('messages')->where('created_by',Session::get('userid'))->orWhere('created_by','0')->skip(0)->take(5)->get();
        $project_fundings = DB::table('project_funding')->where('project_from',Session::get('userid'))->get();
        $investors = DB::table('investors')
        ->join('userdetails', 'investors.created_by', '=', 'userdetails.id')
        ->where('userdetails.groupid','4')->get();
        $organizations = DB::table('organizations')
        ->join('userdetails', 'organizations.created_by', '=', 'userdetails.id')
        ->where('userdetails.groupid','2')->get();
        return view('dashboard.entrepreneur',compact('entrepreneur','ent_company','ent_market','ent_funding','ent_mgmnt_team','ent_businessplan','campaigns','blogs','user_invites','project','orders','recentblogs','recentmsgs','organizations','project_fundings','investors'));
    }


    public function search($id)
    {
      $value = array("0" => $id);
        $query = DB::table('entrepreneurs')
            ->join('ent_company', 'entrepreneurs.created_by', '=', 'ent_company.created_by')
            ->join('ent_businessplan', 'entrepreneurs.created_by', '=', 'ent_businessplan.created_by')
            ->join('ent_funding', 'entrepreneurs.created_by', '=', 'ent_funding.created_by')
            ->select('entrepreneurs.*', 'ent_company.*','ent_businessplan.*','ent_funding.*');
        if($id == 11){    
          $query = $query->get();      
          $entrepreneurs = $query->sortByDesc("entrepreneurs.created_at");
        }
        if($id == 12){          
          $entrepreneurs = $query->where('entrepreneurs.is_top','1')->get();
        }
        if($id == 13){          
          $entrepreneurs = $query->where('entrepreneurs.is_featured','1')->get();
        }
        if($id <= 5){          
          $entrepreneurs = $query->where('ent_company.category','LIKE','%'.$id.'%')->get();
        }
        //print_r($entrepreneurs); exit();
        return view('entrepreneur.search',compact('entrepreneurs'));
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
        $certificatePath1 ='';
        $certificatePath ='';
        if($request->savefor == '1'){

            $plogo = $request->logo;
            if($plogo)
             {
      
                  $destinationPath1 = $_SERVER['DOCUMENT_ROOT'].'/files/documents';           
                  $timestamp1 = str_replace([' ', ':'], '-', date("YmdHis"));
                  $namefile1 = $plogo->getClientOriginalName();    
                  $recfilename1 = preg_replace('/\s+/', '', $namefile1);
                  $recfilename1 = $timestamp1."_123_".$recfilename1;
                  $upload_success1 = Input::file('logo')->move($destinationPath1, $recfilename1);
                  $certificatePath1 = ('http://'.$_SERVER['HTTP_HOST']."/files/documents/".$recfilename1);

             }

         DB::table('entrepreneurs')->insert(['name' => $request->name,'city' => $request->city,'state' => $request->state,'country' => $request->country,'zipcode' => $request->zipcode,'women_stage' => $request->women_stage,'gender' => $request->gender,'created_by' => $userid,'updated_by' => $userid,'website' => $request->website,'linked_url' => $request->linked_url,'tw_url' => $request->tw_url,'fb_url' => $request->fb_url,'blog_url' => $request->blog_url,'gp_url' => $request->gp_url,'logo' => $certificatePath1]);

          $alert = 'Project Profile Details Added Successfully';  
        }

        else if($request->savefor == '2'){

            $filepath = $request->filepath;
            $project_img = $request->project_img;
            if($filepath)
             {
      
                  $destinationPath1 = $_SERVER['DOCUMENT_ROOT'].'/files/documents';           
                  $timestamp1 = str_replace([' ', ':'], '-', date("YmdHis"));
                  $namefile1 = $filepath->getClientOriginalName();    
                  $recfilename1 = preg_replace('/\s+/', '', $namefile1);
                  $recfilename1 = $timestamp1."_123_".$recfilename1;
                  $upload_success1 = Input::file('filepath')->move($destinationPath1, $recfilename1);
                  $certificatePath1 = ('http://'.$_SERVER['HTTP_HOST']."/files/documents/".$recfilename1);

             }
            if($project_img)
             {
      
                  $destinationPath = $_SERVER['DOCUMENT_ROOT'].'/files/documents';           
                  $timestamp = str_replace([' ', ':'], '-', date("YmdHis"));
                  $namefile = $project_img->getClientOriginalName();    
                  $recfilename = preg_replace('/\s+/', '', $namefile);
                  $recfilename = $timestamp."_123_".$recfilename;
                  $upload_success = Input::file('project_img')->move($destinationPath, $recfilename);
                  $certificatePath = ('http://'.$_SERVER['HTTP_HOST']."/files/documents/".$recfilename);

             }
             $category = implode(',', $request->category) ;
         DB::table('ent_company')->insert(['overview' => $request->overview,'category' =>$category ,'p_yr_revenue' => $request->p_yr_revenue,'c_yr_revenue' => $request->c_yr_revenue,'n_yr_revenue' => $request->n_yr_revenue,'founded_date' => $request->founded_date,'no_employees' => $request->no_employee,'filetitle' => $request->filetitle,'filepath' => $certificatePath1,'project_img' => $certificatePath,'fileurl' => $request->fileurl,'created_by' => $userid,'updated_by' => $userid]);

          $alert = 'Project Profile Details Added Successfully';  
            
        }

        else if($request->savefor == '3'){

            $product_img = $request->product_img;
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

         DB::table('ent_market')->insert(['market' => $request->market,'market_size' => $request->market_size,'growth_rate' => $request->growth_rate,'name' => $request->name,'description' => $request->description,'created_by' => $userid,'updated_by' => $userid,'product_img' => $certificatePath1]);

          $alert = 'Project Profile Details Added Successfully';  
            
        }

        else if($request->savefor == '4'){

            $photograph = $request->photograph;
            if($photograph)
             {
      
                  $destinationPath1 = $_SERVER['DOCUMENT_ROOT'].'/files/documents';           
                  $timestamp1 = str_replace([' ', ':'], '-', date("YmdHis"));
                  $namefile1 = $photograph->getClientOriginalName();    
                  $recfilename1 = preg_replace('/\s+/', '', $namefile1);
                  $recfilename1 = $timestamp1."_123_".$recfilename1;
                  $upload_success1 = Input::file('photograph')->move($destinationPath1, $recfilename1);
                  $certificatePath1 = ('http://'.$_SERVER['HTTP_HOST']."/files/documents/".$recfilename1);

             }

         DB::table('ent_mgmnt_team')->insert(['position' => $request->position,'email' => $request->email,'linked_url' => $request->linked_url,'fb_url' => $request->fb_url,'tw_url' => $request->tw_url,'name' => $request->name,'description' => $request->description,'created_by' => $userid,'updated_by' => $userid,'photograph' => $certificatePath1]);

            
          $alert = 'Project Profile Details Added Successfully';  
        }


        else if($request->savefor == '5'){


         DB::table('ent_funding')->insert(['goal' => $request->goal,'fund_for' => $request->fund_for,'fund_type' => $request->fund_type,'fund_pvt' => $request->fund_pvt,'pre_money' => $request->pre_money,'interest' => $request->interest,'prev_fund' => $request->prev_fund,'fund_commitment' => $request->fund_commitment,'created_by' => $userid,'updated_by' => $userid]);

          $alert = 'Project Profile Details Added Successfully';  
            
        }


        else if($request->savefor == '6'){


         DB::table('ent_businessplan')->insert(['idea' => $request->idea,'women_model' => $request->women_model,'customer' => $request->customer,'market' => $request->market,'industry' => $request->industry,'product' => $request->product,'campaign' => $request->campaign,'budget' => $request->budget,'team' => $request->team,'pitch' => $request->pitch,'created_by' => $userid,'updated_by' => $userid]);

          $alert = 'Business Plan Details Added Successfully';  
            
        }

         return redirect('/entrepreneur')->with('message', 'Entrepreneur Details Added Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $entrepreneur = DB::table('entrepreneurs')
            ->join('ent_company', 'entrepreneurs.created_by', '=', 'ent_company.created_by')
            ->join('ent_businessplan', 'entrepreneurs.created_by', '=', 'ent_businessplan.created_by')
            ->join('ent_funding', 'entrepreneurs.created_by', '=', 'ent_funding.created_by')
            ->select('entrepreneurs.*', 'ent_company.*', 'ent_businessplan.*', 'ent_funding.*')->where('entrepreneurs.id',$id)
            ->get();
        //print_r($entrepreneur); exit();
        return view('entrepreneur.show',compact('entrepreneur'));
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
        //print_r($request->all()); exit();
        $userid = Session::get('userid');
        $certificatePath1 ='';
        $certificatePath ='';
        if($request->savefor == '1'){

        $certificatePath = $request->logo;
            // $plogo = $request->logo;
            // if($plogo)
            //  {
      
            //       $destinationPath1 = $_SERVER['DOCUMENT_ROOT'].'/files/documents';           
            //       $timestamp1 = str_replace([' ', ':'], '-', date("YmdHis"));
            //       $namefile1 = $plogo->getClientOriginalName();    
            //       $recfilename1 = preg_replace('/\s+/', '', $namefile1);
            //       $recfilename1 = $timestamp1."_123_".$recfilename1;
            //       $upload_success1 = Input::file('logo')->move($destinationPath1, $recfilename1);
            //       $certificatePath1 = ('http://'.$_SERVER['HTTP_HOST']."/files/documents/".$recfilename1);

            //  }

         DB::table('entrepreneurs')->where('id',$id)->update(['name' => $request->name,'city' => $request->city,'state' => $request->state,'country' => $request->country,'zipcode' => $request->zipcode,'women_stage' => $request->women_stage,'gender' => $request->gender,'created_by' => $userid,'updated_by' => $userid,'website' => $request->website,'linked_url' => $request->linked_url,'tw_url' => $request->tw_url,'fb_url' => $request->fb_url,'blog_url' => $request->blog_url,'gp_url' => $request->gp_url,'logo' => $certificatePath1]);

            
        }

        else if($request->savefor == '2'){

             //$category = array("");
             $category = implode(',', $request->category) ;
            $filepath = $request->filepath;
            $project_img = $request->project_img;
            if($filepath)
             {
      
                  $destinationPath1 = $_SERVER['DOCUMENT_ROOT'].'/files/documents';           
                  $timestamp1 = str_replace([' ', ':'], '-', date("YmdHis"));
                  $namefile1 = $filepath->getClientOriginalName();    
                  $recfilename1 = preg_replace('/\s+/', '', $namefile1);
                  $recfilename1 = $timestamp1."_123_".$recfilename1;
                  $upload_success1 = Input::file('filepath')->move($destinationPath1, $recfilename1);
                  $certificatePath1 = ('http://'.$_SERVER['HTTP_HOST']."/files/documents/".$recfilename1);

             }
            if($project_img)
             {
      
                  $destinationPath = $_SERVER['DOCUMENT_ROOT'].'/files/documents';           
                  $timestamp = str_replace([' ', ':'], '-', date("YmdHis"));
                  $namefile = $project_img->getClientOriginalName();    
                  $recfilename = preg_replace('/\s+/', '', $namefile);
                  $recfilename = $timestamp."_123_".$recfilename;
                  $upload_success = Input::file('project_img')->move($destinationPath, $recfilename);
                  $certificatePath = ('http://'.$_SERVER['HTTP_HOST']."/files/documents/".$recfilename);

             }

         DB::table('ent_company')->where('id',$id)->update(['overview' => $request->overview,'category' => $category,'p_yr_revenue' => $request->p_yr_revenue,'c_yr_revenue' => $request->c_yr_revenue,'n_yr_revenue' => $request->n_yr_revenue,'founded_date' => $request->founded_date,'no_employees' => $request->no_employee,'filetitle' => $request->filetitle,'filepath' => $certificatePath1,'project_img' => $certificatePath,'fileurl' => $request->fileurl,'created_by' => $userid,'updated_by' => $userid]);

            
        }

        else if($request->savefor == '3'){

            $product_img = $request->product_img;
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

         DB::table('ent_market')->insert(['market' => $request->market,'market_size' => $request->market_size,'growth_rate' => $request->growth_rate,'name' => $request->name,'description' => $request->description,'created_by' => $userid,'updated_by' => $userid,'product_img' => $certificatePath1]);

            
        }

        else if($request->savefor == '4'){

            $photograph = $request->photograph;
            if($photograph)
             {
      
                  $destinationPath1 = $_SERVER['DOCUMENT_ROOT'].'/files/documents';           
                  $timestamp1 = str_replace([' ', ':'], '-', date("YmdHis"));
                  $namefile1 = $photograph->getClientOriginalName();    
                  $recfilename1 = preg_replace('/\s+/', '', $namefile1);
                  $recfilename1 = $timestamp1."_123_".$recfilename1;
                  $upload_success1 = Input::file('photograph')->move($destinationPath1, $recfilename1);
                  $certificatePath1 = ('http://'.$_SERVER['HTTP_HOST']."/files/documents/".$recfilename1);

             }

         DB::table('ent_mgmnt_team')->insert(['position' => $request->position,'email' => $request->email,'linked_url' => $request->linked_url,'fb_url' => $request->fb_url,'tw_url' => $request->tw_url,'name' => $request->name,'description' => $request->description,'created_by' => $userid,'updated_by' => $userid,'photograph' => $certificatePath1]);

            
        }


        else if($request->savefor == '5'){


         DB::table('ent_funding')->where('id',$id)->update(['goal' => $request->goal,'fund_for' => $request->fund_for,'fund_type' => $request->fund_type,'fund_pvt' => $request->fund_pvt,'pre_money' => $request->pre_money,'interest' => $request->interest,'prev_fund' => $request->prev_fund,'fund_commitment' => $request->fund_commitment,'created_by' => $userid,'updated_by' => $userid]);

            
        }


        else if($request->savefor == '6'){


         DB::table('ent_businessplan')->where('id',$id)->update(['idea' => $request->idea,'women_model' => $request->women_model,'customer' => $request->customer,'market' => $request->market,'industry' => $request->industry,'product' => $request->product,'campaign' => $request->campaign,'budget' => $request->budget,'team' => $request->team,'pitch' => $request->pitch,'created_by' => $userid,'updated_by' => $userid]);

            
        }

         return redirect('/entrepreneur')->with('message', 'Entrepreneur Details Added Successfully');
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
