@extends('layouts.master')
@section('title' , 'Download')
@section('content')

<div class="container p-5 vh-100 m-auto bg-light">
    <h2 class="text-primary">Downloded Files</h2>
    <hr class="my-4">
    @foreach($files as $file)
    <div class="details p-2 border mt-2 d-flex justify-content-between">
        <div class="content d-flex justify-content-around">
            <p class="text-secondary me-3"><strong class="text-primary">File Name: </strong>{{ $file->title }} |</p>
            <p class="text-secondary"><strong class="text-primary">Message: </strong>{{ $file->message }}</p>
        </div>
        <div class="actions d-flex">
            <a class="btn btn-outline-primary" type="button" href="{{route('files.download' , $file->unique_link)}}">Download</a>
            <form action="{{route('files.destroy' , $file->id)}}" method="post">
                @csrf
                @method('delete')
                <button class="btn btn-outline-danger" type="submit">Delete</button>

            </form>
            <a class="btn btn-info" type="button" href="{{route('files.show' , $file->id)}}">Show</a>
        </div>

    </div>
    @endforeach
</div>
</div>

@endsection