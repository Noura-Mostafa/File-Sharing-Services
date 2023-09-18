<x-main-layout :title="__('Success')">

  <div class="container w-50 p-5 m-auto rounded bg-light text-center">
    <h3 class="text-primary"> You're Done !</h3>
    <h6 class="text-secondary mt-3">Copy your download link and share it with others</h6>
    <div class="border rounded p-2 d-flex w-50 m-auto mt-4 justify-content-around">
      <h6 class="mt-2 text-start">Your Download Link : </h6>
      <span id="textToCopy" style="display: none;"> {{$fileLink}}</span>
      <button onclick="copyText()" class="btn btn-primary"><i class="fas fa-copy"></i></button>
    </div>
    <hr class="my-4 w-50 m-auto">
    <a class="mb-2 w-50 m-auto text-center btn btn-primary" href="{{route('files.index')}}" type="submit">send More ?</a>
    <hr class="my-4 w-50 m-auto">
    <div class="details mt-2 w-50 m-auto">
      <h4 class="mb-3">File Details :</h4>
      @if($file)
      <p class="text-secondary text-start"><strong>File Name: </strong>{{ $file->title }}</p>
      <p class="text-secondary text-start"><strong>Message: </strong>{{ $file->message }}</p>
      @endif
    </div>

    <div class="social mt-4">
      <a href="{{ $whatsappShareUrl }}" target="_blank" rel="noopener noreferrer" class="me-4 text-decoration-none">
        <i class="fab fa-whatsapp"></i> Share on WhatsApp
      </a>
      <a href="{{ $mailtoLink }}" class="text-decoration-none">
        <i class="fas fa-envelope"></i> Share via Email
      </a>
    </div>
  </div>

</x-main-layout>