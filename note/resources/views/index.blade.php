<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>Blog</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    </head>
    <body>
      <h1>Blog Name</h1>
      <div class='posts'>
        [<a href='/posts/create'>create</a>]
          @foreach ($posts as $post)
            <div class='post'>
              <h2><a href="/posts/{{ $post->id }}">{{ $post->title }}</a>
              <p class='body'>{{ $post->body }}</p>
              <form action="/posts/{{ $post->id }}" id="form_{{ $post->id }}" method="post" style="display:inline">
                @csrf
                @method('DELETE')
                <input type="submit" value="削除" onclick='return confirm("削除しますか？");'>
              </form>
            </div>
          @endforeach
      </div>
      <div class='paginate'>
        {{ $posts->links() }}
      </div>
    </body>
</html>