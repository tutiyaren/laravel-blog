<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
}
