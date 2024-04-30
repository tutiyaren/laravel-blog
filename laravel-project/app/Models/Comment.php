<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Domain\ValueObject\Comment\Id;
use App\Domain\ValueObject\Comment\UserId;
use App\Domain\ValueObject\Comment\BlogId;
use App\Domain\ValueObject\Comment\Commenter_name;
use App\Domain\ValueObject\Comment\Comments;

class Comment extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'blog_id',
        'commenter_name',
        'comments'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function blog()
    {
        return $this->belongsTo(Blog::class);
    }

    // id
    public function setIdAttribute($value)
    {
        $this->attributes['id'] = new Id($value);
    }
    public function getIdAttribute($value)
    {
        return $value instanceof Id ? $value->value() : $value;
    }
    // userId
    public function setUserIdAttribute($value)
    {
        $this->attributes['user_id'] = new UserId($value);
    }
    public function getUserIdAttribute($value)
    {
        return $value instanceof UserId ? $value->value() : $value;
    }
    // blogId
    public function setBlogIdAttribute($value)
    {
        $this->attributes['blog_id'] = new BlogId($value);
    }
    public function getBlogIdAttribute($value)
    {
        return $value instanceof BlogId ? $value->value() : $value;
    }
    // commenter_name
    public function setCommenter_nameAttribute($value)
    {
        $this->attributes['commenter_name'] = new Commenter_name($value);
    }
    public function getCommenter_nameAttribute($value)
    {
        return $value instanceof Commenter_name ? $value->value() : $value;
    }
    // comments
    public function setCommentsAttribute($value)
    {
        $this->attributes['comments'] = new Comments($value);
    }
    public function getCommentsAttribute($value)
    {
        return $value instanceof Comments ? $value->value() : $value;
    }
}
