<x-main-layout :title="__('we-transfer')">

@if ($errors->any())
  <div class="alert alert-danger w-50 m-auto p-2 mb-3">
    <ul>
      @foreach ($errors->all() as $error)
      <li>{{ $error }}</li>
      @endforeach
    </ul>
  </div>
  @endif

  <div class="container p-5 w-50 m-auto rounded bg-light text-center">


    <h4 class="text-center">Upload your File and share a link!</h4>
    <hr class="my-4">
    <form class="" action="{{route('files.store')}}" method="post" enctype="multipart/form-data">
      @csrf
      <div class="mb-3">
        <input type="file" name="files[]" multiple id="file" onchange="updateNameInput()" @class(['form-control' , 'is-invalid'=> $errors->has('file')])>
        @error('file')
        <div class="invalid-feedback">{{$message}}</div>
        @endError
      </div>
      <div class="mb-3">
        <input type="text" name="title" id="title" @class(['form-control' , 'is-invalid'=> $errors->has('title')]) placeholder="Title">
        @error('title')
        <div class="invalid-feedback">{{$message}}</div>
        @endError
      </div>
      <div class="mb-3">
        <input type="text" name="message" @class(['form-control' , 'is-invalid'=> $errors->has('message')]) id="message" placeholder="Message">
        @error('message')
        <div class="invalid-feedback">{{$message}}</div>
        @endError
      </div>
      <button class="w-50 mb-2 btn rounded btn-primary" type="submit">Get a Link!</button>
    </form>
  </div>

</x-main-layout>