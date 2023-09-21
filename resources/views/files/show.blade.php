<x-main-layout :title="__('Files')">

<div class="container p-5 w-75 rounded m-auto bg-light">
    <h4 class="text-primary">Files Download Log</h4>
    <hr class="my-4">
    <div class="details p-2 border mt-2">
        <div class="content">
            <h6 class="mb-4"><strong class="text-primary">File: </strong>{{ $file->title }}</h6>
            <h6 class="mb-4"><strong class="text-primary">Download Count: </strong>{{ $file->download_count }}</h6>
        </div>

        @forelse($file->downloads as $download)
        <div class="info">
           <p class="mb-4"><strong class="text-primary">User Agent: </strong>{{$download->user_agent}}</p>
           <p class="mb-4"><strong class="text-primary">Counry Name: </strong>{{$download->country_name}}</p>
           <p class="mb-4"><strong class="text-primary">Country Code: </strong>{{$download->country_code}}</p>
           <p class="mb-4"><strong class="text-primary">Ip: </strong>{{$download->ip}}</p>
        </div>

        @empty
        <p>Not download Yet</p>
        @endforelse


    </div>
</div>
</div>

</x-main-layout>