<?php

namespace App\Http\Controllers;

use App\Models\Transaction;

use App\Http\Requests\WithdrawalRequest;
use App\Services\WithdrawalService;


class WithdrawalController extends Controller
{
    private $data;
    private $model;
    private $bUrl           = 'withdrawal';
    private $title          = 'Withdrawal';

    protected $withdrawalService;

    public function __construct(WithdrawalService $withdrawalService){
        $this->model            = Transaction::class;
        $this->withdrawalService = $withdrawalService;
    }


    public function layout($pageName){
        $this->data['bUrl']  =  $this->bUrl;
        return view("pages.withdrawal.{$pageName}", $this->data);

    }

    public function index(){
        $user = auth()->user();
        $transactions = $user->transactions()->where('transaction_type','withdrawal')->paginate(10);

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

    public function store(WithdrawalRequest $request){
        $id = $request['id'];
        $user = auth()->user();

        $withdrawFee = $this->withdrawalService->getWithdrawFee($user, $request['amount']);

        $data = [
            'transaction_type'      => 'withdrawal',
            'amount'                => $request['amount'],
            'date'                  => $request['date'],
            'user_id'               => $user->id,
            'fee'                   => $withdrawFee
        ];
        $amountWithoutFee = $request['amount'] + $withdrawFee;
        if (!$id){
            $userBalance  = $amountWithoutFee;
            $message = "{$this->title} successfully create";
        }else{
            $transaction = Transaction::findOrFail($id);


            $transactionBalance = $transaction->amount + $transaction->fee ;
            $userBalance    = $amountWithoutFee - $transactionBalance;
            $message        = $this->title.' successfully updated';
        }



        $user->balance -= $userBalance; // Update the balance based on the amount difference
        if ($user->balance<0){
            return redirect()->back()->with('error', 'Sorry your withdrawal amount invalid.')->withInput();
        }
        $this->model::updateOrCreate(['id'=>$id], $data);
        $user->save();
        return redirect($this->bUrl)->with('success', $message);
    }



}
