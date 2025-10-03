<x-site-layout>

    <h1 class="text-4xl font-bold">My Articles overview</h1>

    <x:message-block />

    @foreach($articles as $article)
        <div>
            <a href="managament/articles/{{$article->id}}">{{ $article->title }}</a>
            <a href="/management/articles/{{$article->id}}/edit" class="underline p-2 bg-blue-100 text-blue-500 text-sm rounded">EDIT</a>
        </div>
    @endforeach

</x-site-layout>
