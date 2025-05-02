<?php

namespace App\Http\Controllers;

use App\Http\Requests\TransactionRequest;
use App\Models\Transaction;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    public function index()
    {
        return view('transaction.index');
    }

    public function create()
    {
        return view('transaction.create');
    }

    public function store(TransactionRequest $request)
    {
        Transaction::create($request->validated());

        return redirect()->route('transaction.index')->with('success', 'Transaction created successfully.');
    }

    public function show($id)
    {
        // Show a specific transaction
    }

    public function edit($id)
    {
        // Edit a specific transaction
    }

    public function update(Request $request, $id)
    {
        // Update the transaction
    }

    public function destroy($id)
    {
        // Delete the transaction
    }
}
