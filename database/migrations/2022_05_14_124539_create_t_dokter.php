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
        Schema::create('t_dokter', function (Blueprint $table) {
            // $table->id('id');
            $table->unsignedBigInteger('id', false)->primary();
            $table->string('nama_dokter', 50);
            $table->string('spesialis', 20);
            $table->string('no_telp', 20);
            $table->string('alamat', 50);
            $table->foreignId('id_poli')
                ->constrained('t_poliklinik')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->foreignId('id_user')
                ->constrained('t_user')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('t_dokter');
    }
};
