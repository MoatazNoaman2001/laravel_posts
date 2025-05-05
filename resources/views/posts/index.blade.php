<x-app-layout>
    <x-layout>
        <x-slot:title>List All Posts</x-slot>
            <h1 class="mb-3 mt-5 text-primary text-center">Posts</h1>
            <div class="container mt-5 d-flex justify-content-center">
                <div class="col-md-10 col-lg-12">
                    <!-- <a href="{{ route('posts.create') }}" class="btn btn-primary mb-3">Add</a> -->

                    <table class="table table-hover">
                        <thead>

                            <tr>
                                <th>ID</th>
                                <th>Title</th>
                                <th>Body</th>
                                <th>Author</th>
                                <th>Created at</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($posts as $post)
                                <tr>
                                    <td>{{$post->id}}</td>
                                    <td>{{$post->title}}</td>
                                    <td>{{$post->body}}</td>
                                    <td>{{$post->user->name ?? '' }}</td>
                                    <td>{{$post->created_at}}</td>
                                    <td>
                                        <a href="{{ route('posts.show', $post->id) }}" class="btn btn-info btn-sm">Show</a>
                                    </td>
                                    <td>
                                        <a href="{{ route('posts.edit', $post->id) }}"
                                            class="btn btn-warning btn-sm">Edit</a>
                                    <td>
                                        <form action="{{ route('posts.destroy', $post->id) }}" method="POST"
                                            class="d-inline" onsubmit="return confirm('Are you sure?')">
                                            @method('delete')
                                            @csrf
                                            <input type="submit" value="Delete" class="btn btn-danger btn-sm">
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
    </x-layout>
</x-app-layout>