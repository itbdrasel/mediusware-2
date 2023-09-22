<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Http\Request;

use App\Http\Requests\DepositRequest;

class DepositController extends Controller
{


    private $bUrl           = 'deposit';
    private $title          = 'Transaction Deposit';

    public function __construct(){
        $this->model = Transaction::class;
    }

    public function layout($pageName){

        $this->data['bUrl']  =  $this->bUrl;
        return view("pages.deposit.{$pageName}", $this->data);

    }

    public function index(){
        $user = auth()->user();
        $transactions = $user->transactions()->where('transaction_type','deposit')->paginate(10);

        $this->data = [
            'title'         => "{$this->title} Manage",
            'pageUrl'       => $this->bUrl,
            'transactions'  => $transactions,
            'user'          => $user
        ];

        return $this->layout('index');
    }


    public function create(){
        $this->data = [
            'title'         => "{$this->title} Create",
            'pageUrl'       => "{$this->bUrl}/create",
            'objData'       => ''
        ];
        return $this->layout('create');
    }

    public function edit($id){

        $this->data = [
            'title'         => "{$this->title} Create",
            'pageUrl'       => "{$this->bUrl}/{$id}/edit",
            'objData'       => $this->model::findOrFail($id)
        ];
        return $this->layout('create');
    }

    public function store(DepositRequest $request){
        $id = $request['id'];
        $user = auth()->user();
        $data = [
            'transaction_type'      => 'deposit',
            'amount'                => $request['amount'],
            'date'                  => date('Y-m-d', strtotime($request['date'])),
            'user_id'               => $user->id
        ];


        if (!$id){
            $userBalance    = $request['amount'];
            $message        = 'Deposit successfully create';
        }else{
            $transaction    = Transaction::findOrFail($id);
            // Calculate the difference in the amount
            $originalAmount = $transaction->amount;
            $newAmount      = $request['amount'];
            $userBalance    = $newAmount - $originalAmount;
            $message        = ' Deposit successfully updated';
        }

        $this->model::updateOrCreate(['id'=>$id], $data);

        $user->balance += $userBalance; // Update the balance based on the amount difference
        $user->save();
        return redirect($this->bUrl)->with('success', $message);
    }



}
