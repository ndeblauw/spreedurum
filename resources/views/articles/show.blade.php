<x-site-layout>

    <h1 class="text-4xl font-bold">{{$article->title}}</h1>

    @if(session()->has('specialMessage'))
        <div class="bg-green-50 p-2 border border-green-500 text-500">
            {{ session()->get('specialMessage') }}
        </div>
    @endif

    @auth
        @if($article->canEditOrDelete(auth()->user()))
            <a href="/management/articles/{{$article->id}}/edit" class="underline">EDIT</a>

            <form action="/management/articles/{{$article->id}}" method="post">
                @method('DELETE')
                @csrf
                <button  class="underline">DELETE</button>
            </form>
        @else
            <span class="text-xs">If something is wrong.....</span>
        @endif
    @endauth


    <div class="mb-2 text-blue-800">by our reporter: {{$article->author->name}}.</div>
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

        @auth
        <form action="/comments" method="post" class="bg-gray-200 p-4">
            @csrf

            <input type="hidden" name="article_id" value="{{$article->id}}"/>
            <div>
                <label for="content">new comment</label><br/>
                <textarea name="content" class="bg-gray-50 p-2 w-1/2">{{old('content')}}</textarea><br/>
                @error('content')
                <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                @enderror
            </div>

            <br/><br/>
            <button class="bg-blue-500 p-1 uppercase" type="submit">Put comment</button>
        </form>
        @endauth

    </div>

</x-site-layout>
