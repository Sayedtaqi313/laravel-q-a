@extends('layouts.app')
@section('content')
@section('css')
<link rel="stylesheet" href="{{ asset('bootstrap/css/bootstrap.css') }}">
@endsection
<div class="container">
    @if (session('success'))
    <div class="alert alert-success alert-dismissible show" role="alert">
        <strong>Success:</strong> {{ session('success') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
    @endif
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-3">All Questions</div>
                        <div class="col-md-3 ms-auto">
                            <a  class="btn btn-success" href="{{ route('questions.create') }}">Ask question</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    @foreach ($questions as $question)
                    <div class="row">
                        <div class="col-md-2 counter">
                            <div class="vote">
                                <strong>{{ $question->votes }}</strong>
                                {{ Str::plural('vote',$question->votes) }}
                            </div>
                            <div class="status {{ $question->status }}">
                                <strong>{{ $question->answers }}</strong>
                                {{ Str::plural('answer', $question->answers) }}
                            </div>
                            <div class="view">
                                <strong>{{ $question->views }}</strong>
                                {{ Str::plural('view',$question->views) }}
                            </div>
                        </div>
                        <div class="col-md-8">
                            <h3>
                               <a class="title" href="{{ $question->url }}"> {{ $question->title }}</a><br>
                               Asked By <strong>{{ $question->user->name }}</strong>
                               <small class="text-muted">{{ $question->custome_time }}</small>
                            </h3>
                            <p>
                                {{ Str::limit($question->body, 200, '...') }}
                            </p>
                        </div>
                        <div class="col-md-2 ">
                            @can('update',$question)
                            <a class="btn btn-primary " href="{{ route('questions.edit',$question->id) }}">edit</a>
                            @endcan
                            @can('delete',$question)
                            <form class="inline" action="{{ route('questions.delete',$question->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger" type="submit" onclick="return confirm('are you sure want to delete')">delete</button>
                            </form>
                            @endcan
                        </div>
                    </div>
                    <hr>
                    @endforeach
                    {{ $questions->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
