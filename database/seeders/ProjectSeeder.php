<?php

namespace Database\Seeders;

use App\Models\Project;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $projects = [
            [
                'title' => 'Contemporary Wet Wall Bathroom',
                'slug' => 'contemporary-wet-wall-bathroom',
                'category' => 'wet-wall',
                'image' => 'gallery/placeholder-1.jpg',
                'description' => 'Contemporary wet wall bathroom installation with modern fixtures.',
                'sort_order' => 1,
                'is_featured' => true,
                'is_active' => true,
            ],
            [
                'title' => 'Classic Tiled Shower Room',
                'slug' => 'classic-tiled-shower-room',
                'category' => 'tiled',
                'image' => 'gallery/placeholder-2.jpg',
                'description' => 'Classic tiled shower room with intricate tile work.',
                'sort_order' => 2,
                'is_featured' => false,
                'is_active' => true,
            ],
            [
                'title' => 'Modern Bathroom Renovation',
                'slug' => 'modern-bathroom-renovation',
                'category' => 'wet-wall',
                'image' => 'gallery/placeholder-3.jpg',
                'description' => 'Modern bathroom renovation with wet wall panels.',
                'sort_order' => 3,
                'is_featured' => false,
                'is_active' => true,
            ],
            [
                'title' => 'Detailed Tile and Shower Finish',
                'slug' => 'detailed-tile-and-shower-finish',
                'category' => 'tiled',
                'image' => 'gallery/placeholder-4.jpg',
                'description' => 'Detailed tile and shower finish with precision tiling.',
                'sort_order' => 4,
                'is_featured' => false,
                'is_active' => true,
            ],
            [
                'title' => 'Enclosed Shower Installation',
                'slug' => 'enclosed-shower-installation',
                'category' => 'shower',
                'image' => 'gallery/placeholder-5.jpg',
                'description' => 'Enclosed shower installation with glass enclosure.',
                'sort_order' => 5,
                'is_featured' => false,
                'is_active' => true,
            ],
            [
                'title' => 'Vanity and Mirror Detail',
                'slug' => 'vanity-and-mirror-detail',
                'category' => 'tiled',
                'image' => 'gallery/placeholder-6.jpg',
                'description' => 'Tiled bathroom with vanity and mirror detail.',
                'sort_order' => 6,
                'is_featured' => false,
                'is_active' => true,
            ],
            [
                'title' => 'Family Wet Wall Bathroom',
                'slug' => 'family-wet-wall-bathroom',
                'category' => 'wet-wall',
                'image' => 'gallery/placeholder-7.jpg',
                'description' => 'Family wet wall bathroom with spacious design.',
                'sort_order' => 7,
                'is_featured' => true,
                'is_active' => true,
            ],
            [
                'title' => 'Heritage-Style Tiled Bathroom',
                'slug' => 'heritage-style-tiled-bathroom',
                'category' => 'tiled',
                'image' => 'gallery/placeholder-8.jpg',
                'description' => 'Heritage-style tiled bathroom with classic design.',
                'sort_order' => 8,
                'is_featured' => false,
                'is_active' => true,
            ],
            [
                'title' => 'Walk-In Shower Wet Wall',
                'slug' => 'walk-in-shower-wet-wall',
                'category' => 'shower',
                'image' => 'gallery/placeholder-9.jpg',
                'description' => 'Walk-in shower with wet wall panels.',
                'sort_order' => 9,
                'is_featured' => false,
                'is_active' => true,
            ],
            [
                'title' => 'Compact Wet Wall Bathroom',
                'slug' => 'compact-wet-wall-bathroom',
                'category' => 'wet-wall',
                'image' => 'gallery/placeholder-10.jpg',
                'description' => 'Compact wet wall bathroom for smaller spaces.',
                'sort_order' => 10,
                'is_featured' => false,
                'is_active' => true,
            ],
            [
                'title' => 'Modern Tiled Ensuite',
                'slug' => 'modern-tiled-ensuite',
                'category' => 'tiled',
                'image' => 'gallery/placeholder-11.jpg',
                'description' => 'Modern tiled ensuite bathroom.',
                'sort_order' => 11,
                'is_featured' => false,
                'is_active' => true,
            ],
            [
                'title' => 'Luxury Wet Wall Finish',
                'slug' => 'luxury-wet-wall-finish',
                'category' => 'wet-wall',
                'image' => 'gallery/placeholder-12.jpg',
                'description' => 'Luxury wet wall finish with premium panels.',
                'sort_order' => 12,
                'is_featured' => true,
                'is_active' => true,
            ],
            [
                'title' => 'Feature Wall Tiling',
                'slug' => 'feature-wall-tiling',
                'category' => 'tiled',
                'image' => 'gallery/placeholder-13.jpg',
                'description' => 'Feature wall tiling with decorative tiles.',
                'sort_order' => 13,
                'is_featured' => false,
                'is_active' => true,
            ],
            [
                'title' => 'Wet Wall Panel Installation',
                'slug' => 'wet-wall-panel-installation',
                'category' => 'wet-wall',
                'image' => 'gallery/placeholder-14.jpg',
                'description' => 'Wet wall panel installation in progress.',
                'sort_order' => 14,
                'is_featured' => false,
                'is_active' => true,
            ],
            [
                'title' => 'Wet Wall Shower Room',
                'slug' => 'wet-wall-shower-room',
                'category' => 'shower',
                'image' => 'gallery/placeholder-15.jpg',
                'description' => 'Wet wall shower room with modern fixtures.',
                'sort_order' => 15,
                'is_featured' => false,
                'is_active' => true,
            ],
            [
                'title' => 'Complete Bathroom Transformation',
                'slug' => 'complete-bathroom-transformation',
                'category' => 'tiled',
                'image' => 'gallery/placeholder-16.jpg',
                'description' => 'Complete bathroom transformation with tiles.',
                'sort_order' => 16,
                'is_featured' => false,
                'is_active' => true,
            ],
        ];

        foreach ($projects as $project) {
            Project::create($project);
        }
    }
}
