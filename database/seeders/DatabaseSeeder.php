<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();
        // comentado - 04/05/2025
        /* User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
            'password' => Hash::make('pass123')
        ]); */
        // Solo llenamos la cabecera y por la propiedad de hasmany se llenara tambien el detalle
        $this->call(OTCabeceraSeeder::class);
    }
}
