<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HomepageContent extends Model
{
    protected $fillable = [
        // Hero Section
        'hero_title',
        'hero_lead',

        // Day Section
        'day_title',
        'day_lead',
        'day_stops',

        // Promise Section
        'promise_amount',
        'promise_caption',
        'promise_title',
        'promise_lead',
        'promise_list',

        // Walls Section
        'walls_title',
        'walls_lead',
        'tiles_title',
        'tiles_list',
        'panels_title',
        'panels_list',

        // Process Section
        'process_title',
        'process_lead',
        'process_steps',

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

    protected function casts(): array
    {
        return [
            'day_stops' => 'array',
            'promise_list' => 'array',
            'tiles_list' => 'array',
            'panels_list' => 'array',
            'process_steps' => 'array',
        ];
    }

    public static function current(): self
    {
        return static::firstOrCreate(
            ['id' => 1],
            [
                'hero_title' => 'A new bathroom, without the worry.',
                'hero_lead' => 'Wet wall and tiled bathrooms across Central Scotland. Daily updates from Robert, and you pay the fitting once you\'re happy.',
                'day_title' => 'You\'ll hear from us every day of your job.',
                'day_lead' => 'Robert stays in touch from the first morning to the last, so you always know where your bathroom\'s at.',
                'promise_amount' => '£0',
                'promise_caption' => 'fitting cost to pay until you\'re happy with the whole job',
                'promise_title' => 'You pay the fitting cost once you\'re happy.',
                'promise_lead' => 'Check the finished bathroom first. If anything isn\'t right, we put it right before you pay for the fitting.',
                'walls_title' => 'Wet wall or tiles? Compare them on one wall.',
                'walls_lead' => 'Drag the handle to see both finishes. We fit either, and Robert can help you choose what suits your bathroom.',
                'tiles_title' => 'Tiled walls',
                'panels_title' => 'Wet wall panels',
                'process_title' => 'One team, from strip-out to sign-off.',
                'process_lead' => 'Every job follows the same four steps, and you hear from Robert at each one.',
                'cta_title' => 'Talk to Robert about your bathroom.',
                'cta_lead' => 'Fitting wet wall and tiled bathrooms across Central Scotland since 2019.',
                'since_year' => 2019,
                'meta_title' => 'Bathroom Fitters in Central Scotland | Central Scotland Bathroom Consultancy',
                'meta_description' => 'Wet wall and tiled bathroom refits across Central Scotland since 2019. Daily updates from Robert, all rubbish taken away, and you pay the fitting once you’re happy.',
                'og_title' => 'A new bathroom, without the worry',
                'og_description' => 'Wet wall and tiled bathrooms across Central Scotland. Daily updates from Robert, and you pay the fitting once you’re happy.',
            ]
        );
    }
}
