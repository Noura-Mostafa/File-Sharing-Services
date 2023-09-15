<x-main-layout :title="__('we-transfer')">


<div class="container p-5 w-50 m-auto rounded bg-light text-center">
  <h4 class="text-center">Upload your File and share a link!</h4>
  <hr class="my-4">
  <form class="" action="{{route('files.store')}}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="form-floating mb-3">
      <input type="file" name="file" id="file" @class(['form-control' , 'is-invalid'=> $errors->has('file')])>
      @error('file')
      <div class="invalid-feedback">{{$message}}</div>
      @endError
    </div>
    <div class="form-floating mb-3">
      <input type="text" name="title" id="title" @class(['form-control' , 'is-invalid'=> $errors->has('title')]) placeholder="Title">
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
    <button class="w-50 mb-2 btn rounded btn-primary" type="submit">Get a Link!</button>
  </form>
</div>

</x-main-layout>