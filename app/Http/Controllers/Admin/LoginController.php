<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use App\Models\vidio;
class LoginController extends Controller
{
    public function register(Request $request)
    {
        $data = $request->all();
        if ($data['name'] != "" &&  $data['email'] != "" &&  $data['password'] != "") {
            $ans = DB::table('users')->insertGetId(["name" => $data['name'], "email" => $data['email'], "password" => Hash::make($data['password']),"status"=>"0","number_verify"=>$data['number_verify'],"mobileno"=>$data['mobileno']]);
            return redirect()->back()->with('message', ' Register User Sucessfully!');
        } else {
            return redirect()->back()->with('error', 'Please fill all fields');
        }
    }

    public function login(Request $request)
    {
        $email = $request->Input('email');
        $password = $request->Input('password');
        $same = DB::table('users')->where(['email' => $email])->count();
        $a = DB::table('users')->where('email', $email)->first();


        $admin=DB::table('admin')->where(['email' => $email])->count();
        $b=DB::table('admin')->where('email', $email)->first();

        if (($email != "") && ($password != "")) {
            if ($same > 0 && Hash::check($password, $a->password)) {
                session::put('user_id', $a->id);
                session::put('user_name', $a->name);
                session::put('user_email', $a->email);
            
                return redirect('/');
               
            }
            elseif($admin > 0 && Hash::check($password, $b->password) )
            {
                session::put('admin_id', $b->id);
                session::put('admin_name', $b->username);
                session::put('admin_email', $b->email);
                return redirect('/');
                
            }
            
            else {
                return redirect('login')->with('error', 'Email and Password has been wrong....');
            }
        } else {
            return redirect('login')->with('error', 'Email and Password Empty...');
        }
    }

    public function adminlogout()
    {
        Session()->forget('admin_id');
        Session()->forget('admin_name');
        Session()->forget('admin_email');
       
        return redirect('login');
    }
    
    public function userlogout()
    {
        Session()->forget('user_id');
        Session()->forget('user_name');
        Session()->forget('user_email');
       
        return redirect('login');
    }
    


}
