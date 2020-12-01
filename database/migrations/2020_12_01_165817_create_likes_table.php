<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLikesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('likes', function (Blueprint $table) {
            $table->id();

			$table->unsignedBigInteger('article_id');
			$table->unsignedBigInteger('user_id');
			$table->boolean('status')->default(false);

			$table->timestamps();

			$table->foreign('article_id')->references('id')->on('articles')->onDelete('cascade')->onUpdate('cascade');
			$table->foreign('user_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('likes');
    }
}
