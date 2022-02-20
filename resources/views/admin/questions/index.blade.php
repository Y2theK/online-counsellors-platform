@extends('layouts.master')
@section('styles')
<!-- DataTables -->
<link rel="stylesheet" href={{ asset('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}>
<link rel=" stylesheet" href={{ asset('plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}>
<link rel=" stylesheet" href={{ asset('plugins/datatables-buttons/css/buttons.bootstrap4.min.css')}}>
@endsection

@section('breadcumb')
<div class=" container-fluid">
  <div class="row mb-2">
    <div class="col-sm-6">
      <ol class="breadcrumb float-sm-left">
        <li class="breadcrumb-item"><a href="#">Home</a></li>
        <li class="breadcrumb-item active">Questions</li>
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
          <h3 class="card-title">Questions Management</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
          @if (session('info'))
          <div class="alert alert-info">{{session('info')}}</div>
          @endif
          <a href="{{ route('admin.questions.create') }}" class="btn btn-primary float-left"><i
              class="fa fa-plus-circle m-1"></i>New Questions</a>

          <table id="example1" class="table table-bordered table-striped  ">
            <thead>
              <tr>
                <th>ID</th>
                <th>Title</th>
                <th>Description</th>
                <th>Actions</th>

              </tr>
            </thead>
            <tbody>
              @forelse ($questions as $question)
              <tr>
                {{-- {{ dd($user) }} --}}
                <td>{{ $question->id }}</td>
                <td>{{ $question->title }}</td>
                <td>{{ $question->description }}</td>

                <td>

                  <a href="{{ route('admin.questions.edit',$question->id) }}" class="btn text-warning btn-sm"><i
                      class="fa fa-edit"></i></a>

                  <form action="{{ route('admin.questions.destroy',$question->id) }}" method="post"
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
      <!-- /.card -->
    </div>
    <!-- /.col -->
  </div>
  <!-- /.row -->
</div>
@endsection

@section('scripts')
<!-- DataTables  & Plugins -->
<script src={{ asset('plugins/datatables/jquery.dataTables.min.js')}}></script>
<script src={{ asset('plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}></script>
<script src={{ asset('plugins/datatables-responsive/js/dataTables.responsive.min.js')}}></script>
<script src={{ asset('plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}></script>
<script src={{ asset('plugins/datatables-buttons/js/dataTables.buttons.min.js')}}></script>
<script src={{ asset('plugins/datatables-buttons/js/buttons.bootstrap4.min.js')}}></script>
<script src={{ asset('plugins/jszip/jszip.min.js')}}></script>
<script src={{ asset('plugins/pdfmake/pdfmake.min.js')}}></script>
<script src={{ asset('plugins/pdfmake/vfs_fonts.js')}}></script>
<script src={{ asset('plugins/datatables-buttons/js/buttons.html5.min.js')}}></script>
<script src={{ asset('plugins/datatables-buttons/js/buttons.print.min.js')}}></script>
<script src={{ asset('plugins/datatables-buttons/js/buttons.colVis.min.js')}}></script>
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
        'targets': [3], /* column index */
        'orderable': false, /* true or false */
        
     }]
      });
    });
</script>
@endsection