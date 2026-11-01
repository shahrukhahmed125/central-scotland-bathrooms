<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Service extends Model
{
    protected $fillable = [
        'title',
        'slug',
        'short_description',
        'description',
        'image',
        'icon_type',
        'icon_name',
        'icon_color',
        'card_style',
        'card_span',
        'chips',
        'chip_icons',
        'is_active',
        'sort_order',
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'sort_order' => 'integer',
        'chip_icons' => 'array',
    ];

    /**
     * Get and set the service chips (always returns array, safely handles strings or JSON).
     */
    protected function chips(): \Illuminate\Database\Eloquent\Casts\Attribute
    {
        return \Illuminate\Database\Eloquent\Casts\Attribute::make(
            get: function ($value) {
                if (empty($value)) {
                    return [];
                }
                if (is_array($value)) {
                    return $value;
                }
                if (is_string($value)) {
                    $decoded = json_decode($value, true);
                    if (is_array($decoded)) {
                        return $decoded;
                    }
                    if (is_string($decoded)) {
                        return array_values(array_filter(array_map('trim', explode(',', $decoded))));
                    }
                    return array_values(array_filter(array_map('trim', explode(',', $value))));
                }
                return [];
            },
            set: function ($value) {
                if (empty($value)) {
                    return null;
                }
                if (is_string($value)) {
                    $items = array_values(array_filter(array_map('trim', explode(',', $value))));
                    return json_encode($items);
                }
                if (is_array($value)) {
                    return json_encode(array_values($value));
                }
                return json_encode($value);
            }
        );
    }

    /**
     * Get and set the service chip icons (always returns array, safely handles strings or JSON).
     * Format: [{"label": "Morning call", "icon": "sun"}, ...]
     */
    protected function chipIcons(): \Illuminate\Database\Eloquent\Casts\Attribute
    {
        return \Illuminate\Database\Eloquent\Casts\Attribute::make(
            get: function ($value) {
                if (empty($value)) {
                    return [];
                }
                if (is_array($value)) {
                    return $value;
                }
                if (is_string($value)) {
                    $decoded = json_decode($value, true);
                    return is_array($decoded) ? $decoded : [];
                }
                return [];
            },
            set: function ($value) {
                if (empty($value)) {
                    return null;
                }
                if (is_array($value)) {
                    return json_encode($value);
                }
                return json_encode($value);
            }
        );
    }

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($service) {
            if (empty($service->slug) && !empty($service->title)) {
                $service->slug = Str::slug($service->title);
            }
        });

        static::updating(function ($service) {
            if (empty($service->slug) && !empty($service->title)) {
                $service->slug = Str::slug($service->title);
            }
        });
    }
}
