<html>
    <header>
        <title>Articles overview</title>
        <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    </header>
    <body class="">
        <header class="max-w-6xl mx-auto bg-blue-500 text-xl text-white mb-4 flex items-center h-12">
            <div class="mr-10">
                SpreeDURUM!
            </div>
            <div>
                Navigation comes here
            </div>
        </header>

        <main class="max-w-6xl mx-auto px-4 py-4">
            <h1 class="text-4xl font-bold">Articles overview</h1>

            @foreach($articles as $article)
                <div>
                    <a href="/articles/{{$article->id}}">{{ $article->title }}</a>
                </div>
            @endforeach

        </main>

        <footer class="bg-blue-900 text-white mt-12 min-h-20">

            <div class="max-w-6xl mx-auto px-20 py-4">
                Footer content
            </div>
        </footer>
    </body>

</html>
