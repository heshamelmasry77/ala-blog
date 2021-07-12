<html>
<head>
    <title>My Blog</title>
    <link rel="stylesheet" href="/app.css"/>
</head>
<body>
@foreach ($posts as $post)
    {{--    @dd($loop)--}}
    <article class="{{$loop->even ? 'mb-6':''}}">
        <a href="/posts/{{$post->slug}}">
            <h1>{{$post->title}}</h1>
        </a>
        <div>
            {!!$post->body!!}
        </div>
    </article>
@endforeach
</body>
</html>
