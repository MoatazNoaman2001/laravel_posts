<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $table="post";
    use HasUuids;

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
