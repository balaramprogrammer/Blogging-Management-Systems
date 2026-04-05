<?php

namespace Database\Seeders;
use App\Models\Category;
use Illuminate\Support\Str;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PostCategory extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        


    Category::insert([
        [
            'name' => 'Technology',
            'slug' => Str::slug('Technology'),
            'image' => 'tech.jpg',
            'description' => 'All about latest technology',
            'status' => 'active',
            'created_at' => now(),
            'updated_at' => now(),
        ],

        [
            'name' => 'Programming',
            'slug' => Str::slug('Programming'),
            'image' => 'programming.jpg',
            'description' => 'Coding tutorials and guides',
            'status' => 'active',
            'created_at' => now(),
            'updated_at' => now(),
        ],

        [
            'name' => 'SEO',
            'slug' => Str::slug('SEO'),
            'image' => 'seo.jpg',
            'description' => 'Search engine optimization tips',
            'status' => 'active',
            'created_at' => now(),
            'updated_at' => now(),
        ],

        [
            'name' => 'Web Development',
            'slug' => Str::slug('Web Development'),
            'image' => 'web.jpg',
            'description' => 'Frontend and backend development',
            'status' => 'active',
            'created_at' => now(),
            'updated_at' => now(),
        ],
        
        [
            'name' => 'Digital Marketing',
            'slug' => Str::slug('Digital Marketing'),
            'image' => 'marketing.jpg',
            'description' => 'Online marketing strategies',
            'status' => 'active',
            'created_at' => now(),
            'updated_at' => now(),
        ],
    ]);
}
    
}
