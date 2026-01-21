<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Beach extends Model
{
    use HasFactory;

    /**
     * Status constants
     */
    public const STATUS_PENDING  = 'pending';
    public const STATUS_APPROVED = 'approved';
    public const STATUS_DENIED   = 'denied';

    /**
     * All available statuses (for dropdowns/forms)
     */
    public const STATUSES = [
        self::STATUS_PENDING,
        self::STATUS_APPROVED,
        self::STATUS_DENIED,
    ];

    protected $fillable = [
        'name',
        'description',
        'latitude',
        'longitude',
        'image_path',
        'owner_id',
        'status',
    ];

    /**
     * ----------------------
     * Relationships
     * ----------------------
     */
    public function amenities()
    {
        return $this->hasMany(Amenity::class);
    }
public function reviews()
{
    return $this->hasMany(Review::class);
}
    public function owner()
    {
        return $this->belongsTo(User::class, 'owner_id');
    }

    /**
     * ----------------------
     * Status helpers
     * ----------------------
     */
    public function isPending(): bool
    {
        return $this->status === self::STATUS_PENDING;
    }

    public function isApproved(): bool
    {
        return $this->status === self::STATUS_APPROVED;
    }

    public function isDenied(): bool
    {
        return $this->status === self::STATUS_DENIED;
    }

    /**
     * Accessor for nicer status text
     */
    public function getStatusLabelAttribute(): string
    {
        return ucfirst($this->status);
    }

    /**
     * ----------------------
     * Query scopes
     * ----------------------
     */
    public function scopeApproved($query)
    {
        return $query->where('status', self::STATUS_APPROVED);
    }

    public function scopePending($query)
    {
        return $query->where('status', self::STATUS_PENDING);
    }

    public function scopeDenied($query)
    {
        return $query->where('status', self::STATUS_DENIED);
    }
    // App\Models\Beach.php
public function contacts()
{
    return $this->hasMany(Contact::class);
}

}
