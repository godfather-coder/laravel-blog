<x-app-layout>
    <x-slot name="header">
        <div class="header-wraaper">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Posts
            </h2>
            <a href="{{ route('post.create') }}" class="create-btn">Create Post</a>
        </div>
    </x-slot>

    <div class="post-show">
        <div class="post-header">
            <h1 class="postname">{{ $post->name }}</h1>
            <h1 class="postname">{{ $post->user->name }}</h1>
        </div>
        <div>
            <h2 class="post-desc">{{ $post->description }}</h2>
            <p class="post-text">{{ $post->text }}</p>
        </div>
    </div>

    <form class="input"  action="{{route('comment.store',['post'=>$post]) }}" method="POST">
        @csrf

        <textarea class="text-area" name="comment" id="comment"></textarea>
        <button class="edit-btn" type="submit">Comment</button>

    </form>

    <div class="comment">
        <div class="list">
            @foreach($comments as $comment)
                <div class="comment-list">
                    <h1 id="{{ $comment->id }}">{{ $comment->text }}</h1>
                    <form method="post" action="{{route('comment.update',['comments'=>$comment->id])}}" style="display: none" enctype="multipart/form-data" id="{{$comment->id.'inp'}}">
                        @csrf
                        @method('PATCH')
                        <input value="{{$comment->text}}" name="text"  type="text">
                        <button class="create-btn" type="submit">Save</button>
                    </form>
                    <input value="{{$comment->text}}" style="display: none" id="{{$comment->id.'edit'}}" type="text">
                    <p>{{ $comment->user->name }}</p>
                    @if($comment->user_id == auth()->id())
                        <div class="comment-action">
                        <a href="#" onclick="edit('{{$comment->id}}')" class="edit-btn-comment" id="{{$comment->id.'edit'}}">Edit</a>
                            <form id="{{ $comment->id.'delete' }}" action="{{route('comment.delete',['comments'=>$comment->id]) }}" method="post">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class='delete-btn'>Delete</button>
                            </form>
                        </div>
                    @else
                        <div class="empty"> </div>
                    @endif
                </div>
            @endforeach
        </div>
    </div>
    <script>
        let index = false;

        function edit(id) {

            if (index){
                document.getElementById(id).style.display='none';
                document.getElementById(id+'inp').style.display='flex';
                document.getElementById(id+'delete').style.display='none';


                index=!index;
            }
            else {
                document.getElementById(id+'inp').style.display='none';
                document.getElementById(id).style.display='flex';
                document.getElementById(id+'delete').style.display='flex';


                index=!index;
            }
         }
    </script>
</x-app-layout>
