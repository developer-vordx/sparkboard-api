<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Favorite extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'spark_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function spark()
    {
        return $this->belongsTo(Spark::class);
    }
}
