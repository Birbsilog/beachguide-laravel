<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inquiry extends Model
{
    use HasFactory;

    protected $fillable = [
        'beach_id',
        'user_id',
        'owner_id',
        'subject',
        'message',
        'status',
    ];

    // Inquiry belongs to a user
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Inquiry belongs to a beach
    public function beach()
    {
        return $this->belongsTo(Beach::class);
    }
}
