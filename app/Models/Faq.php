<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Faq extends Model
{
    protected $fillable = [
        'question',
        'answer',
        'slug',
        'is_active',
        'sort_order',
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($faq) {
            if (empty($faq->slug)) {
                $faq->slug = Str::slug($faq->question);
            }
        });

        static::updating(function ($faq) {
            if (empty($faq->slug) || $faq->isDirty('question')) {
                $faq->slug = Str::slug($faq->question);
            }
        });
    }
}
