<div class="mb-3">
    <label for="userName" class="form-label">Name</label>
<div class="input-group">
  <input name="name" type="text" class="form-control" placeholder="Name" id="userName" value="{{ old('name', $user->name) }}">
</div>
</div>
<div class="mb-3">
    <label for="userEmail" class="form-label">Email</label>
<div class="input-group">
  <input name="email" type="text" class="form-control" placeholder="Email" id="userEmail" value="{{ old('email', $user->email) }}">
</div>
</div>
