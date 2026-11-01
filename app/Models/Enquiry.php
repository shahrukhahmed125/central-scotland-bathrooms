<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Enquiry extends Model
{
    protected $fillable = [
        'name',
        'phone',
        'email',
        'town',
        'bathroom_type',
        'best_time_to_call',
        'message',
        'status',
        'ip_address',
        'user_agent',
    ];

    protected $casts = [
        'status' => 'string',
    ];

    public function scopeNew($query)
    {
        return $query->where('status', 'new');
    }

    public function scopeContacted($query)
    {
        return $query->where('status', 'contacted');
    }

    public function scopeQuoted($query)
    {
        return $query->where('status', 'quoted');
    }

    public function scopeCompleted($query)
    {
        return $query->where('status', 'completed');
    }

    public function scopeArchived($query)
    {
        return $query->where('status', 'archived');
    }
}
