<x-site-layout>

    <h1 class="text-4xl font-bold">{{$article->title}}</h1>

    <div class="mb-2 text-blue-800">by our reporter: {{$article->author->name}}</div>


    <div>
        {{$article->content}}
    </div>

</x-site-layout>
