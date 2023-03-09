<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetailPerpusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detail_perpus', function (Blueprint $table) {
            $table->id();
            $table->string('id_user',4);
            $table->string('id_perpus',4);
            $table->integer('pengunjung');
            $table->integer('member');
            $table->integer('peminjaman');
            $table->string('judul',12);
            $table->string('eksemplar',12);
            $table->string('tahun',4);
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
        Schema::dropIfExists('detail_perpus');
    }
}
