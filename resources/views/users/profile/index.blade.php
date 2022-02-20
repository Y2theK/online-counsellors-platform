@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header">{{ __('Profile') }}</div>

        <div class="card-body">
          @if (session('status'))
          <div class="alert alert-success" role="alert">
            {{ session('status') }}
          </div>
          @endif

          <p>Name - {{ $user->name }}</p>
          <p>Email - {{ $user->email }}</p>
          <p>Gender - {{ $user->detail->gender }}</p>
          <p>Age - {{ $user->detail->age }}</p>
          <p>Field - {{ $user->detail->field }}</p>
          <p>Profession - {{ $user->detail->profession }}</p>
          <p>Experience - {{ $user->detail->experience }} years</p>
          <p>Hobby - {{ $user->detail->hobby }}</p>
          <a href="{{ route('users.profile.edit',$user->id) }}" class="btn btn-success">Update Profile</a>
        </div>
      </div>
    </div>
  </div>

</div>
@endsection