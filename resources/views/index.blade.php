@extends('layouts.default')

@section('content')

    <section class="post-preview-list">
        @foreach($posts as $post)
            <article>
                <div class="post-preview">
                    <h3>{{ $post['title'] }}</h3>
                    <p class="text-muted">
                        By <strong>{{ $post['user'] }}</strong> ~ {{ $post['created_human'] }}
                    </p>
                    <a href="{{ route('pages.show', ['slug' => $post['slug']]) }}">View Post</a>
                </div>
            </article>
            @if (!$loop->last)
                <hr>
            @endif
        @endforeach
    </section>

@endsection
