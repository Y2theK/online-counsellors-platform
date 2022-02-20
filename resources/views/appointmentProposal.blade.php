@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row justify-content-center mb-3">
    <div class="col-md-4">
      <div class="card">
        <div class="card-header">{{ __('Your Counsellor Detail') }}</div>

        <div class="card-body">



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
      <a href="{{ route('home') }}" class="btn btn-info mt-4">Go Home</a>

    </div>
    <div class="col-md-8">
      <div class="card  mt-4">
        <div class="card-header">{{ __('Make Appointment') }}</div>

        <div class="card-body">
          @if (session('status'))
          <div class="alert alert-success" role="alert">
            {{ session('status') }} <p> Wait For Counsellor Response. Counsellor will contact u via email.</p>

          </div>
          @endif
          @foreach ($errors->all() as $error)
          <p class="alert alert-danger">{{ $error }}</p>
          @endforeach
          <form action="{{ route('submitAppointmentProposal',$user->id) }}" method="POST">
            @csrf
            <div class="form-group mb-3">
              <label for="name">Name</label>
              <input type="text" class="form-control" name="name" id="name" placeholder="mikey">
            </div>
            <div class="form-group">
              <label for="email">Email</label>
              <input type="email" class="form-control" name="email" id="email" placeholder="yourmail@gmail.com">
            </div>
            <div class="form-group mb-3">
              <label for="field">Field</label>
              <input type="text" class="form-control" name="field" id="field" placeholder="web">
            </div>
            <div class="form-group mb-3">
              <label for="description">Description</label>
              <textarea name="description" id="description"
                placeholder="i want to discuss about blah blah blah lorem ispam" cols="30" rows="5"
                class="form-control"></textarea>
            </div>
            <div class="form-group mb-3">
              <label for="dtOfAppointment">Proposal Appointment DateTime</label>
              <input type="datetime-local" class="form-control" name="dtOfAppointment" id="dtOfAppointment"
                placeholder="mikey">
            </div>
            <input type="submit" class="btn btn-info" value="Submit">
          </form>

        </div>
      </div>

    </div>
  </div>
</div>
@endsection