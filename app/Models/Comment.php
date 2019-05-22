<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Comment
 * @package App\Models
 * @property string $text
 * @property int $rating
 * @property-read User|null $user
 * @property-read Product $product
 */
class Comment extends Model
{
    protected $guarded = [
        'id',
        'parent_id'
    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function replyComment(array $data, ?User $user)
    {

        $comment = new Comment();
        $comment->text = $data['text'];
        $comment->rating = $data['rating'];
        $comment->product_id = $data['product_id'];

        if ($user) {
            $comment->user()->associate($user);
        }
        $comment->parent_id = $data['parent_id'];
        $comment->save();

        return $comment;
    }

    public function updateReplyComment(array $data, ?User $user, Comment $comment)
    {

        $comment->text = $data['text'];
        $comment->rating = $data['rating'];
        $comment->product_id->$data['product_id'];
        if ($user) {
            $comment->user()->associate($user);
        }
        $comment->save();
        $comment->parent_id = $data['parent_id'];

        return $comment;
    }

    public function children()
    {
        return $this->hasMany(Comment::class, 'parent_id');
    }

    public function isParent(): bool
    {
        if ($this->parent_id == null) {
            return true;
        }
        return false;
    }

    public function parent()
    {
        return $this->belongsTo(Comment::class, 'parent_id');
    }
}
