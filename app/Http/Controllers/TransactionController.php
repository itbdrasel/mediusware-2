<?php

namespace App\Http\Controllers;

use App\Models\Transaction;

class TransactionController extends Controller
{
    private $bUrl           = 'transactions';
    private $title          = 'Transaction';

    public function __construct(){
        $this->model = Transaction::class;
    }

    public function layout($pageName){

        $this->data['bUrl']  =  $this->bUrl;
        return view("pages.transactions.{$pageName}", $this->data);

    }


    public function index(){
        $user = auth()->user();
        $transactions = $user->transactions()->paginate(10);

        $this->data = [
            'title'         => "{$this->title} Manage",
            'pageUrl'       => $this->bUrl,
            'transactions'  => $transactions,
            'user'          => $user
        ];

        return $this->layout('index');
    }


}
