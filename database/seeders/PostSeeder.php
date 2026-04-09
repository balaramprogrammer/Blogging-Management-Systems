<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Post;
use Carbon\Carbon;
class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        
         Post::insert([
        [
            'title' => 'Java Introduction',
            'slug' => 'introduction-to-ai',
            'category_id' => 1,
            'content' => 'Artificial Intelligence (AI) is transforming the world...',
            'featured_image' => '1772800180.jpg',
            'meta_title' => 'Java Introduction',
            'meta_description' => 'Learn basics of AI',
            'meta_keywords' => 'ai, technology',
            'blogger_id' => '1',
            'views' => 120,
            'status' => 'published',
            'published_at' => Carbon::now(),
            'created_at' => now(),
            'updated_at' => now(),
        ],
        [
            'title' => 'Laravel for Beginners',
            'slug' => 'laravel-for-beginners',
            'category_id' => 1,
            'content' => 'Laravel is a powerful PHP framework...',
            'featured_image' => '1775347256.jpg',
            'meta_title' => 'Laravel Guide',
            'meta_description' => 'Beginner guide to Laravel',
            'meta_keywords' => 'laravel, php',
            'blogger_id' => '2',
            'views' => 90,
            'status' => 'published',
            'published_at' => Carbon::now(),
            'created_at' => now(),
            'updated_at' => now(),
        ],
        [
            'title' => 'Top 10 Programming Languages',
            'slug' => 'top-10-programming-languages',
            'category_id' => 2,
            'content' => 'Here are the top 10 programming languages...',
            'featured_image' => '1775517127.jpg',
            'meta_title' => 'Top Programming Languages',
            'meta_description' => 'Best languages to learn',
            'meta_keywords' => 'programming, coding',
            'blogger_id' => '1',
            'views' => 200,
            'status' => 'published',
            'published_at' => Carbon::now(),
            'created_at' => now(),
            'updated_at' => now(),
        ],
        [
            'title' => 'Future of Web Development',
            'slug' => 'future-of-web-development',
            'category_id' => 2,
            'content' => 'Web development is evolving rapidly...',
            'featured_image' => '1775509605.png',
            'meta_title' => 'Future Web Dev',
            'meta_description' => 'Trends in web development',
            'meta_keywords' => 'web, development',
            'blogger_id' => '3',
            'views' => 75,
            'status' => 'draft',
            'published_at' => null,
            'created_at' => now(),
            'updated_at' => now(),
        ],
        [
            'title' => 'SEO Tips for Bloggers',
            'slug' => 'seo-tips-for-bloggers',
            'category_id' => 3,
            'content' => 'SEO is important for blog growth...',
            'featured_image' => '1772736535.jpg',
            'meta_title' => 'SEO Tips',
            'meta_description' => 'Improve your blog SEO',
            'meta_keywords' => 'seo, blogging',
            'blogger_id' => '2',
            'views' => 150,
            'status' => 'published',
            'published_at' => Carbon::now(),
            'created_at' => now(),
            'updated_at' => now(),
        ],
    ]);
    }
}
