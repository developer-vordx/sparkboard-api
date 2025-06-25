<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SparkView extends Model
{
    use HasFactory;

    protected $fillable = ['spark_id', 'user_id', 'ip_address'];

    public function spark()
    {
        return $this->belongsTo(Spark::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
