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
                <form action="{{ route('post.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="input-wrapper">
                        <label for="name">Name</label>
                        <input type="text" name="name" id="name">
                    </div>
                    <div class="input-wrapper">
                        <label for="description">Description</label>
                        <textarea name="description" id="description"></textarea>
                    </div>
                    <div class="input-wrapper">
                        <label for="text">Text</label>
                        <textarea name="text" id="text"></textarea>
                    </div>
                    <button class="create-btn" type="submit">Create</button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
