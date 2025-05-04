<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('ot_detalles', function (Blueprint $table) {
            $table->id();
            $table->integer('cod_ot'); // Codigo de la OT
            $table->integer('num_actividad'); // en original foreign key
            $table->string('nom_actividad');
            //$table->char('tipo_ot'); // en original foreign key
            $table->integer('cod_proveedor');
            $table->string('nom_proveedor'); // default string lenght 255
            $table->integer('cod_tipo_falla');
            $table->string('nom_tipo_falla');
            $table->string('estado');
            $table->dateTime('fec_anula');
            // columnas de auditoria
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('o_t_detalles');
    }
};
