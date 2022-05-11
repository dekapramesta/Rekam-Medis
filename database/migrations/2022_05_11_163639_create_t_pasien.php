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
        Schema::create('t_pasien', function (Blueprint $table) {
            $table->id('id_pasien');
            $table->string('nama_pasien', 50);
            $table->enum('gender', ['Pria', 'Wanita']);
            $table->string('email', 50);
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
        Schema::dropIfExists('t_pasien');
    }
};
