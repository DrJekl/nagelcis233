@extends("dashboard")

@section("content")
<h3 class="d-flex justify-content-center">Users</h3>
<table class="table">
    <thead>
        <tr>
            <th scope="col">Name</th>
            <th scope="col">Email</th>
            <th scope="col">Modify</th>
        </tr>
    </thead>
    <tbody>
        @foreach($users as $user)
        <tr>
            <td>{{ $user->name }}</td>
            <td>{{ $user->email }}</td>
            <td>
                <a href="{{ route('users.edit', $user->id) }}" class="btn btn-primary" style="width: 75px; margin-block: 10px">Edit</a>
                <form method="POST" action="{{ route('users.destroy', $user->id) }}" onSubmit="return confirm('Are you sure?')">
                    @csrf
                    @method("DELETE")
                    <button type="submit" class="btn btn-danger" style="width: 75px">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection("content")
