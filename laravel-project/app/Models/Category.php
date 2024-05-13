<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Domain\ValueObject\Category\Id;
use App\Domain\ValueObject\Category\UserId;
use App\Domain\ValueObject\Category\Name;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'name'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function blog_categories()
    {
        return $this->hasMany(Blog_category::class, 'category_id');
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
    // name
    public function setNameAttribute($value)
    {
        $this->attributes['name'] = new Name($value);
    }
    public function getNameAttribute($value)
    {
        return $value instanceof Name ? $value->value() : $value;
    }
}
