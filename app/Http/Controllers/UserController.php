<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{



    private $bUrl           = 'user';
    private $title          = 'User';


    public function __construct(){
        $this->model = User::class;
    }



    public function layout($pageName){

        $this->data['bUrl']  =  $this->bUrl;
        return view("pages.user.{$pageName}", $this->data);

    }


    public function create(){

         $this->data = [
             'title'        => "{$this->title} Create",
             'pageUrl'      => "{$this->bUrl}/create",
         ];

       return $this->layout('create');
    }

    public function store(UserRequest $request){

        $data = [
            'name'          => $request['name'],
            'account_type'  => $request['account_type'],
            'email'         => $request['email'],
            'password'      => Hash::make($request['password']),
        ];

        $this->model::create($data);

        return redirect('/')->with('success', 'User created successfully.');
    }


}
