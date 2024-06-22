<?php

namespace Admin\Extend\AdminComment\Models;

use Admin\Extend\AdminComment\Traits\Commentable;
use Illuminate\Database\Eloquent\Model;

/**
 * Admin\Extend\AdminComment\Models\Comment
 *
 * @property-read \Illuminate\Database\Eloquent\Collection<int, Comment> $commentaries
 * @property-read int|null $commentaries_count
 * @method static \Illuminate\Database\Eloquent\Builder|Comment newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Comment newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Comment query()
 * @property int $id
 * @property float $rating
 * @property string|null $name
 * @property string|null $email
 * @property string $comment
 * @property int|null $user_id
 * @property string $commentable_type
 * @property int $commentable_id
 * @property bool $active
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Comment whereActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Comment whereComment($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Comment whereCommentableId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Comment whereCommentableType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Comment whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Comment whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Comment whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Comment whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Comment whereRating($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Comment whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Comment whereUserId($value)
 * @mixin \Eloquent
 */
class Comment extends Model
{
    use Commentable;

    /**
     * @var array|string[]
     */
    protected $fillable = [
        'rating',
        'name',
        'email',
        'comment',
        //'user_id',
        'commentable_id',
        'commentable_type',
        'active',
    ];

    /**
     * @var string[]
     */
    protected $casts = [
        'rating' => 'float',
        'name' => 'string',
        'email' => 'string',
        'comment' => 'string',
        //'user_id' => 'integer',
        'commentable_id' => 'integer',
        'commentable_type' => 'string',
        'active' => 'boolean',
    ];

    /**
     * @param  array  $attributes
     */
    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);

        /** @var \Illuminate\Database\Eloquent\Model $userModel */
        $userModel = new (config('auth.providers.users.model'));
        $userField = \Illuminate\Support\Str::singular($userModel->getTable()) . '_id';
        $this->fillable[] = $userField;
        $this->casts[$userField] = 'integer';
    }
}
