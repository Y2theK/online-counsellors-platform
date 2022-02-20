@extends('layouts.app')

@section('content')
<div class="container-fluid">
  <div class="row">
    <div class="col-12">
      <div class="card text-light" style="background: #1A202C">
        <div class="card-header">
          <h3 class="card-title">Appointments Edit</h3>
        </div>
        <div class="card-body">
          @foreach ($errors->all() as $error)
          <p class="alert alert-danger">{{ $error }}</p>
          @endforeach
          <form action="{{ route('users.appointments.update',$appointment->id) }}" method="POST" class="form">
            @csrf
            @method('PUT')
            <label for="">Name</label>
            <input type="text" name="name" class="form-control mb-3" placeholder=" name"
              value="{{ old('name',$appointment->name) }}">

            <label for="">Email</label>
            <input type="email" name="email" class="form-control mb-3" placeholder=" email"
              value="{{ old('email',$appointment->email) }} ">

            <label for=""> DateTime of Appointment
            </label>

            {{-- need to fix datetime here --}}
            <input type="datetime-local" name="dtOfAppointment" class="form-control mb-3"
              placeholder="appointment datetime"
              value="{{ implode('T', explode(' ', $appointment->dtOfAppointment)) }}">

            <label for="">Field</label>
            <input type="text" name="field" class="form-control mb-3" placeholder="appointment field"
              value="{{ old('field',$appointment->field) }} ">

            <label for="">Description</label>
            <input type="text" name="description" class="form-control mb-3" placeholder="appointment description"
              value="{{ old('description',$appointment->description) }} ">

            <label for="">Status</label>
            <select name="status" id="status" class="form-control mb-3">
              {{-- need to fix option checking here. will do later --}}
              <option value="{{ $appointment->status }}" selected>{{ $appointment->status }}</option>
              <option value="cancel">Cancel</option>
              <option value="pending">Pending</option>
              <option value="done">Done</option>
              <option value="comfirm">Comfirm</option>
              <option value="not_comfirm">Not Comfirmed</option>
              <option value="unfinished">Unfinished</option>
            </select>

            <input type="submit" class="btn btn-info mb-3" value="Update">
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection