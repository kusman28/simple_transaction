@extends('layouts.header')

@section('content')
<div class="container mx-auto p-4">
    <h1 class="text-3xl font-bold">Create Transaction</h1>
    @if ($errors->any())
        <div class="alert alert-danger bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mt-4">
            <ul>
                @foreach ($errors->all() as $error)
                    <li class="list-disc ml-4">{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="{{ route('transaction.store') }}" method="POST" class="mt-4">
        @csrf
        <select name="transaction_type" class="border p-2 rounded-lg w-full mb-4">
            <option disabled selected>Transaction Type</option>
            @foreach(\App\Enums\TransactionTypes::types() as $type)
                <option value="{{ $type->value }}">{{ ucfirst($type->value) }}</option>
            @endforeach
        </select>
        <div class="flex flex-col mb-4">
            <label for="amount" class="text-lg">Amount:</label>
            <input type="text" name="amount" id="amount" required class="border p-2 rounded-lg w-full" value="{{ old('amount') }}" />
        </div>
        <div class="flex flex-col mb-4">
            <label for="reference" class="text-lg">Reference:</label>
            <input type="text" name="reference" id="reference" required class="border p-2 rounded-lg w-full" value="{{ old('reference') }}" />
        </div>
        <input type="hidden" name="balance_after" value="{{ Auth::user()->balance }}" />
        <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-lg cursor-pointer">Save</button>
    </form>
</div>
@endsection