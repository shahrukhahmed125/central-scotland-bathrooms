<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GalleryContent extends Model
{
    protected $fillable = [
        // Page Hero
        'hero_eyebrow',
        'hero_title',
        'hero_lead',
        'hero_note',

        // CTA Section
        'cta_title',
        'cta_lead',

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
                'hero_eyebrow' => 'OUR WORK',
                'hero_title' => 'Bathroom Transformations Across Central Scotland',
                'hero_lead' => 'Explore our completed bathroom installations, from contemporary wet wall panels to beautifully tiled finishes. Every project reflects our commitment to quality workmanship and keeping you informed throughout the job.',
                'hero_note' => 'Wet wall and tiled bathrooms, fitted with care since 2019.',
                'cta_title' => 'Planning a New Bathroom?',
                'cta_lead' => 'Talk to Robert about your bathroom, compare wet wall and tiled finishes, and get advice on the right solution for your home.',
                'meta_title' => 'Gallery | Scotland Bathrooms',
                'meta_description' => 'Explore our completed bathroom installations across Central Scotland, from contemporary wet wall panels to beautifully tiled finishes.',
                'meta_keywords' => 'bathroom gallery, bathroom installations, wet wall panels, tiled bathrooms, central scotland',
                'og_title' => 'Bathroom Transformations Across Central Scotland',
                'og_description' => 'Explore our completed bathroom installations across Central Scotland, from contemporary wet wall panels to beautifully tiled finishes.',
            ]
        );
    }
}
