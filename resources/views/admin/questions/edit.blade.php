@extends('layouts.master')


@section('breadcumb')
<div class=" container-fluid">
  <div class="row mb-2">
    <div class="col-sm-6">
      <ol class="breadcrumb float-sm-left">
        <li class="breadcrumb-item"><a href="#">Home</a></li>
        <li class="breadcrumb-item "><a href="{{ route('admin.questions.index') }}">Questions</a></li>
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
          <h3 class="card-title">Questions Edit</h3>
        </div>
        <div class="card-body">
          <form action="{{ route('admin.questions.update',$question->id) }}" method="POST" class="form">
            @csrf
            @method('PUT')
            <label for="questions">Edit Question</label>
            <input type="text" name="title" class="form-control mb-3" placeholder="question title"
              value="{{ old('title',$question->title) }}">
            @error('title')
            <p class="text-danger">{{$errors->first('title')}}</p>
            @enderror
            <input type="text" name="description" class="form-control mb-3" placeholder="question description"
              value="{{ old('description',$question->description) }} ">
            @error('description')
            <p class="text-danger">{{$errors->first('description')}}</p>
            @enderror
            <input type="submit" class="btn btn-info mb-3">
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection