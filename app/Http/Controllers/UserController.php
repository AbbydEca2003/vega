<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Illuminate\View\View;
use DB;
use Redirect;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Hash;
use App\Model\User;
use Carbon\Carbon;

class UserController extends Controller
{

    public function authenticate(Request $request): RedirectResponse
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);
        
        
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended('admin');
            
        }
 
        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    }

    public function logout(){
        Auth::logout();
        return redirect('login');
    }

    public  $users;
    public function __construct() {
        $this->users = User::all();
    }

    public function getUser(){
        $users = $this->users;
        return view('backend.people',['users'=>$users]);
    }

    public function setUser (Request $request){
        $newUser = $request->validate([
            'username' => ['required'],
            'password' => ['required'],
            'email' => ['required', 'email'],
        ]);
        //dd($newUser);
        $new = new User();
        $new->name =  $newUser['username'];
        $new->email =  $newUser['email'];
        $new->password =  Hash::make($newUser['password']);
        $new->email_verified_at =  Carbon::now();
        $new->save();
        return redirect('/user')->with('success','User registered success');
    }

    public function editUser (Request $request): RedirectResponse{
        $eUser = $request->validate([
            'username' => ['required'],
            'password' => ['required'],
            'email' => ['required', 'email'],
        ]);
        
        $n = User::find(5);
        
        $n->name =  $eUser['username'];
        $n->email =  $eUser['email'];
        $n->password =  Hash::make($eUser['password']);
        $n->email_verified_at =  Carbon::now();
        //dd($new);
        $n->save();
        return redirect('/user')->with('success','User edit success');
    }

    public function removeUser(Request $request): RedirectResponse{
        $rem_User = $request->validate([
            'row' => ['required'],
        ]);
        dd($rem_User['row']);
        User::destroy($rem_User['del']);
        return redirect('/user')->with('success','User removed success');
    }
  
}
