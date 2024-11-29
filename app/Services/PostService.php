<?php

namespace App\Services;

use App\DTOs\PostDTO;
use App\Models\Post;
use App\Repositories\PostRepository;
use Illuminate\Database\Eloquent\Collection;

class PostService
{
    public function __construct(protected PostRepository $postRepository) {}

    public function getClientPosts(): Collection
    {
        return $this->postRepository->getClientPosts();
    }

    public function getPublishedPosts(): Collection
    {
        return $this->postRepository->getPublishedPosts();
    }

    public function storePost(PostDTO $postDTO): Post
    {
        return $this->postRepository->store($postDTO->toArray());
    }

    public function updatePost(PostDTO $postDTO, Post $post): void
    {
        $this->postRepository->update($postDTO->toArray(), $post);
    }

    public function deletePost(Post $post): void
    {
        $this->postRepository->delete($post);
    }
}
