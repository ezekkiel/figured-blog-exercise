@extends('layouts.admin')

@section('content')

    @include('posts.shared.message')

    @foreach($posts as $post)
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">{{ $post['title'] }}</h3>
            </div>
            <div class="panel-body">
                {!! $post['body'] !!}
            </div>
            <div class="panel-footer">
                <button
                   onclick="deletePost('{{ $post['id'] }}')"
                   class="btn btn-sm btn-danger">
                    <span class="glyphicon glyphicon-trash"></span> Delete
                </button>
                <form id="delete-post-{{$post['id']}}"
                      action="{{ route('posts.destroy', ['post' => $post['id']]) }}"
                      method="post" style="display: none;">
                    {{ csrf_field() }}
                    {{ method_field('delete') }}
                </form>
                <a href="{{ route('posts.edit', ['post' => $post['id']]) }}" class="btn btn-sm btn-default">
                    <span class="glyphicon glyphicon-pencil"></span> Edit
                </a>
            </div>
        </div>
    @endforeach

@endsection
@push('scripts')
<script>
    function deletePost(postId) {
        return (confirm('Are you sure?')) ? document.getElementById('delete-post-' + postId).submit() : false;
    }
</script>
@endpush