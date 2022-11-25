<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Post;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Post::factory(8)->create();
        $this->call(RoleSeeder::class);
        $this->call(writerSeeder::class);
        $this->call(EditorSeeder::class);
        $this->call(PublisherSeeder::class);
        $this->call(AdminSeeder::class);
    }
}
