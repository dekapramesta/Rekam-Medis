<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('t_rekammedis', function (Blueprint $table) {
            $table->id();
            // $table->foreignId('id_pasien')
            //     ->constrained('t_pasien')
            //     ->onUpdate('cascade')
            //     ->onDelete('cascade');
            $table->unsignedBigInteger('id_pasien');
            $table->foreign('id_pasien')->references('id_pasien')->on('t_pasien')->onUpdate('cascade')
                ->onDelete('cascade');
            $table->string('keluhan', 30);
            $table->string('diagnosa', 30);
            $table->string('tindakan', 30);
            $table->text('resep_obat');

            $table->foreignId('id_dokter')
                ->constrained('t_dokter')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->foreignId('id_poli')
                ->constrained('t_poliklinik')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->date('tgl_periksa');
            $table->timestamps();
        });
        // Schema::table('t_rekammedis', function (Blueprint $table) {
        // });
    }


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rekam_medis');
    }
};
