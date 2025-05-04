<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\OTCabecera>
 */
class OTCabeceraFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $tipo_ot = $this->faker->randomElement(["C", "P"]);
        $cod_equipo = $this->faker->numberBetween(200, 400);
        $nom_equipo = $this->faker->randomElement(['motor', 'refrigerador', 'laptop']);
        $nom_marca = $this->faker->randomElement(['indurama', 'lenovo', 'hyundai']);
        $usa_medidor = $this->faker->randomElement(['N', 'S']);
        $fec_programa = $this->faker->dateTimeThisDecade();

        $estado = $this->faker->randomElement(['A', 'C', 'E']);
        $fec_fina = $estado === 'C' ? $this->faker->dateTimeThisDecade() : null;
        $cod_empresa = $this->faker->numberBetween(0, 2);


        return [
            //
            'tipo_ot' => $tipo_ot,
            'cod_equipo' => $cod_equipo,
            'nom_equipo' => $nom_equipo,
            'nom_marca' => $nom_marca,
            'usa_medidor' => $usa_medidor,
            'fec_programado_para' => $fec_programa,
            'fec_finaliza' => $fec_fina,
            'estado' => $estado,
            'cod_empresa' => $cod_empresa,
        ];
    }
}
