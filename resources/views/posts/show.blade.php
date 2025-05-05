<x-app-layout>
    <x-layout>
        <h3 class="mb-3 mt-5 text-primary text-center">{{$post->title}}</h3>
        <div class="container mt-5 d-flex justify-content-center">
            <div class="col-md-10 col-lg-12">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Title</th>
                            <th>Body</th>
                            <th>Author</th>
                            <th>Date</th>
                            <th>Image</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th>{{$post->id}}</th>
                            <th>{{$post->title}}</th>
                            <th>{{$post->body}}</th>
                            <td>{{ $post->user->name ?? ""}}</td>
                            <th>{{$post->created_at}}</th>
                            <td>
                                @if ($post->image)
                                    <img src="{{ asset('storage/images/' . $post->image) }}" alt="Post Image" width="200">
                                @endif
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </x-layout>
</x-app-layout>