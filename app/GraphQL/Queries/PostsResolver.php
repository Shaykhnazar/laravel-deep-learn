<?php

namespace App\GraphQL\Queries;

use App\Models\Post;
use LaravelIdea\Helper\App\Models\_IH_Post_C;

final class PostsResolver
{
    /**
     * @param null $_
     * @param array{} $args
     * @return Post[]|_IH_Post_C
     */
    public function __invoke($_, array $args)
    {
        return Post::latest()->get();
    }
}
