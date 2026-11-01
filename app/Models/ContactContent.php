<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ContactContent extends Model
{
    protected $fillable = [
        // Page Hero
        'hero_title',
        'hero_lead',

        // Direct Contact & Coverage
        'direct_title',
        'coverage_title',
        'coverage_text',

        // Quote Form Card
        'form_title',
        'form_lead',
        'form_note',

        // SEO & Social
        'meta_title',
        'meta_description',
        'meta_keywords',
        'og_title',
        'og_description',
        'og_image',
    ];

    public static function current(): self
    {
        return static::firstOrCreate(
            ['id' => 1],
            [
                'hero_title' => 'Let’s talk about your bathroom.',
                'hero_lead' => 'Call, WhatsApp or email Robert, or send your details with the form below.',
                'direct_title' => 'Talk to Robert directly',
                'coverage_title' => 'We cover Central Scotland.',
                'coverage_text' => 'Not sure if that includes you? Send your town or postcode and Robert will confirm.',
                'form_title' => 'Ask for a quote',
                'form_lead' => "Fill in a few details and we'll be in touch to discuss your bathroom project.",
                'form_note' => 'Prefer to call or message directly? Use the contact options above.',
                'meta_title' => 'Contact | Scotland Bathrooms',
                'meta_description' => 'Get in touch with Robert for a bathroom quote across Central Scotland. Call, WhatsApp, email or send your details.',
                'meta_keywords' => 'contact scotland bathrooms, bathroom quote, bathroom fitters central scotland',
                'og_title' => 'Let’s talk about your bathroom.',
                'og_description' => 'Call, WhatsApp or email Robert, or send your details for a free bathroom refit consultation across Central Scotland.',
            ]
        );
    }
}
