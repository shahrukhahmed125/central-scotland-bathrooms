<?php

namespace Database\Seeders;

use App\Models\Faq;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FaqSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faqs = [
            [
                'question' => 'What types of bathroom do you fit?',
                'answer' => '<p>Central Scotland Bathroom Consultancy fits wet wall bathrooms, which use large waterproof wall panels, and fully tiled bathrooms. Every job includes stripping out the old bathroom, fitting the new goods to a high standard and taking all the rubbish away.</p>',
                'slug' => 'what-types-of-bathroom-do-you-fit',
                'sort_order' => 1,
                'is_active' => true,
            ],
            [
                'question' => 'What is a wet wall bathroom?',
                'answer' => '<p>A wet wall bathroom uses large waterproof panels on the walls instead of tiles. The panels have very few joints and no grout lines, so they wipe clean with a cloth and leave fewer places for mould to build up.</p>',
                'slug' => 'what-is-a-wet-wall-bathroom',
                'sort_order' => 2,
                'is_active' => true,
            ],
            [
                'question' => 'Should I choose wet wall panels or tiles?',
                'answer' => '<p>Choose wet wall panels if you want a grout-free finish that\'s usually faster to fit. Choose tiles if you want the widest choice of colour, size and pattern. Robert can talk you through both for your bathroom and budget.</p>',
                'slug' => 'should-i-choose-wet-wall-panels-or-tiles',
                'sort_order' => 3,
                'is_active' => true,
            ],
            [
                'question' => 'Do you take the old bathroom away?',
                'answer' => '<p>Yes. We strip out your old bathroom and take all the rubbish away, including the old suite and any offcuts from the new fit. There\'s nothing left for you to clear when the job is finished.</p>',
                'slug' => 'do-you-take-the-old-bathroom-away',
                'sort_order' => 4,
                'is_active' => true,
            ],
            [
                'question' => 'How will I know what\'s happening each day?',
                'answer' => '<p>Robert calls you every morning to explain what\'s happening that day. He visits once a day to check the work and answer questions, then calls again at the end of the day to tell you what got done.</p>',
                'slug' => 'how-will-i-know-whats-happening-each-day',
                'sort_order' => 5,
                'is_active' => true,
            ],
            [
                'question' => 'When do I pay for the fitting?',
                'answer' => '<p>You pay the fitting cost once you\'re happy with the whole job. Check the finished bathroom first, and if anything isn\'t right, tell us and we\'ll put it right before you pay for the fitting.</p>',
                'slug' => 'when-do-i-pay-for-the-fitting',
                'sort_order' => 6,
                'is_active' => true,
            ],
            [
                'question' => 'Which brands do you fit?',
                'answer' => '<p>We fit goods from trusted, well-known bathroom brands. If you already have a brand, range or product in mind, mention it when you get in touch and Robert will talk it through with you.</p>',
                'slug' => 'which-brands-do-you-fit',
                'sort_order' => 7,
                'is_active' => true,
            ],
            [
                'question' => 'Which areas do you cover?',
                'answer' => '<p>We fit bathrooms across Central Scotland. Call Robert on the phone number shown on this site or send a message with your town or postcode, and he\'ll confirm whether we cover your area.</p>',
                'slug' => 'which-areas-do-you-cover',
                'sort_order' => 8,
                'is_active' => true,
            ],
            [
                'question' => 'How long have you been fitting bathrooms?',
                'answer' => '<p>Central Scotland Bathroom Consultancy has fitted wet wall and tiled bathrooms since 2019. Robert Stevenson runs the business and keeps in touch with every customer personally while their bathroom is fitted.</p>',
                'slug' => 'how-long-have-you-been-fitting-bathrooms',
                'sort_order' => 9,
                'is_active' => true,
            ],
            [
                'question' => 'How do I ask for a quote?',
                'answer' => '<p>Call Robert on the phone number shown on this site, send a WhatsApp message, email us, or fill in the form on our contact page with a few details about your bathroom.</p>',
                'slug' => 'how-do-i-ask-for-a-quote',
                'sort_order' => 10,
                'is_active' => true,
            ],
        ];

        foreach ($faqs as $faq) {
            Faq::create($faq);
        }
    }
}
