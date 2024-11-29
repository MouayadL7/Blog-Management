<?php

namespace App\DTOs;

use Illuminate\Http\Request;

class PostDTO
{
    public function __construct(
        public ?int $userId,
        public ?string $title,
        public ?string $content,
        public ?bool $publish
    ) {}

    public function toArray(): array
    {
        return array_filter([
            'user_id' => $this->userId,
            'title' => $this->title,
            'content' => $this->content,
            'publish_date' => !is_null($this->publish) ? now() : null
        ], fn($value) => !is_null($value));
    }

    public static function fromRequest(Request $request): self
    {
        return new self(
            userId: $request->input('user_id'),
            title: $request->input('title'),
            content: $request->input('content'),
            publish: $request->input('publish')
        );
    }
}
