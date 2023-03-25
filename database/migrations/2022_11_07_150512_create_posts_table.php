<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->id();//buat primary key
            $table->foreignId('post_category_id');//fk buat tabel post category
            $table->string('title');
            $table->string('slug')->unique;
            $table->string('image')->nullable();
            $table->text('excerpt');//buat nampilin beberapa baris tulisan trs nanti ada read more
            $table->text('body');
            $table->timestamp('published_at')->nullable();
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
        Schema::dropIfExists('posts');
    }
}
