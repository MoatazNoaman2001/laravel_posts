<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7" crossorigin="anonymous">
    <title>Posts</title>
</head>
<body>

    <table class="table">
        <thead >
            <th>id</th>

            <th>title</th>

            <th>desc</th>

            <th>content</th>
        </thead>

        <tbody>
            @foreach ($posts as $post)
                <tr>
                    <td>{{$post['id']}}</td>
                    <td>{{$post['title']}}</td>
                    <td>{{$post['description']}}</td>
                    <td>{{$post['content']}}</td>
                    <td>
                        <form action="{{ route('post.edit', $post['id']) }}" method="GET">
                            @csrf
                            @method('GET')    
                            <button type="submit" class="btn btn-primary">update</button>
                        </form>
                        <br/>
                        <form action="{{ route('post.delete', $post['id']) }}" method="POST" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" 
                                    onclick="return confirm('Are you sure you want to delete this post?')">
                                Delete
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
     
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
