<?php

namespace Database\Seeders;
use App\Models\Tag;
use Illuminate\Support\Str;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TagsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
      public function run(): void
    {
        $tags = [
            'AI',
            'Laravel',
            'PHP',
            'Web Development',
            'SEO'
        ];

        foreach ($tags as $tag) {
            Tag::create([
                'name' => $tag,
                'slug' => Str::slug($tag)
            ]);
        }
    }
}
