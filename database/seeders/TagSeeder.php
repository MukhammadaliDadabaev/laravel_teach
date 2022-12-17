<?php

namespace Database\Seeders;

use App\Models\Tag;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tags = [
            ['name' => 'Design'],
            ['name' => 'Development'],
            ['name' => 'SEO'],
            ['name' => 'Marketing'],
            ['name' => 'Consulting'],
            ['name' => 'Reading'],
            ['name' => 'Writing'],
        ];

        Tag::insert($tags);
    }
}
