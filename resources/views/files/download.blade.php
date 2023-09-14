<x-main-layout :title="__('Download')">

<div class="container p-5 w-50 m-auto rounded bg-light text-center">

  <h4 class="text-primary">Ready when you are</h4>
  <h6 class="text-secondary">Transfer expire in 7 days</h6>
  <p>{{$file->title}}</p>
  <hr class="my-4 w-50 m-auto">
  <a class="w-50 mb-2 btn rounded btn-primary" href="{{route('files.download' , $file->unique_link)}}" type="submit">
    Download</a>

  <hr class="my-4 w-50 m-auto">
  <div class="details mt-2 w-50 m-auto">
    <h4 class="mb-3">File Details :</h4>
    @if($file)
    <p class="text-secondary text-start"><strong>File Name: </strong>{{ $file->title }}</p>
    <p class="text-secondary text-start"><strong>Message: </strong>{{ $file->message }}</p>
    @endif
  </div>
  <a class="w-50 mb-2" href="{{route('files.index')}}" type="submit">give it another try?</a>

</div>
</x-main-layout>