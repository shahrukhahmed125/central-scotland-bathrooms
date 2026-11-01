<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ServicesContent extends Model
{
    protected $fillable = [
        // Page Hero
        'hero_title',
        'hero_lead',

        // Services Intro
        'services_title',
        'services_lead',

        // Guarantee Ribbon
        'guarantee_amount',
        'guarantee_title',
        'guarantee_lead',

        // FAQ Intro
        'faq_title',
        'faq_lead',

        // CTA Section
        'cta_title',
        'cta_lead',
        'since_year',

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
                'hero_title' => 'Bathroom refits, from strip-out to sign-off.',
                'hero_lead' => 'Wet wall and tiled bathrooms across Central Scotland, handled by one team that keeps you updated every day.',
                'services_title' => 'What every job includes',
                'services_lead' => 'You deal with one team from the day the old bathroom comes out to the day you sign off the new one.',
                'guarantee_amount' => '£0',
                'guarantee_title' => "No fitting cost to pay until you're happy with the whole job.",
                'guarantee_lead' => "Check the finished bathroom first. If anything isn't right, we put it right before you pay for the fitting.",
                'faq_title' => 'Questions people ask',
                'faq_lead' => 'Straight answers about how a bathroom refit with us works.',
                'cta_title' => 'Talk to Robert about your bathroom.',
                'cta_lead' => 'Fitting wet wall and tiled bathrooms across Central Scotland since 2019.',
                'since_year' => 2019,
                'meta_title' => 'Services | Scotland Bathrooms',
                'meta_description' => 'Wet wall and tiled bathroom refits across Central Scotland. Handled by one team from strip-out to sign-off.',
                'meta_keywords' => 'bathroom refits, wet wall, tiled bathrooms, central scotland',
                'og_title' => 'Bathroom refits, from strip-out to sign-off',
                'og_description' => 'Wet wall and tiled bathrooms across Central Scotland, handled by one team that keeps you updated every day.',
            ]
        );
    }
}
