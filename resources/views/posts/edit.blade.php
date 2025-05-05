<x-app-layout>
    <x-layout>
        <div class="container mt-5 d-flex justify-content-center">
            <div class="col-md-8 col-lg-6">

                <form action="/posts/{{$post->id}}" method="post" class="p-4 border rounded-4 shadow-sm bg-light"
                    enctype="multipart/form-data">
                    @method('put')
                    @csrf

                    <h3 class="mb-4 text-primary text-center">Edit Post</h3>

                    <div class="mb-3">
                        <label for="title" class="form-label">Title</label>
                        <input type="text" name="title" placeholder="Title" class="form-control"
                            value="{{$post->title}} "><br>
                    </div>
                    <div class="mb-3">
                        <label for="body" class="form-label">Body</label>
                        <input type="text" name="body" placeholder="Body" class="form-control"
                            value="{{$post->body}}"><br>
                    </div>
                    <div class="mb-3">
                        <label for="user_id" class="form-label">User ID</label>
                        <input type="text" name="user_id" placeholder="User ID" class="form-control"
                            value="{{ $post->user_id }}">
                    </div>
                    <div class="mb-3">
                        <label for="image" class="form-label">Upload Image</label>
                        <input type="file" name="image" id="image" class="form-control">
                        @if($post->image)
                            <small class="text-muted">Current: {{ $post->image }}</small>
                        @endif
                    </div>

                    <input type="submit" value="Update" class="btn btn-success w-100">
                    <a href="{{ route('posts.index') }}" class="btn btn-outline-secondary w-100 mt-2">Cancel</a>

                </form>

    </x-layout>
</x-app-layout>