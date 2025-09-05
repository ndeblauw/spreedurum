<x-site-layout>
    <h1 class="text-4xl font-bold">{{$author->name}}</h1>

    <h2 class="text-2xl font-bold">List of articles</h2>

    @foreach($author->articles as $article)
        {{ $article->title }}<br/>
    @endforeach
</x-site-layout>
