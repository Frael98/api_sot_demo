<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\OTCabecera;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\OTDetalle>
 */
class OTDetalleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $num_actividad = $this->faker->numberBetween(1, 30);
        $nom_actividad = $this->faker->randomElement(['REEMPLAZAR EL FILTRO DE ACEITE Y LIMPIAR REJILLA DE LA TRANSMISION', 'LIMPIE EL FILTRO MAGNETICO DE LA TRANSMISION', 'INSPECCIONE LAS BANDAS Y AJUSTE SI ES NECESARIO']);
        $cod_proveedor = $this->faker->numberBetween(100, 120);
        $cod_tipo_falla = null;
        $nom_tipo_falla = null;
        $estado = null;
        $fec_anula = null;

        return [
            //
            'cod_ot' => OTCabecera::factory(), // alimenta con el id de la cabecer
            'num_actividad' => $num_actividad,
            'nom_actividad' => $nom_actividad,
            'cod_proveedor' => $cod_proveedor,
            'cod_tipo_falla' => $cod_tipo_falla,
            'nom_tipo_falla' => $nom_tipo_falla,
            'estado' => $estado,
            'fec_anula' => $fec_anula
        ];
    }
}
