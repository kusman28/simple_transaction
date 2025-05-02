@include('layouts.header')

<div class="container mx-auto p-4 w-300">
    <p class="text-3xl font-bold mb-4">Transactions</p>
    <div class="relative overflow-x-auto">
        @if ($transactions->isEmpty())
            <p class="text-gray-500 text-sm leading-relaxed">No transaction records at the moment. Please create one</p>
        @else
            <table class="w-full text-sm text-left rtl:text-right text-gray-500 ">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 ">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            ID
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Transaction Type
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Amount
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Previous Balance
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Actions
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($transactions as $transaction)
                        <tr class="bg-white border-b border-gray-200">
                            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                                {{ $transaction->id }}
                            </th>
                            <td class="px-6 py-4">
                                <span class="bg-blue-100 text-blue-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded-sm">
                                    {{ $transaction->transaction_type }}
                                </span>
                            </td>
                            <td class="px-6 py-4">
                                {{ $transaction->amount }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $transaction->balance_after }}
                            </td>
                            <td class="px-6 py-4">
                                <a href="{{ route('transaction.update', $transaction->id) }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-lg">Edit</a>
                                <form action="{{ route('transaction.destroy', $transaction->id) }}" method="POST" class="inline-block" onsubmit="return confirm('Are you sure you want to delete this transaction?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-2 rounded-lg">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        @endif
</div>