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

    public function getPeople(){
        $users = $this->users;
        return view('backend.people',['users'=>$users]);
    }

    public function setPeople (Request $request){
        $newUser = $request->validate([
            'username' => ['required'],
            'password' => ['required'],
            'email' => ['required', 'email'],
        ]);

        $new = new User();
        $new->name =  $newUser['username'];
        $new->email =  $newUser['email'];
        $new->password =  Hash::make($newUser['password']);
        $new->email_verified_at =  Carbon::now();
        $new->save();
        return redirect('/user')->with('success','User registered success');
    }

    public function removeUser(Request $request){
        
        $newUser = $request->validate([
            'id' => ['required'],
        ]);
        dd($newUser->id);
        $user = User::find('2');

        if($user){
            $user->delete();
            return redirect('/user')->with('success','User removed success');
        }else{
            return redirect('/');
        }
        
    }
  
}
