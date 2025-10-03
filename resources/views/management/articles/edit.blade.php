<x-site-layout>

    <form action="/management/articles/{{$article->id}}" method="post">

        @method('PUT')
        @csrf

        <div>
            <label for="title">Title</label><br/>
            <input type="text" name="title" class="bg-gray-200 p-2" value="{{old('title',$article->title)}}"><br/>
            @error('title')
            <p class="text-red-500 text-xs mt-1">{{$message}}</p>
            @enderror
        </div>

        <div>
            <label for="content">Content</label><br/>
            <textarea name="content" class="bg-gray-200 p-2 w-1/2">{{old('content', $article->content)}}</textarea><br/>
            @error('content')
                <p class="text-red-500 text-xs mt-1">{{$message}}</p>
            @enderror
        </div>

        <br/><br/>
        <button class="bg-blue-500 p-1 uppercase" type="submit">Update</button>
    </form>


</x-site-layout>
