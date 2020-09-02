<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    // ajouter un utilisateur
    public function register(Request $request){
        $user= new User();
        $user->name=$request->name;
        $user->email=$request->email;
        $user->password=bcrypt($request->password);
        $user->save();
        return redirect('posts')->with("success", "vous étes inscrit maintenant");

    }
    public function create(){
        return view('users.add');
    }
    public function login(){
        return view('users.login');
    }
    public function auth( Request $request){
        if(Auth::attempt(['email'=>$request->email,'password'=>$request->password])){
           return redirect('/posts');

        } else{
            return redirect()->route('users.login')->with('fail','Email ou mot de passe est incorrect ');
        }
    }
    public function logout(){
        auth::logout();
        return redirect('/posts');
    }
}
