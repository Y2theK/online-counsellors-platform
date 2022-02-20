@extends('layouts.master')


@section('breadcumb')
<div class=" container-fluid">
  <div class="row mb-2">
    <div class="col-sm-6">
      <ol class="breadcrumb float-sm-left">
        <li class="breadcrumb-item"><a href="#">Home</a></li>
        <li class="breadcrumb-item "><a href="{{ route('admin.users.index') }}">Users</a></li>
        <li class="breadcrumb-item active">Detail</li>
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
          <h3 class="card-title">Users Detail</h3>
        </div>
        <div class="card-body">
          @foreach ($errors->all() as $error)
          <p class="alert alert-danger">{{ $error }}</p>
          @endforeach

          <label for="questions">Detail User</label>
          <p> Name - {{ $user->name }}</p>
          <p> Email - {{ $user->email }}</p>
          <p> Age - {{ $user->detail->age }}</p>
          <p> Gender - {{ $user->detail->gender }}</p>
          <p> Field - {{ $user->detail->field }}</p>
          <p> Profession - {{ $user->detail->profession }}</p>
          <p> Exprience - {{ $user->detail->experience }}</p>
          <p> Hobby - {{ $user->detail->hobby }}</p>



        </div>
      </div>
    </div>
  </div>
</div>
@endsection