<x-site-layout>


    <form action="/articles" method="post">

        @csrf

        <div>
            <label for="title"> Title</label><br/>
            <input type="text" name="title" class="bg-gray-200 p-2">
            @error('title')
            <p class="text-red-500 text-xs mt-1">{{$message}}</p>
            @enderror
        </div>

        <div>
            <label for="content">Content</label><br/>
            <textarea name="content" class="bg-gray-200 p-2"></textarea>
            @error('content')
            <p class="text-red-500 text-xs mt-1">{{$message}}</p>
            @enderror
        </div>

        <br/><br/>
        <button class="bg-blue-500 p-1 uppercase" type="submit">Create</button>
    </form>


</x-site-layout>
