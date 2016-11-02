@extends('layouts.default')

@section('content')
    <article class="post-view">
        <header>
            <a href="{{ route('pages.index') }}">&#8592; Back</a>
            <h3>{{ $post['title'] }}</h3>
            <p class="text-muted">
                By <strong>{{ $post['user'] }}</strong> ~ {{ $post['created_human'] }}
            </p>
        </header>
        <div class="blog-body">
            {!! $post['body'] !!}
        </div>
    </article>
@endsection