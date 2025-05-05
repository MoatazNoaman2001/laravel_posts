<x-app-layout>
    <x-layout>
        <x-slot:title>Add Post</x-slot>

            <div class="container mt-5 d-flex justify-content-center">
                <div class="col-md-8 col-lg-6">

                    <form action="/posts/" method="post" class="p-4 border rounded-4 shadow-sm bg-light"
                        enctype="multipart/form-data">
                        @csrf
                        <h3 class="mb-4 text-primary text-center">Create Post</h3>

                        <div class="mb-3">
                            <label for="title" class="form-label">Title</label>
                            <input type="text" name="title" placeholder="Title" class="form-control"><br>
                        </div>
                        <div class="mb-3">
                            <label for="body" class="form-label">Body</label>
                            <input type="text" name="body" placeholder="Body" class="form-control"><br>
                        </div>
                        <!-- <div class="mb-3">
                            <label for="user_id" class="form-label">User ID</label>
                            <input type="text" name="user_id" placeholder="User ID" class="form-control">
                        </div> -->
                        <div class="mb-3">
                            <label for="image" class="form-label">Upload Image</label>
                            <input type="file" name="image" id="image" class="form-control">

                        </div>

                        <input type="submit" value="Store" class="btn btn-success w-100">
                        <a href="{{ route('posts.index') }}" class="btn btn-outline-secondary w-100 mt-2">Cancel</a>

                    </form>

                </div>
            </div>



            <ul>
                @foreach ($errors->all() as $error)
                    <li class="mt-3 text-danger">
                        {{ $error }}
                    </li>

                @endforeach
            </ul>

    </x-layout>
</x-app-layout>