<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Amenity extends Model
{
    use HasFactory;

    protected $fillable = [
        'beach_id',
        'description',
        'images',
    ];

    protected $casts = [
        'images' => 'array', // important so Laravel handles JSON properly
    ];

public function beach()
{
    return $this->belongsTo(Beach::class, 'beach_id');
}

}
