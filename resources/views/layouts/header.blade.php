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
    <div class="container mx-auto p-2">
        @if (Request::route()->getName() != 'transaction.show')
            <div class="p-5 float-end">
                @if (!session()->get('create_mode'))
                    <form action="{{ route('transaction.create') }}" method="PUT" class="inline-block">
                        @csrf
                        <button type="submit" class="text-blue-400 underline text-2xl">Create Transaction</button>
                    </form>
                @else 
                    <form action="{{ route('transaction.view-transaction') }}" method="POST" class="inline-block">
                        @csrf
                        <button type="submit" class="text-blue-400 underline text-2xl">View Transaction</button>
                    </form>
                @endif
            </div>
        @endif
        
        @yield('content')
    </div>
</body>
</html>