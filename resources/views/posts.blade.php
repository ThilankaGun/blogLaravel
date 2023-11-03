@extends('layout')

@section('content')
    @foreach ($posts as $post)                      <!--using "@" is a blade directives, instead using < ? php.... ?>-->
        <article>
            <h1>
                <a href="/posts/{{$post->slug}} ">
                    {{$post->title}}
                </a>
            </h1>

            <div>
                {{ $post->excerpt}}
            </div>


        </article>
    @endforeach
@endsection

