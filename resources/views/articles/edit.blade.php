<x-site-layout>

    <form action="/articles/{{$article->id}}" method="post">

        @method('PUT')
        @csrf

        <div>
            <label for="title">Title</label><br/>
            <input type="text" name="title" class="bg-gray-200 p-2" value="{{$article->title}}">
        </div>

        <div>
            <label for="content">Content</label><br/>
            <textarea name="content" class="bg-gray-200 p-2 w-1/2">{{$article->content}}</textarea>
        </div>

        <br/><br/>
        <button class="bg-blue-500 p-1 uppercase" type="submit">Update</button>
    </form>


</x-site-layout>
