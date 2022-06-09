<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDatabooksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('databooks', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('judul');
            $table->string('penulis');
            $table->string('genre')->nullable();
            $table->string('deskripsi')->nullable();
            $table->bigInteger('stok');
            $table->bigInteger('harga');
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
        Schema::dropIfExists('databooks');
    }
}
