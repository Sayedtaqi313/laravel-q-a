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
                        <div class="col-md-9">
                           <h2> {{ $question->title }} </h2>
                        </div>
                        <div class="col-md-3 ">
                            <a  class="btn btn-success" href="{{ route('questions.index') }}">All Questions</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                  <h4>  {{ $question->body }} </h4>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
