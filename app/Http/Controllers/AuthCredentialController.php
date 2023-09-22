<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class AuthCredentialController extends Controller
{


    private $data;
    private $bUrl           = '';
    private $title          = 'User';
    private $model;


    public function __construct(){
        $this->model = User::class;
    }



    public function layout($pageName){

        $this->data['bUrl']  =  $this->bUrl;
        return view("pages.user.{$pageName}", $this->data);

    }


    public function login(){
        if(Auth::check()){
            return redirect('/dashboard');
        }

         $this->data = [
             'title'        => "{$this->title} Login",
             'pageUrl'      => "{$this->bUrl}/login",
         ];

       return $this->layout('login');
    }

    public function store(Request $request){

        // Validate input
        $request->validate([
            'email'     => 'required|email',
            'password'  => 'required',
        ]);

        $credentials = $request->only('email', 'password');


        if (Auth::attempt($credentials)) {
            return redirect('dashboard')->with('success', 'User Login Successfully.');
        } else {
            return redirect()->back()->with('error', 'Sorry your email or password is incorrect. Please try again.')->withInput();
        }

    }


    public function logout(){
        Auth::logout();
        return redirect('/');
    }


}
