<?php

declare(strict_types=1);

namespace App\Http\Controllers;


use App\Http\Requests\TransactionRequest;
use App\Models\Transaction;
use App\Services\TransactionService;
use Illuminate\Support\Facades\Session;

class TransactionController extends Controller
{
    public function __construct(
        private TransactionService $transactionService
    ) {
    }

    public function index()
    {
        $transactions = Transaction::all()->sortByDesc('created_at');

        return view('transaction.index')->with('transactions', $transactions);
    }

    public function create()
    {
        Session::put('create_mode', true);
        return redirect()->to('/dashboard');
    }

    public function store(TransactionRequest $request)
    {
        $validatedData = $request->validated();
        $previousBalance = auth()->user()->balance;

        $this->transactionService->createTransaction($validatedData, $previousBalance);

        return redirect()->to('/dashboard')->with('success', 'Transaction created successfully.');
    }

    public function show($id)
    {
        $transaction = Transaction::findOrFail($id);

        return view('transaction.show', compact('transaction'));
    }

    public function update($id, TransactionRequest $request)
    {
        $validatedData = $request->validated();
        $previousBalance = auth()->user()->balance;

        $this->transactionService->updateTransaction($id, $validatedData, $previousBalance);

        return redirect()->to('/dashboard')->with('success', 'Transaction updated successfully.');
    }

    public function destroy($id)
    {
        $transaction = Transaction::findOrFail($id);
        $transaction->delete();

        return redirect()->to('/dashboard')->with('success', 'Transaction deleted successfully.');
    }

    public function view()
    {
        Session::put('create_mode', false);
        return redirect()->to('/dashboard');
    }
}
