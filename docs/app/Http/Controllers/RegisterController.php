<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Laravel\Socialite\Facades\Socialite;
use DB;
use Session;
use Mail;

class RegisterController extends Controller
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

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    public function redirectToProvider($provider)
    {
        return Socialite::driver($provider)->redirect();
    }
    
    public function handleProviderCallback($provider)
    {
        $user = Socialite::driver($provider)->user();

        // All Providers
        $user->getId();
        $dname = $user->getNickname();
        $uname = $user->getName();
        $email = $user->getEmail();
        $user->getAvatar();
        return view('home.s-register',compact('dname','uname','email'));
    }
    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $email_check = DB::table('userdetails')->where('email',$request->email)->get();
        //print_r(count($email_check)); exit();

        if(count($email_check) < 1){
        $password = md5($request->password);

        $invites = DB::table('user_invites')->where('email',$request->email)->where('groupid',$request->grbid)->where('invite_status','0')->get();
        //print_r($request->all()); exit();

        if(count($invites) > 0){

       

        $id = DB::table('userdetails')->insertGetId(
        ['firstname' => $request->first_name, 'lastname' => $request->last_name, 'username' => $request->username, 'email' => $request->email, 'password' => $password, 'groupid' => $request->grbid]
        );
            Session::put('login_by',$request->email);
            Session::put('userid',$id);
            Session::put('firstname',$request->first_name);
            Session::put('lastname',$request->last_name);
            Session::put('useremail',$request->email);
            Session::put('username',$request->username);
            Session::put('groupid',$request->grbid);
            Session::put('is_login','1');

             DB::table('user_invites')->where('email',$request->email)->where('groupid',$request->grbid)->update(
        ['invite_status' => '1']
        );

        return redirect('/');
        }
        else{

        $name = $request->username;
        $email = $request->email;
        $usergroup = DB::table('usergroup')->where('id',$request->grbid)->get();
        $subject = $name." Requested to join AIM as a ".$usergroup[0]->name;
        $messagecontent = "";
        $toemailids= 'praveenperfeitoo@gmail.com';
        $content=$messagecontent;
        $replyto = 'yogeshnaveen111@gmail.com';
        $url_admin = '/admin/temp_user';

        $messagecontent = '<div style="width:100%px;text-align:center;margin: 0;">';
        $messagecontent .='<table width="100%" border="0" cellspacing="0" cellpadding="0"><tbody>';
        $messagecontent .='<tr><td style="background:#cdcdcd; font-family:Helvetica, Arial;font-size:14px;padding-top:15px;padding-bottom:15px;">';
        $messagecontent .='<table width="500" border="0" cellspacing="0" cellpadding="0" style="background: #ffffff;margin:0 auto; width:500px;"><tbody>';
        $messagecontent .='<tr><td style="background:#94c440; color:#FFF; text-align:center;padding:30px 15px; font-size:18px;"><strong>Africa Innovation Market</strong></td></tr>';
        $messagecontent .='<tr><td style="padding:15px; "><p><b>Hi Admin, </b></p>';
        $messagecontent .='<p>&nbsp;&nbsp;'.$name.' requested to join Africa Innovation Market (AIM) as '.$usergroup[0]->name.'.</p><p>&nbsp;&nbsp;You may approve/reject by '.$usergroup[0]->name.',&nbsp;<a href="'.url($url_admin).'">click to view admin panel</a> to the AIM</p>';
        $messagecontent .='<center><a href="'.url($url_admin).'" style="background: #619fef; text-align: center; border-color: #ef6262; padding: 8px 30px !important; text-transform: uppercase; font-size:18px; font-weight: bold; color:#ffffff; text-decoration:none;">To Approve / Reject</a></center>';
        $messagecontent .='<br><p style="font-size:10px; text-align:left;"><em>This is an automatically generated message. Please do not reply to this address.</em></p></td></tr></tbody></table></td></tbody></table></div>'; 

        $data = array( 'replytoemail' => $replyto, 'subject' => $subject, 'content' => $messagecontent);
        //echo $messagecontent; exit();

        $id = DB::table('temp_users')->insertGetId(
        ['firstname' => $request->first_name, 'lastname' => $request->last_name, 'username' => $request->username, 'email' => $request->email, 'password' => $password, 'groupid' => $request->grbid]
        );

        Mail::send('home.reminder', $data, function ($m) use ($data, $toemailids)  {
        $m->from('aim@crizpal.com', 'Africa Innovation Market');
        $m->replyTo($data['replytoemail'], $name = null);
        $m->bcc('praveenperfeitoo@gmail.com', 'yogeshnaveen111@gmail.com');
        $m->to($toemailids, '')->subject($data['subject']);
        });

        return redirect('/reg-note');
        }
        }
        else{
           return view('home.reg-already',compact('email_check')); 
        }
    }

    public function reg_note()
    {
        return view('home.reg-note');
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



    public function entrepreneur()
    {
        return view('auth.ent-register');
    }

    public function organization()
    {
        return view('auth.org-register');
    }
    
    public function supporter()
    {
        return view('auth.sup-register');
    }
    
    public function investor()
    {
        return view('auth.inv-register');
    }
}
