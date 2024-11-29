<?php

namespace App\Repositories;

use App\Models\Post;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PostRepository
{
    public function getClientPosts(): Collection
    {
        return Auth::user()->posts;
    }

    public function getPublishedPosts(): Collection
    {
        return Post::published()->get();
    }

    public function store(array $data): Post
    {
        return DB::transaction(function () use ($data) {
            return Post::create($data);
        });
    }

    public function update(array $data, Post $post): void
    {
        DB::transaction(function () use ($data, $post) {
            $post->update($data);
        });
    }

    public function delete(Post $post): void
    {
        $post->delete();
    }
}
