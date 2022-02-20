@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center mb-3">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Online Counsellor Platform') }}</div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif

                    {{ __('Search Counsellors ') }}
                    <form action="{{ route('search') }}" method="POST" class="form">
                        @csrf
                        <div class="input-group">
                            <input type="text" name="search" id="" class="form-control"
                                placeholder="Name Or Profession">
                            <input type="submit" class="form-control" value="Search">
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Questions</div>
                <div class="card-body">
                    <form action="{{ route('answerQuestions') }}" method="POST" class="form">
                        @csrf
                        @foreach ($questions as $question)
                        <div class="form-group">
                            <label for="">{{ $question->description }}</label>
                            <input type="text" class="form-control" name="{{ $question->title }}">
                            <br>
                        </div>


                        @endforeach
                        <input type="submit" name="" id="" class="btn btn-info">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection