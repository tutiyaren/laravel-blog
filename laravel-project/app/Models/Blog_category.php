<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Domain\ValueObject\BlogCategory\Id;
use App\Domain\ValueObject\BlogCategory\BlogId;
use App\Domain\ValueObject\BlogCategory\CategoryId;

class Blog_category extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_id',
        'blog_id'
    ];

    public function blog()
    {
        return $this->belongsTo(Blog::class, 'blog_id');
    }

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
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
    // blogId
    public function setBlogIdAttribute($value)
    {
        $this->attributes['blog_id'] = new BlogId($value);
    }
    public function getBlogIdAttribute($value)
    {
        return $value instanceof BlogId ? $value->value() : $value;
    }
    // categoryId
    public function setCategoryIdAttribute($value)
    {
        $this->attributes['category_id'] = new CategoryId($value);
    }
    public function getCategoryIdAttribute($value)
    {
        return $value instanceof CategoryId ? $value->value() : $value;
    }
}
