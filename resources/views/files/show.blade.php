@extends('layouts.master')
@section('title' , 'Success')
@section('content')

<div class="modal-body p-5 w-50 m-auto mt-5 rounded bg-light text-center">

  <h2 class="text-primary"> You're Done !</h2>
  <p class="text-secondary">Copy your download link</p>
  <div class="border rounded mt-3 p-2 mb-2">
  <a class="text-secondary" href="{{$fileLink}}">{{$fileLink}}</a>
  </div>
  <strong>Test the Link : </strong>
  <a href="{{route('files.downloadPage' , $file->id)}}" class="text-primary">downloadPage/{{$file->id}}</a>
    <hr class="my-4">
    <a class="w-100 mb-2 btn btn-lg rounded btn-primary" href="{{route('files.index')}}" type="submit">send More ?</a>
    <hr class="my-4">
    <div class="details mt-2 text-start ">
      <h2>File Details</h2>
      @if($file)
      <p class="text-secondary"><strong class="text-primary">File Name: </strong>{{ $file->title }}</p>
      <p class="text-secondary"><strong class="text-primary">Message: </strong>{{ $file->message }}</p>
      @endif
    </div>
</div>

@endsection