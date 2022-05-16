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
            $table->id('id');
            $table->string('nama_dokter', 50);
            $table->string('spesialis', 20);
            $table->string('no_telp', 20);
            $table->string('alamat', 50);
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
