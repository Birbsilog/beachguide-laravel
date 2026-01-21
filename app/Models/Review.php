<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;

    protected $fillable = ['beach_id', 'user_id', 'owner_id', 'rating', 'comment'];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function beach()
    {
        return $this->belongsTo(Beach::class, 'beach_id');
    }
}
