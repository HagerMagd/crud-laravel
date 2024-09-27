<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    
</head>
<body>
<h1>edit posts</h1>

<form action="{{route('posts.update',$post->id)}}" method="post">
    @method('PATCH')
    @csrf
    
    <input type="text" name="title"value ="{{$post->title}}">
    <input type="text" name="body"value ="{{$post->body}}">
    <input type="submit" value="edit">
</form>
</body>
</html>