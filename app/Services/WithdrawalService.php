<?php
namespace App\Services;

use App\Models\Transaction;
use Carbon\Carbon;

class WithdrawalService
{

    public function getWithdrawFee( $user, $withdrawalAmount)
    {
        if($user->account_type === 'Individual'){
            return $this->calculateIndividualWithdrawalFee($user, $withdrawalAmount);
        }else{
            return $this->calculateBusinessWithdrawalFee($user, $withdrawalAmount);
        }

    }


    //  calculate withdrawal fee for Individual accounts
    private function calculateIndividualWithdrawalFee($user, $withdrawalAmount)
    {
        // Check if it's the first 1K withdrawal
        if (($withdrawalAmount <= 1000) || ($this->isFreeWithdrawal($user))) {
            return 0; // No fee
        }

        // Check if it's the first 5K withdrawal of the month
        if ($this->isFirstWithdrawalOfMonth($user, $withdrawalAmount)) {
            return 0; // No fee
        }

        $withdrawalFeebleAmount = $withdrawalAmount-1000;

        // Apply the default withdrawal fee
        return $withdrawalFeebleAmount * 0.015;
    }

    //  method to calculate withdrawal fee for Business accounts
    private function calculateBusinessWithdrawalFee($user, $withdrawalAmount)
    {
        // Check if the total withdrawal exceeds 50K
        if ($user->total_withdrawal >= 50000) {
            return $withdrawalAmount * 0.015; // Decreased fee
        }

        // Apply the default withdrawal fee
        return $withdrawalAmount * 0.025;
    }


    private function isFreeWithdrawal($user){
        // Check if it's the withdrawal day (Friday)
        if ($this->isFreeWithdrawalDay()){
            return true;
            // Check if it's the first 5K withdrawal of the month
        }elseif ($this->isFreeWithdrawalMonth($user)){
            return true;
        }
    }

    // method to check if it's a free withdrawal day (Friday)
    private function isFreeWithdrawalDay()
    {
        return now()->dayOfWeek === Carbon::FRIDAY;
    }

    //  method to check if it's a free withdrawal month
    private function isFreeWithdrawalMonth($user)
    {
        $withdrawalMonthCount = $user->transactions()
            ->where('transaction_type', 'withdrawal')
            ->whereMonth('date', now()->month)
            ->sum('amount');

        return $withdrawalMonthCount <= 5000; // The first 5K withdrawal each month is free
    }

}
