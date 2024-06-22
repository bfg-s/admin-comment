<?php

namespace Admin\Extend\AdminComment\Traits;

use Admin\Extend\AdminComment\Models\Comment;
use Illuminate\Database\Eloquent\Relations\MorphMany;

trait Commentable
{
    /**
     * @return MorphMany
     */
    public function commentaries(): MorphMany
    {
        return $this->morphMany(Comment::class, 'commentable');
    }
}
