<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Spark extends Model
{
    use HasFactory,SoftDeletes;

    protected $fillable = ['title', 'description', 'category_id', 'user_id'];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
