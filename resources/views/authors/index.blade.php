<x-site-layout>
    <ul class="list-disc pl-4">
        @foreach($authors as $author)
            <li>{{$author->name}}</li>
        @endforeach

    </ul>
</x-site-layout>
