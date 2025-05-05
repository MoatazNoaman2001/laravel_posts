<form action="/posts/{{$post->id}}", method='post'>
    @method('delete')
    @csrf  
    <input type="submit" value=""Delete>
</form>