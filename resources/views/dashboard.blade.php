<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Transaction Project
        </h2>
        <p>By Khalid Usman</p>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <p>
                        Welcome, {{ Auth::user()->name }}
                    </p>
                    <p>
                        Current Balance: <span class="font-bold text-blue-400 text-2xl">{{ Auth::user()->balance }}</span> 
                    </p>
                </div>
            </div>
        </div>
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 mt-4">
            @if (session('success'))
                <div class="alert alert-success bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mt-4 mb-4">
                    {{ session('success') }}
                </div>
            @endif
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                @if (session()->get('create_mode'))
                    @include('transaction.create')
                @else    
                    @include('transaction.index')
                @endif
            </div>
        </div>
    </div>
</x-app-layout>
