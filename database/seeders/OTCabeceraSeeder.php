<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\OTCabecera;

class OTCabeceraSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // con detalle gracias a la relacion otDetalle definida en el modelo
        OTCabecera::factory()->count(5)->hasOtDetalle()->create();
    }
}
