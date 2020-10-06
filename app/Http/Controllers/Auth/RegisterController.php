<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Admin;
use App\Teacher;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
        {
            $this->middleware('guest');
            $this->middleware('guest:admin');
            $this->middleware('guest:teacher');
        }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'studentid' => ['required', 'string', 'min:5'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    protected function teacherValidator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'username' => ['required','min:4'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    protected function adminValidator(array $data)
    {
        return Validator::make($data, [
            'username' => ['required','min:4'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'lastname' => $data['lastname'],
            'thainame' => $data['thainame'],
            'thailastname' => $data['thailastname'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'studentid' => $data['studentid']
        ]);
    }

    public function showAdminRegisterForm()
    {
        return view('auth.admin.register', ['url' => 'admin']);
    }

    public function showTeacherRegisterForm()
    {
        return view('auth.teacher.register', ['url' => 'teacher']);
    }

    protected function createAdmin(Request $request)
    {
        $this->AdminValidator($request->all())->validate();
        $admin = Admin::create([
            'username' => $request['username'],
            'password' => Hash::make($request['password']),
        ]);
        return redirect()->intended('login/admin');
    }

    protected function createTeacher(Request $request)
    {
        $this->TeacherValidator($request->all())->validate();
        $teacher = Teacher::create([
            'name' => $request['name'],
            'sname' => $request['sname'],
            'username' => $request['username'],
            'password' => Hash::make($request['password']),
        ]);
        return redirect()->intended('login/teacher');
    }
}