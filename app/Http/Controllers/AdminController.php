<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Teacher;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use App\Http\Requests;
use Redirect;
use View;
use Mail;

use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $username = Auth::user()->username;
        $data = DB::select('SELECT *
                            FROM `teachers`'); 

        return view('admin.home',['data'=>$data,'count'=>count($data)]);
    }

    public function addTeacher()
    {
        return view('admin.addteacher');
    }
    public function add(Request $request)
    {
        $this->teacherValidator($request->all())->validate();
        
        $teacher = Teacher::create([
            'name' => $request['name'],
            'sname' => $request['sname'],
            'username' => $request['username'],
            'password' => Hash::make($request['password']),
            'createby' => Auth::user()->username
        ]);

        $mailid = $request['username'];
        $subject = 'SeeScores';
        $data = array('email' => $mailid, 'subject' => $subject);
        //dd('emails.newsinfo');

        Mail::send('emails.newsinfo', $data, function ($message) use ($data,$request) {
            $message->from('cpsu.classroom@gmail.com', 'SeeScores');
            $message->to($data['email']);
            $message->subject($data['subject']); 
            $message->attachData('Username = '.$request['username'].' & Password ='.$request['password'],'Username&Password.txt');
        });

        return redirect(route('admin.home'));
    }

    protected function teacherValidator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'username' => ['required','email'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
        
    }
}
