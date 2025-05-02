<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Transaction Project</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
</head>
<body>
    <div class="container mx-auto p-20 w-300">
        <div class="flex justify-between items-center mb-4">
            <h1 class="text-3xl">Transaction</h1>
            @if (request()->routeIs('transaction.create'))
                <a href="{{ route('transaction.index') }}" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded-lg">View Transactions</a>
            @else
                <a href="{{ route('transaction.create') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-lg">Create Transaction</a>
            @endif
        </div>
    </div>
</body>
</html>