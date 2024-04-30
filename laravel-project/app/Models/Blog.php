<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Domain\ValueObject\Blog\Id;
use App\Domain\ValueObject\Blog\UserId;
use App\Domain\ValueObject\Blog\Title;
use App\Domain\ValueObject\Blog\Contents;

class Blog extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'title',
        'contents'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function scopeSearch($query, $keyword)
    {
        if ($keyword) {
            return $query->where('title', 'like', '%' . $keyword . '%')
                ->orWhere('contents', 'like', '%' . $keyword . '%');
        }
        return $query;
    }

    public function scopeSort($query, $sort)
    {
        if ($sort === 'new') {
            return $query->orderBy('created_at', 'desc');
        }
        if ($sort === 'old') {
            return $query->orderBy('created_at', 'asc');
        }
        return $query;
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
    // title
    public function setTitleAttribute($value)
    {
        $this->attributes['title'] = new Title($value);
    }
    public function getTitleAttribute($value)
    {
        return $value instanceof Title ? $value->value() : $value;
    }
    // contents
    public function setContentsAttribute($value)
    {
        $this->attributes['contents'] = new Contents($value);
    }
    public function getContentsAttribute($value)
    {
        return $value instanceof Contents ? $value->value() : $value;
    }
}
