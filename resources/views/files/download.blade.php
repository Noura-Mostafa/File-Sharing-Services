@extends('layouts.master')
@section('title' , 'Download')
@section('content')

<div class="modal-body p-5 w-25 m-auto mt-5 rounded bg-light text-center">

  <h2 class="text-primary">Ready when you are</h2>
  <p class="text-secondary">Transfer expire in 7 days</p>
  <p class="fs-6">{{$file->title}}</p>
    <hr class="my-4">
    <a class="w-100 mb-2 btn btn-lg rounded btn-primary" href="{{route('files.download' , $file->unique_link)}}" type="submit">
    Download</a>

    <hr class="my-4">
    <div class="details mt-2 text-start ">
      <h2>File Details</h2>
      @if($file)
      <p class="text-secondary"><strong class="text-primary">File Name: </strong>{{ $file->title }}</p>
      <p class="text-secondary"><strong class="text-primary">Message: </strong>{{ $file->message }}</p>
      @endif
    </div>
    <a class="w-100 mb-2 btn rounded btn-outline-primary" href="{{route('files.index')}}" type="submit">give it another try</a>
</div>

@endsection