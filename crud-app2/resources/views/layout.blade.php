<!DOCTYPE html>

<html>
    <head>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
        <title>Products</title>
    </head>
<body>
    <div style="width: 90%; margin: auto; padding: 40px">
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
