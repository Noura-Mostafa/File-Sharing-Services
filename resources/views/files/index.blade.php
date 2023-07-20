@extends('layouts.master')
@section('title' , 'weTransfer')
@section('content')


<div class="modal-body p-5 w-25 m-auto mt-5 rounded bg-light">
  <h2 class="text-primary text-center">Upload your File and share a link!</h2>
  <hr class="my-4">
  <form class="" action="{{route('files.store')}}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="form-floating mb-3">
      <input type="file" name="file" @class(['form-control' , 'is-invalid'=> $errors->has('file')]) id="file">
      <label for="file">Upload A File</label>
      @error('file')
      <div class="invalid-feedback">{{$message}}</div>
      @endError
    </div>
    <div class="form-floating mb-3">
      <input type="text" name="title" @class(['form-control' , 'is-invalid'=> $errors->has('title')]) id="Tile" placeholder="Title">
      <label for="title">Title</label>
      @error('title')
      <div class="invalid-feedback">{{$message}}</div>
      @endError
    </div>
    <div class="form-floating mb-3">
      <input type="text" name="message" @class(['form-control' , 'is-invalid'=> $errors->has('message')]) id="message" placeholder="Message">
      <label for="message">Message</label>
      @error('message')
      <div class="invalid-feedback">{{$message}}</div>
      @endError
    </div>
    <hr class="my-4">
    <button class="w-100 mb-2 btn btn-lg rounded btn-primary" type="submit">Get a Link!</button>
  </form>
</div>


@endsection