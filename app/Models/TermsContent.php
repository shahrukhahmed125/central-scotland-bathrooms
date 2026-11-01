<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TermsContent extends Model
{
    protected $fillable = [
        // Page Hero
        'hero_title',

        // Document Body
        'last_updated',
        'content',

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
                'hero_title' => 'Terms of use',
                'last_updated' => '14 October 2026',
                'content' => '<h2>About these terms</h2>
<p>These terms cover your use of this website, which belongs to Central Scotland Bathroom Consultancy Ltd (“we”, “us”). By using the website you accept them. If you don’t agree, please don’t use the website.</p>
<h2>Information on this website</h2>
<p>The information here is general and is there to help you find out about our services. It isn’t a quote or an offer. Any quote or agreement for work on your bathroom is made separately with you, and its own terms apply.</p>
<p>We work to keep the website accurate and up to date, but we can’t promise that everything on it is complete or current at all times.</p>
<h2>Contacting us through the website</h2>
<p>The enquiry form opens your own email app or WhatsApp with your details filled in. Messages are sent by you, through those services, and their own terms apply.</p>
<h2>Links to other websites</h2>
<p>Some links take you to websites we don’t control, such as WhatsApp. We aren’t responsible for their content or how they handle your information.</p>
<h2>Our content</h2>
<p>The text, illustrations, logo and design of this website belong to us or the people who license them to us. Please don’t copy or reuse them without our permission.</p>
<h2>Our responsibility</h2>
<p>We aren’t responsible for any loss caused by relying on information on this website, or by the website being unavailable. Nothing in these terms limits our liability where the law doesn’t allow it to be limited, including for death or personal injury caused by negligence, or for fraud.</p>
<h2>Law</h2>
<p>These terms are governed by the law of Scotland, and the Scottish courts deal with any dispute about them.</p>
<h2>Contact us</h2>
<p>If you have a question about these terms, call <a href="tel:+447549348636">+44 7549 348636</a> or email <a href="mailto:info@centralscotlandbathrooms.co.uk?subject=Bathroom%20enquiry">info@centralscotlandbathrooms.co.uk</a>.</p>',
                'meta_title' => 'Terms of Use | Central Scotland Bathroom Consultancy',
                'meta_description' => 'Terms of use for the Central Scotland Bathroom Consultancy website.',
                'meta_keywords' => 'terms of use, terms and conditions, scotland bathrooms',
                'og_title' => 'Terms of use',
                'og_description' => 'Terms of use for the Central Scotland Bathroom Consultancy website.',
            ]
        );
    }
}
