<?php

declare(strict_types=1);

namespace App\Services;

use App\Enums\TransactionTypes;
use App\Models\Transaction;
use Illuminate\Support\Facades\Session;

final class TransactionService 
{
    public function createTransaction($data, $previousBalance)
    {
        switch (TransactionTypes::from($data['transaction_type'])) {
            case TransactionTypes::DEPOSIT:
            case TransactionTypes::CREDIT:
                $data['balance_after'] = $previousBalance + $data['amount'];
                break;

            case TransactionTypes::PAYMENT:
            case TransactionTypes::REFUND:
                $data['balance_after'] = $previousBalance - $data['amount'];
                break;
        }

        Transaction::create([
            'transaction_type' => $data['transaction_type'],
            'amount' => $data['amount'],
            'reference' => $data['reference'],
            'balance_after' => $data['balance_after'] ?? $previousBalance,
        ]);

        Session::put('create_mode', false);

        $this->updateUserBalance($data);
    }

    public function updateTransaction($id, $data, $previousBalance)
    {
        $transaction = Transaction::findOrFail($id);

        switch (TransactionTypes::from($data['transaction_type'])) {
            case TransactionTypes::DEPOSIT:
            case TransactionTypes::CREDIT:
                $data['balance_after'] = $previousBalance + $data['amount'];
                break;

            case TransactionTypes::PAYMENT:
            case TransactionTypes::REFUND:
                $data['balance_after'] = $previousBalance - $data['amount'];
                break;
        }

        $transaction->update([
            'transaction_type' => $data['transaction_type'],
            'amount' => $data['amount'],
            'reference' => $data['reference'],
            'balance_after' => $data['balance_after'] ?? $previousBalance,
        ]);

        Session::put('create_mode', false);

        $this->updateUserBalance($data);
    }

    private function updateUserBalance($data)
    {
        $user = auth()->user();
        
        $user->balance = match ($data['transaction_type']) {
            'deposit' => $user->balance + $data['amount'],
            'refund' => $user->balance + $data['amount'],
            'payment' => $user->balance - $data['amount'],
            'credit' => $user->balance - $data['amount'],
            default => $user->balance,
        };

        $user->save();
    }
}