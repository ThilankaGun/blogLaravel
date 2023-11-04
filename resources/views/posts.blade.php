<x-layout>
    @foreach ($posts as $post)
        <!--using "@" is a blade directives, instead using < ? php.... ?>-->
        <article>
            <h1>
                <a href="/posts/{{$post->id}} ">
                    {{$post->title}}
                </a>
            </h1>

            <div>
                {{ $post->excerpt}}
            </div>


        </article>
    @endforeach

</x-layout>


