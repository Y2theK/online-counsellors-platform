@extends('layouts.app')

@section('content')
<div class="container-fluid">
  <div class="row">
    <div class="col-12">
      <div class="card text-light">
        <div class="card-header">
          <h3 class="card-title">Users Edit</h3>
        </div>
        <div class="card-body">
          <form action="{{ route('users.profile.update',$user->id) }}" method="POST" class="form">
            @csrf
            @method('PUT')
            <label for="users">Edit user</label>
            <input type="text" name="name" class="form-control mb-3" placeholder=" name"
              value="{{ old('name',$user->name) }}">

            <input type="email" name="description" class="form-control mb-3" placeholder=" email"
              value="{{ old('email',$user->email) }} ">
            <input type="text" name="description" class="form-control mb-3" placeholder=" email"
              value="{{ old('gender',$user->detail->gender) }} ">
            <input type="text" name="description" class="form-control mb-3" placeholder=" email"
              value="{{ old('field',$user->detail->field) }} ">
            <input type="text" name="profession" class="form-control mb-3" placeholder=" email"
              value="{{ old('profession',$user->detail->profession) }} ">
            <input type="text" name="age" class="form-control mb-3" placeholder=" email"
              value="{{ old('age',$user->detail->age) }} ">
            <input type="text" name="hobby" class="form-control mb-3" placeholder=" email"
              value="{{ old('hobby',$user->detail->hobby) }} ">

            <input type="submit" class="btn btn-info mb-3" value="Update">
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection