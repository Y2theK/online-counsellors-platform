@extends('layouts.master')


@section('breadcumb')
<div class=" container-fluid">
  <div class="row mb-2">
    <div class="col-sm-6">
      <ol class="breadcrumb float-sm-left">
        <li class="breadcrumb-item"><a href="#">Home</a></li>
        <li class="breadcrumb-item "><a href="{{ route('admin.users.index') }}">Users</a></li>
        <li class="breadcrumb-item active">Create</li>
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
          <h3 class="card-title">Users Create</h3>
        </div>
        <div class="card-body">
          @foreach ($errors->all() as $error)
          <p class="alert alert-danger">{{ $error }}</p>
          @endforeach
          <form action="{{ route('admin.users.store') }}" method="POST" class="form" enctype="multipart/form-data">
            @csrf
            <label for="users">New Users</label>
            <input type="text" name="name" class="form-control mb-3" placeholder="name">
            <input type="text" name="email" class="form-control mb-3" placeholder="email">
            <input type="number" name="age" class="form-control mb-3" placeholder="age">
            <select name="gender" id="gender" class="form-control mb-3">
              <option value="male">male</option>
              <option value="female">female</option>
              <option value="other">other</option>
            </select>
            <input type="text" name="profession" class="form-control mb-3" placeholder="profession">
            <input type="text" name="field" class="form-control mb-3" placeholder="field">
            <input type="number" name="experience" class="form-control mb-3" placeholder="experience">
            <input type="text" name="hobby" class="form-control mb-3" placeholder="hobby">
            <input type="file" name="image" class="form-control mb-3">

            <input type="submit" class="btn btn-info mb-3">
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection