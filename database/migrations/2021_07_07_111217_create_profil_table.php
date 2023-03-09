<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProfilTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profil', function (Blueprint $table) {
            $table->id();
            $table->string('id_user');
            $table->string('id_perpus');
            $table->string('nmlembaga');
            $table->string('nmpenanggungJawab');
            $table->string('nmpengelola');
            $table->string('telepon');
            $table->string('alamat');
            $table->string('skpendirian');
            $table->string('jambuka');
            $table->string('facebook')->nullable();
            $table->string('instagram')->nullable();
            $table->string('logo')->nullable();
            $table->string('deskripsi');
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
        Schema::dropIfExists('profil');
    }
}
