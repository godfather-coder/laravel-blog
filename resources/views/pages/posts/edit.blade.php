<x-app-layout>
    <x-slot name="header">
        <div class="header-wraaper">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Create Post
            </h2>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="card">
                <form action="{{ route('post.update',['post'=>$post->id]) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="input-wrapper">
                        <label for="name">Name</label>
                        <input type="text" name="name" value="{{ $post->name }}" id="name" enctype="multipart/form-data">
                    </div>
                    <div class="input-wrapper">
                        <label for="description">Description</label>
                        <textarea  name="description" id="description">{{$post->description}}</textarea>
                    </div>
                    <div class="input-wrapper">
                        <label for="text">Text</label>
                        <textarea name="text" id="text">{{ $post->text }}</textarea>
                    </div>
                    <button class="create-btn" type="submit">Update</button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
