@extends('layouts.master')


@section('breadcumb')
<div class=" container-fluid">
  <div class="row mb-2">
    <div class="col-sm-6">
      <ol class="breadcrumb float-sm-left">
        <li class="breadcrumb-item"><a href="#">Home</a></li>
        <li class="breadcrumb-item "><a href="{{ route('admin.users.index') }}">Users</a></li>
        <li class="breadcrumb-item active">Edit</li>
      </ol>
    </div><!-- /.col -->
  </div><!-- /.row -->
</div><!-- /.container-fluid -->
@endsection
@section('content')
<div class="container-fluid">
  <div class="row">
    <div class="col-12">
      <div class="card text-light" style="background: #1A202C">
        <div class="card-header">
          <h3 class="card-title">Users Edit</h3>
        </div>
        <div class="card-body">
          @foreach ($errors->all() as $error)
          <p class="alert alert-danger">{{ $error }}</p>
          @endforeach
          <form action="{{ route('admin.users.update',$user->id) }}" method="POST" class="form">
            @csrf
            @method('PUT')
            <label for="questions">Edit User</label>
            <input type="text" name="name" class="form-control mb-3" value="{{ old('name',$user->name) }}">
            <input type="email" name="email" class="form-control mb-3" value="{{ old('email',$user->email) }} ">
            <input type="number" name="age" class="form-control mb-3" value="{{ $user->detail->age ?? '0' }}">
            <input type=" text" name="profession" class="form-control mb-3"
              value="{{ $user->detail->profession ?? '' }} ">
            <input type="text" name="field" class="form-control mb-3" value="{{ $user->detail->field ?? '' }} ">
            <input type="text" name="experience" class="form-control mb-3"
              value="{{ $user->detail->experience ?? '' }} ">
            <input type="text" name="hobby" class="form-control mb-3" value="{{ $user->detail->hobby ?? ''}} ">
            {{-- need to fix auto check here --}}
            <select name="gender" id="gender" class="form-control mb-3">
              <option value="m">male</option>
              <option value="f">female</option>
              <option value="o">other</option>
            </select>
            <input type="submit" class="btn btn-info" value="Update">
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection