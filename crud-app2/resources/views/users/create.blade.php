@extends("dashboard")

@section("content")
<h3 class="d-flex justify-content-center">Add a New User</h3>
<form method="POST" action="{{ route('users.store') }}">
@csrf
@include("users.form")
<!-- <input type="hidden" name="role" value="viewer">
<input type="hidden" name="password" value="password"> -->
<div class="form-group">
    <button class="btn btn-primary" type="submit">Save User</button>
    <a href="{{ route('users.index') }}" class="btn btn-danger">Cancel</a>
</div>
</form>
@endsection
