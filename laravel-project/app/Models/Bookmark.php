<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Domain\ValueObject\Bookmark\Id;
use App\Domain\ValueObject\Bookmark\UserId;
use App\Domain\ValueObject\Bookmark\BlogId;

class Bookmark extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'blog_id',
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
}
