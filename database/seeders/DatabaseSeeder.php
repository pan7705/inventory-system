<?php

namespace Database\Seeders;

use App\Models\Item;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Type;
use App\Models\User;
use App\Models\Color;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::create([
            'name' => 'irfan',
            'email' => 'irfanhaqim4039@gmail.com',
            'password' => bcrypt('password'),
        ]);

        Type::create([
            'name' => 'Electronics',
        ]);

        Color::create([
            'name' => 'red',
        ]);

        Item::create([
            'user_id' => User::where('name', 'irfan')->first()->id,
            'uuid' => Str::uuid(),
            'name' => 'Laptop',
            'type_id' => Type::where('name', 'Electronics')->first()->id,
            'color_id' => Color::where('name', 'Red')->first()->id,
            'quantity' => '2',
        ]);
    }
}
