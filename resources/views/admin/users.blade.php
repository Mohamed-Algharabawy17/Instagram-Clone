@extends('admin.main')

@section('title')
    Index
@endsection

@section('content')
<form action="{{ route('users.dashboard') }}" method="GET" class="mb-3">
  <div class="input-group mb-3">
      <input type="text" name="search" class="form-control" placeholder="Search comments" value="{{ $search ?? '' }}">
      <div class="input-group-append">
          <button type="submit" class="btn btn-outline-secondary">Search</button>
      </div>
  </div>

  <div class="form-check form-check-inline">
    <input class="form-check-input" type="checkbox" name="attribute[]" value="name" {{ in_array('name', $selectedAttributes) ? 'checked' : '' }}>
    <label class="form-check-label">Name</label>
  </div>
  <div class="form-check form-check-inline">
    <input class="form-check-input" type="checkbox" name="attribute[]" value="username" {{ in_array('username', $selectedAttributes) ? 'checked' : '' }}>
    <label class="form-check-label">User_Name</label>
  </div>
  <div class="form-check form-check-inline">
    <input class="form-check-input" type="checkbox" name="attribute[]" value="email" {{ in_array('email', $selectedAttributes) ? 'checked' : '' }}>
    <label class="form-check-label">Email</label>
  </div>
  <div class="form-check form-check-inline">
    <input class="form-check-input" type="checkbox" name="attribute[]" value="id" {{ in_array('id', $selectedAttributes) ? 'checked' : '' }}>
    <label class="form-check-label">ID</label>
  </div>

  <!-- Add more checkboxes for other attributes -->

</form>

<table class="table mt-4" style="text-align: center"  border="2px" >
  <thead>
    <tr>
        <th scope="col">User ID</th>
        <th scope="col">Name</th>
      <th scope="col">userName</th>
      <th scope="col">Email</th>
      <th scope="col" width="250px">Actions</th>
    </tr>
  </thead>
  <tbody>
    @foreach ($users as $user)
    <tr>
        <td>{{ $user->id }}</td>
        <td>{{ $user->name }}</td>
        <td>{{ $user->username }}</td>
        <td>{{ $user->email }}</td>
      <td>
        <a href="" class="btn btn-primary">Show</a>
        <form style="display: inline" action="{{ route("users.destroy", $user->id) }}" method="POST">
          @csrf
          @method("DELETE")
          <button type="submit" class="btn btn-danger">Delete</button>
        </form>
      </td>
    </tr>
    @endforeach
  </tbody>
</table>
{{-- {{ $posts->links() }} --}}
@endsection