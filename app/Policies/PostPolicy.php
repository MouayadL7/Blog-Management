<?php

namespace App\Policies;

use App\Models\Post;
use App\Models\User;

class PostPolicy
{
    public function update(User $user, Post $post)
    {
        return $post->user_id === $user->id;
    }

    public function delete(User $user, Post $post)
    {
        return $post->user_id === $user->id;
    }
}
