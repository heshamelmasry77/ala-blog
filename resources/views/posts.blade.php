@extends('layout')
@section('banner')
    <h1>My Blog</h1>
@endsection
@section('content')
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
@endsection
