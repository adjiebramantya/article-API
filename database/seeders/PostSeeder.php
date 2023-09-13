<?php

namespace Database\Seeders;

use App\Models\Post;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i=1; $i<=10 ; $i++) {
            Post::create([
                'title' => 'Lorem ipsum blandit.',
                'content' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus quis quam sollicitudin, fringilla sapien ut, luctus metus. Sed felis odio, maximus in iaculis ac, pellentesque a nibh. In et cras amet.',
                'category' => 'Lorem ipsum',
                'status' => 'publish'
            ]);
        }
    }
}
