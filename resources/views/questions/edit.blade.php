@extends('layouts.app')
@section('content')
@section('css')
<link rel="stylesheet" href="{{ asset('bootstrap/css/bootstrap.css') }}">
@endsection
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-3">Edit Questions</div>
                        <div class="col-md-3 ms-auto">
                            <a  class="btn btn-success" href="{{ route('questions.index') }}">All Questions</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <form action="{{ route('questions.update',$question->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="title">Title:</label>
                            <input type="text" name="title" class="form-control" value="{{ $question->title }}">
                            @error('title')
                            <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="body">Ask your question:</label>
                            <textarea rows="10" class="form-control" name="body">
                                {{ $question->body }}
                            </textarea>
                            @error('body')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
