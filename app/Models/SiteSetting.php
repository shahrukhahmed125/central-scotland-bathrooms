<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SiteSetting extends Model
{
    protected $fillable = [
        'company_name',
        'phone',
        'whatsapp',
        'email',
        'address',
        'facebook_url',
        'instagram_url',
        'footer_text',
    ];

    public static function current(): self
    {
        return static::firstOrCreate(
            ['id' => 1],
            ['company_name' => 'Central Scotland Bathroom Consultancy']
        );
    }
}
