<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Spark extends Model
{
    use HasFactory,SoftDeletes;

    protected $fillable = ['title', 'description', 'category_id', 'user_id','visibility'];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function views()
    {
        return $this->hasMany(SparkView::class);
    }

    public function likes()
    {
        return $this->hasMany(SparkLike::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
