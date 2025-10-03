@if(session()->has('specialMessage'))
    <div class="bg-green-50 p-2 border border-green-500 text-500">
        {{ session()->get('specialMessage') }}
    </div>
@endif
