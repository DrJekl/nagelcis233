<!DOCTYPE html>

<html>
    <head>
        <title>Products</title>
    </head>
<body>
    <div style="width: 90%; margin: auto; padding: 40px">
    <div class="d-flex justify-content-end">
      @if (Route::has('login'))
            <div class="sm:fixed sm:top-0 sm:right-0 p-6 text-right">
                @auth
                    <a href="{{ url('/dashboard') }}" class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Dashboard</a>
                @else
                    <a href="{{ route('login') }}" class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Log in</a>

                    @if (Route::has('register'))
                        <a href="{{ route('register') }}" class="ml-4 font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Register</a>
                    @endif
                @endauth
            </div>
        @endif
    </div>
        <h1>CRUD App</h1>
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
        <div class="mt-1">
            @yield("content")
        </div>
    </div>
</body>
</html>
