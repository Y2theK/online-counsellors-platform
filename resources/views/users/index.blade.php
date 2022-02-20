@extends('layouts.app')
<!-- DataTables -->

<!-- Font Awesome Icons -->
<link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css') }}">
<link rel="stylesheet" href={{ asset('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}>
<link rel=" stylesheet" href={{ asset('plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}>
<link rel=" stylesheet" href={{ asset('plugins/datatables-buttons/css/buttons.bootstrap4.min.css')}}>
@section('content')
<div class="container-fluid">
  <div class="row justify-content-center">
    <div class="col-md-10 mb-3">
      <div class="card">
        <div class="card-header">{{ __('Profile') }}</div>
        <div class="card-body">


          <span>Name - {{ auth()->user()->name }}</span>
          <span class="mx-4">Email - {{ auth()->user()->email }}</span>
          <a href="{{ route('users.profile.index')}}" class="btn btn-success">Go Profile </a>
        </div>
      </div>
    </div>


    <div class="col-md-10">
      <div class="card">
        <div class="card-header">{{ __('Appointments Management') }}</div>

        <div class="card-body">
          @if (session('status'))
          <div class="alert alert-info">{{session('status')}}</div>
          @endif
          <a href="{{ route('users.appointments.create') }}" class="btn btn-primary float-left"><i
              class="fa fa-plus-circle m-1"></i>New Appointment</a>

          <table id="example1" class="table table-bordered table-striped  ">
            <thead>
              <tr>
                <th>ID</th>
                <th>Client Name</th>
                <th>Client Email</th>
                <th>Appointment Date</th>
                <th>Field</th>
                <th>Description</th>
                <th>Status</th>
                <th>Actions</th>

              </tr>
            </thead>
            <tbody>
              @forelse ($appointments as $appointment)
              <tr>
                {{-- {{ dd($user) }} --}}
                <td>{{ $appointment->id }}</td>
                <td>{{ $appointment->name }}</td>
                <td>{{ $appointment->email }}</td>
                <td>{{ $appointment->dtOfAppointment }}</td>
                <td>{{ $appointment->field }}</td>
                <td>{{ $appointment->description }}</td>
                <td class="text-info">{{ $appointment->status}}</td>

                <td>

                  <a href="{{ route('users.appointments.edit',$appointment->id) }}" class="btn text-warning btn-sm"><i
                      class="fa fa-edit"></i></a>

                  <form action="{{ route('users.appointments.destroy',$appointment->id) }}" method="post"
                    class="d-inline-block">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-sm text-danger"><i class="fa fa-trash"
                        onclick="return confirm('Are you sure to delete?')"></i></button>
                  </form>

                </td>

              </tr>
              @empty
              <tr class=" h5">
                <td colspan="5" class="text-center">
                  <i class="fa fa-folder-open"></i>
                  <span>No questions Found...</span>
                </td>
              </tr>
              @endforelse


            </tbody>
            <tfoot>

            </tfoot>
          </table>
        </div>
        <!-- /.card-body -->
      </div>
    </div>
  </div>
</div>
@endsection
<!-- DataTables  & Plugins -->
<!-- jQuery -->
<script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>

<script src={{ asset('plugins/datatables/jquery.dataTables.min.js')}}></script>
<script src={{ asset('plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}></script>
<script src={{ asset('plugins/datatables-responsive/js/dataTables.responsive.min.js')}}></script>
<script src={{ asset('plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}></script>
<script src={{ asset('plugins/datatables-buttons/js/dataTables.buttons.min.js')}}></script>
<script src={{ asset('plugins/datatables-buttons/js/buttons.bootstrap4.min.js')}}></script>
<script src={{ asset('plugins/jszip/jszip.min.js')}}></script>

<script>
  $(function () {
    
      $('#example1').DataTable({
        "paging": true,
        "pageLength": 7,
        "lengthChange": false,
        "searching": true,
        "ordering": true,
        "info": true,
        "autoWidth": false,
        "responsive": true,
        'columnDefs': [ {
        'targets': [7], /* column index */
        'orderable': false, /* true or false */
        
     }]
      });
    });
</script>