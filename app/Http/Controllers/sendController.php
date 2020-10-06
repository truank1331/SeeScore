<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests;
use Redirect;
use View;
use Mail;
use Illuminate\Support\Facades\DB;

class sendController extends Controller
{
public function send(request $req)
{
    //dd($req);
    $mailid = $req->username;
    $subject = 'ชื่อระบบของเรา';
    $data = array('email' => $mailid, 'subject' => $subject);
    //dd('emails.newsinfo');
    $detail = DB::select('SELECT `teachers`.`username`, `teachers`.`password`, `teachers`.`createby`
                            FROM `teachers` WHERE `username`=?',[$mailid]); 

    Mail::send('emails.newsinfo', $data, function ($message) use ($data,$detail) {
        $message->from('cpsu.classroom@gmail.com', 'ชื่อระบบของเรา');
        $message->to($data['email']);
        $message->subject($data['subject']); 
        $message->attachData('Username = '.$detail[0]->username.' & Password ='.$detail[0]->password,'Username&Password.txt');
    });
    return redirect()->back()->with('message','Successfully Send Your Mail Id.');
}
} 