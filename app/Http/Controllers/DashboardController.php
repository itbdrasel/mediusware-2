<?php

namespace App\Http\Controllers;

class DashboardController extends Controller
{


    private $bUrl           = 'dashboard';
    private $title          = 'Dashboard';


    public function __construct(){

    }



    public function layout($pageName){

        $this->data['bUrl']  =  $this->bUrl;
        return view("pages.{$pageName}", $this->data);

    }

    public function index()
    {

        $this->data = [
            'title'         => $this->title,
            'pageUrl'       => $this->bUrl,
        ];

       return $this->layout('dashboard');
    }


}
