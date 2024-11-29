<?php

namespace App\Http\Controllers;

use App\Helpers\ResponseHelper;
use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use App\Models\Post;
use App\Services\PostService;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function __construct(protected PostService $postService) {}

    public function getClientPosts()
    {
        $clientPosts = $this->postService->getClientPosts();

        return ResponseHelper::sendResponse($clientPosts, 'Client posts retrieved successfully');
    }

    public function getPublishedPosts()
    {
        $publishedPosts = $this->postService->getPublishedPosts();
        
        return ResponseHelper::sendResponse($publishedPosts, 'Published posts retrieved successfully');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePostRequest $request)
    {
        $post = $this->postService->storePost($request->toDTO());

        return ResponseHelper::sendResponse($post, 'Post stored successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        return ResponseHelper::sendResponse($post, 'Post retrieved successfully');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePostRequest $request, Post $post)
    {
        $this->authorize('update', $post);

        $this->postService->updatePost($request->toDTO(), $post);

        return ResponseHelper::sendResponse($post, 'Post updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        $this->authorize('delete', $post);
        
        $this->postService->deletePost($post);

        return ResponseHelper::sendResponse([], 'Post deleted sucessfully');
    }
}
