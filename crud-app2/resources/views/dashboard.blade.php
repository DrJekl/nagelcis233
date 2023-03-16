<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
        <div class="mt-1">
        @if (session()->get("error"))
        <div class="text-bg-danger w-50">{{ session()->get("error") }}</div>
        @endif
        @if ($errors->any())
        <div class="text-bg-danger w-50">
        @foreach ($errors->all() as $error)
        <span>{{ $error }}</span><br>
        @endforeach
        </div>
        @endif
        @if (session()->get("success"))
        <div class="text-bg-success w-50">
            {{ session()->get("success") }}
        </div>
        @endif
        <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    @yield("content")
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
