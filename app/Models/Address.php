<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'type',
        'label',
        'first_name',
        'last_name',
        'phone',
        'email',
        'street_line_1',
        'street_line_2',
        'city',
        'state_province',
        'postal_code',
        'country',
        'delivery_instructions',
        'is_default',
    ];

    protected function casts(): array
    {
        return [
            'is_default' => 'boolean',
        ];
    }

    // Relationships
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Helper methods
    public function getFullAddressAttribute()
    {
        return "{$this->street_line_1}, {$this->city}, {$this->state_province} {$this->postal_code}, {$this->country}";
    }

    public function getFullNameAttribute()
    {
        return "{$this->first_name} {$this->last_name}";
    }
}

