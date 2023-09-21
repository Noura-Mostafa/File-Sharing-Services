<x-main-layout :title="__('Files')">

<div class="container p-5 w-75 rounded m-auto bg-light">
    <h4 class="text-primary">Downloded Files</h4>
    <hr class="my-4">
    @forelse($files as $file)
    <div class="details p-2 border mt-2">
        <div class="content">
            <p class="text-secondary"><strong class="text-primary">File Name: </strong>{{ $file->title }}</p>
            <p class="text-secondary"><strong class="text-primary">Message: </strong>{{ $file->message }}</p>
        </div>
        <div class="actions d-flex justify-content-end">
            <a class="btn btn-sm btn-primary me-1" type="button" href="{{route('files.download' , $file->unique_link)}}">Download</a>
            <form action="{{route('files.destroy' , $file->id)}}" method="post">
                @csrf
                @method('delete')
                <button class="btn btn-sm btn-danger me-1" type="submit">Delete</button>

            </form>
            <a class="btn btn-sm btn-dark" type="button" href="{{route('files.fileInfo' , $file->id)}}">Show</a>
        </div>

    </div>
    @empty
    <p>No file downloded yet!</p>
    @endforelse
</div>
</div>

</x-main-layout>