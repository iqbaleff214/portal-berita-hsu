<?php

namespace Database\Seeders;

use App\Models\News;
use App\Models\User;
use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::factory(3)->create();
        User::create([
            'name' => 'Marjuni',
            'email' => 'admin@admin.io',
            'email_verified_at' => now(),
            'password' => Hash::make('admin'), // password
            'remember_token' => Str::random(10),
        ]);
        Category::create([
            'category' => 'Berita'
        ]);
        Category::create([
            'category' => 'Pengumuman'
        ]);
        Category::create([
            'category' => 'Info'
        ]);
        News::factory(7)->create();
    }
}
