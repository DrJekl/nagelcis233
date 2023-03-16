@extends("dashboard")

@section("content")
<h3 class="d-flex justify-content-center">Add a New User</h3>
<form method="POST" action="{{ route('users.store') }}">
@csrf
@include("users.form")
<div class="form-group">
    <button class="btn btn-primary" type="submit">Save User</button>
    <a href="{{ route('users.index') }}" class="btn btn-danger">Cancel</a>
</div>
</form>
@endsection
