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
        $validated = $request->validate([
            'username' => ['required'],
            'email' => ['required', 'email'],
            'user_id' => ['required'],
            'is_active'=> ['required'],
        ]);
        $userId = $validated['user_id'];
        $n = User::find($userId);
        $n->name =  $validated['username'];
        $n->email =  $validated['email'];
        $n->is_active =  $validated['is_active'];
        //$n->password =  Hash::make($validated['password']);
        $n->email_verified_at =  Carbon::now();
        $n->save();
        return redirect('/user')->with('success','User edit success');
    }

    public function removeUser(Request $request): RedirectResponse
    {
        //dd($request);
        $validated = $request->validate([
            'user_id' => ['required'],
        ]);
        $userId = $validated['user_id'];
        $user = User::find($userId);
        $user->delete();
        return redirect('/user')->with('success', 'User removed successfully');
    }

    public function searchUser(Request $request): View
    {
        $validated = $request->validate([
            'search' => ['required', 'max:255'],
        ]);
        $query = $validated['search'];
        $users = User::where('name', 'LIKE', "%{$query}%");
        dd($users);
        return view('backend.people',['users'=>$users]);
    }

  
}