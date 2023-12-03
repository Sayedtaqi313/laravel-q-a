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
                        <div class="col-md-3">Ask Questions</div>
                        <div class="col-md-3 ms-auto">
                            <a  class="btn btn-success" href="{{ route('questions.index') }}">All Questions</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <form action="{{ route('questions.store') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="title">Title:</label>
                            <input type="text" name="title" class="form-control" value="{{ old('title') }}">
                            @error('title')
                            <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="body">Ask your question:</label>
                            <textarea rows="10" class="form-control" name="body" value="{{ old('body') }}">
                            </textarea>
                            @error('body')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
