<?php

namespace Database\Seeders;

use App\Models\Post;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Post::create([
            'user_id' => 1,
            'title' => 'Sarlavha',
            'short_content' => 'Content mazmuni',
            'content' => 'Content matn so\'zlar',
            'photo' => null,
        ]);

        Post::create([
            'user_id' => 1,
            'title' => 'Sarlavha',
            'short_content' => 'Content mazmuni',
            'content' => 'Content matn so\'zlar',
            'photo' => null,
        ]);
    }
}
