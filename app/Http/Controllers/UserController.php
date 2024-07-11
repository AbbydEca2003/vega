<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use DB;


class UserController extends Controller
{
    public function getUsers(Request $request)
    {
        $name =  $request->input('user');
        $pass =  $request->input('pass');
        $pass = md5($pass);
        $users = DB::select("select name from users where name = '$name' and password = '$pass';");
        if($users){
            session(['key' => '1']);
            Session::put('key', 'value');
            return  view('backend.dashboard');
        }else{
            return "Error usename or password";
        }
        
    }
}
