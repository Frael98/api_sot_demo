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
        Schema::create('ot_cabeceras', function (Blueprint $table) {
            $table->id();
            $table->string('tipo_ot');
            $table->integer('cod_equipo');
            $table->string('nom_equipo');
            $table->string('nom_marca');
            $table->char('usa_medidor');
            $table->dateTime('fec_programado_para');
            $table->dateTime('fec_finaliza');
            $table->char('estado');
            $table->integer('cod_empresa');
            // Timestamps columns de auditoria
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('o_t_cabeceras');
    }
};
