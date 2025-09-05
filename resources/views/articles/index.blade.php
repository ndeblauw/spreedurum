<x-site-layout>

            <h1 class="text-4xl font-bold">Articles overview</h1>

            @foreach($articles as $article)
                <div>
                    <a href="/articles/{{$article->id}}">{{ $article->title }}</a>
                </div>
            @endforeach

</x-site-layout>
