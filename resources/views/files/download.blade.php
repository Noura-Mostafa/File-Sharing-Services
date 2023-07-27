@extends('layouts.master')
@section('title' , 'Download')
@section('content')

<div class="container p-5 vh-100 m-auto rounded bg-light text-center">

  <h2 class="text-primary">Ready when you are</h2>
  <p class="text-secondary">Transfer expire in 7 days</p>
  <p class="fs-6">{{$file->title}}</p>
  <hr class="my-4 w-50 m-auto">
  <a class="w-50 mb-2 btn btn-lg rounded btn-primary" href="{{route('files.download' , $file->unique_link)}}" type="submit">
    Download</a>

  <hr class="my-4 w-50 m-auto">
  <div class="details mt-2">
    <h2>File Details</h2>
    @if($file)
    <p class="text-secondary"><strong class="text-primary">File Name: </strong>{{ $file->title }}</p>
    <p class="text-secondary"><strong class="text-primary">Message: </strong>{{ $file->message }}</p>
    @endif
  </div>
  <a class="w-50 mb-2 btn rounded btn-outline-primary" href="{{route('files.index')}}" type="submit">give it another try</a>

</div>

@endsection