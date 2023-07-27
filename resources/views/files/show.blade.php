@extends('layouts.master')
@section('title' , 'Success')
@section('content')

<div class="container p-5 vh-100 m-auto rounded bg-light text-center">
  <h2 class="text-primary"> You're Done !</h2>
  <p class="text-secondary">Copy your download link and share it with others</p>
  <div class="border m-auto rounded mt-3 p-2 mb-2 overflow-scroll">
    <a class="text-secondary" href="{{$fileLink}}">{{$fileLink}}</a>
  </div>
  <strong>Test the Link : </strong>
  <a href="{{route('files.downloadPage' , $file->id)}}" class="text-primary">downloadPage/{{$file->id}}</a>
  <hr class="my-4 w-50 m-auto">
  <a class="mb-2 w-50 btn btn-lg rounded btn-primary" href="{{route('files.index')}}" type="submit">send More ?</a>
  <hr class="my-4 w-50 m-auto">
  <div class="details mt-2">
    <h2 class="mb-2">File Details</h2>
    @if($file)
    <p class="text-secondary"><strong class="text-primary">File Name: </strong>{{ $file->title }}</p>
    <p class="text-secondary"><strong class="text-primary">Message: </strong>{{ $file->message }}</p>
    @endif
  </div>
</div>

@endsection