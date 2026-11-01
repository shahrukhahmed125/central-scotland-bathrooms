<?php

namespace Database\Seeders;

use App\Models\HomepageContent;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class HomepageContentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $content = HomepageContent::firstOrCreate(['id' => 1]);

        $content->update([
            'day_stops' => [
                [
                    'icon' => 'sun',
                    'when' => 'Every morning',
                    'title' => 'A call to plan the day',
                    'description' => 'Robert rings to tell you what\'s happening in your bathroom that day.',
                ],
                [
                    'icon' => 'home',
                    'when' => 'Once a day',
                    'title' => 'A visit to check the work',
                    'description' => 'He pops in to see the job and answer your questions face to face.',
                ],
                [
                    'icon' => 'sunset',
                    'when' => 'End of the day',
                    'title' => 'A call to sum up',
                    'description' => 'You hear what got done today and what\'s planned for tomorrow.',
                ],
            ],
            'promise_list' => [
                'Goods from trusted, well-known brands',
                'Fitted to a high standard',
                'All the rubbish taken away',
            ],
            'tiles_list' => [
                'A wide choice of colour, size and pattern',
                'A classic, hand-laid finish',
                'Ideal for feature walls, borders and alcoves',
            ],
            'panels_list' => [
                'Large waterproof panels with very few joints',
                'No grout lines to scrub or reseal',
                'Usually faster to fit than tiles',
            ],
            'process_steps' => [
                [
                    'icon' => 'strip',
                    'title' => 'Strip out',
                    'description' => 'We remove your old bathroom so the new one starts from a clean slate.',
                ],
                [
                    'icon' => 'wrench',
                    'title' => 'Fit',
                    'description' => 'We fit your new bathroom to a high standard, using goods from trusted brands.',
                ],
                [
                    'icon' => 'van',
                    'title' => 'Clear away',
                    'description' => 'We take all the rubbish away, so there\'s nothing left for you to deal with.',
                ],
                [
                    'icon' => 'thumb',
                    'title' => 'Sign off',
                    'description' => 'You check the finished job, then pay the fitting cost once you\'re happy.',
                ],
            ],
        ]);
    }
}
