<x-site-layout>

    <h1 class="text-4xl font-bold">{{$article->title}}</h1>
    <a href="/articles/{{$article->id}}/edit" class="underline">EDIT</a>

    <div class="mb-2 text-blue-800">by our reporter: {{$article->author->name}}</div>


    <div>
        {{$article->content}}
    </div>

    <h2 class="text-2xl font-bold mt-4">Comments</h2>
    <div>
        @foreach($article->comments as $comment)
            <div>
                {{$comment->content}}
            </div>
        @endforeach
    </div>

</x-site-layout>
