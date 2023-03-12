@extends("dashboard")

@section("content")
<h3 class="d-flex justify-content-center">Edit a User</h3>
<form method="POST" action="{{ route('users.update', $user->id) }}">
@csrf
@method("PUT")
@include("users.form")
<div class="form-group">
    <button class="btn btn-primary" type="submit">Update User</button>
    <a href="{{ route('users.index') }}" class="btn btn-danger">Cancel</a>
</div>
</form>
@endsection
