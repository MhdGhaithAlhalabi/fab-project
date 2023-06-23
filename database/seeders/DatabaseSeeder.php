<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Product;
use App\Models\Store;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        //\App\Models\User::factory(2)->create();
        \App\Models\Admin::factory()->create([
            'email' => 'test@test.com',
            'password'=> Hash::make('password'),
            'super_admin' => 1
        ]);
        \App\Models\Admin::factory()->create([
            'email' => 'test2@test.com',
            'password'=> Hash::make('password'),
            'super_admin' => 0
        ]);
        // \App\Models\Attribute::factory()->create([
        //     'ar.name' => 'اللون',
        //     'en.name'=> 'color',
        //     'tr.name' => 'tr_color'
        // ]);
        // \App\Models\Attribute::factory()->create([
        //      'ar*.name' => 'الحجم',
        //      'en*.name'=> 'size',
        //      'tr*.name' => 'tr_size'
        // ]);
        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

         //Store::factory(5)->create();
         //Category::factory(10)->create();
        // Product::factory(100)->create();

        // $this->call(UserSeeder::class);
    }
}
