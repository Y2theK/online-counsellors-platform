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
    <div class="col-md-10">
      <div class="card">
        <div class="card-header">{{ __('Best Counsellors For You') }}</div>

        <div class="card-body">
          @if (session('info'))
          <div class="alert alert-info">{{session('info')}}</div>
          @endif

          <table id="example1" class="table table-bordered table-striped  ">
            <thead>
              <tr>
                <th>ID</th>
                <th>Counsellor Name</th>
                <th>Counsellor Email</th>
                <th>Field</th>
                <th>Profession</th>
                <th>Experience</th>
                <th>Hobby</th>
                <th>Actions</th>

              </tr>
            </thead>
            <tbody>
              @php($count=1)
              @forelse ($users as $user)
              <tr>

                <td>{{ $count++ }}</td>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->field }}</td>
                <td>{{ $user->profession }}</td>
                <td>{{ $user->experience }} years</td>
                <td>{{ $user->hobby }}</td>


                <td>
                  <a href="{{ route('appointmentProposal',$user->user_id) }}" class="btn btn-warning btn-sm">Make
                    Appointment</a>



                </td>
              </tr>

              @empty
              <tr class=" h5">
                <td colspan="8" class="text-center">
                  <i class="fa fa-folder-open"></i>
                  <span>No Counsellors Found...</span>
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