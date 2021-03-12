<?php

namespace Database\Seeders;

use App\Models\Tag;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class TagsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tags = collect(
            ['Programming', 'Learning', 'Library', 'Framework', 'Tips', 'Entertainment', 'Daily', 'News', 'Hot', 'Tool', 'Travel', 'Documentation',
                'Creative', 'Opinion', 'Quotes', 'Motivation', 'Life', 'Diary', 'Emotional', 'Helper',
                'Java', 'PHP', 'Python', 'Javascript', 'Dart', 'CPP', 'C', 'Kotlin', 'Android', 'Spring', 'Spring Boot', 'Laravel', 'Symfony', 'Codeigniter', 'Jetstream',
                'Sanctum', 'Livewire', 'Vue JS', 'React JS', 'Node JS', 'Tailwind CSS', 'Bootstrap', 'Git', 'Github', 'Database', 'MySQL', 'PostgreSQL',
                'SEO', 'Hosting', 'VPS', 'AWS', 'Cloud']
        );
        $tags->each(function ($tag) {
            Tag::create([
                'tag_name' => $tag,
                'tag_slug' => Str::slug($tag),
            ]);
        });
    }
}
