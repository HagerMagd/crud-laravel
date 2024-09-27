<h1>create posts</h1>

<form action="{{route('posts.store')}}" method="post">
    @csrf
    <input type="text" name="title" placeholder="title">
    <input type="text" name="body" placeholder="body">
    <input type="submit" value=" create">
</form>
