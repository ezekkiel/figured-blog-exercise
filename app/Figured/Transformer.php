<?php

namespace App\Figured;

use Illuminate\Support\Collection;
use App\Post;

class Transformer{

	public static function transformPostCollection(Collection $posts): Collection
	{
		return $posts->map(function($post){
			return self::transformPost($post);
		});
	}

	public static function transformPost(Post $post): array
	{
		return [
			'id' => $post->_id,
			'title' => $post->title,
			'slug' => $post->slug,
			'body' => html_entity_decode($post->body),
			'created' => $post->created_at->toDateTimeString(),
			'created_human' => $post->created_at->diffForHumans(),
			'user' => $post->user,
			'published' => (bool) $post->published
		];
	}

}