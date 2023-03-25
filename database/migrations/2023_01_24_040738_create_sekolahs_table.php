<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSekolahsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sekolahs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id');
            $table->string('nama_sekolah');
            $table->string('alamat');
            $table->string('kontak');
            $table->string('no_pic')->unique();
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
        Schema::dropIfExists('sekolahs');
    }
}
