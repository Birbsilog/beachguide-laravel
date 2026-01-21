<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;

    protected $fillable = [
    'type',
    'value',
    'beach_id',
    'owner_id',
];


    /* =========================
     *  RELATIONSHIPS
     * ========================= */

    // Each contact belongs to a beach owner (user)
    public function owner()
    {
        return $this->belongsTo(User::class, 'owner_id');
    }
    // App\Models\Contact.php
public function beach()
{
    return $this->belongsTo(Beach::class);
}

}
