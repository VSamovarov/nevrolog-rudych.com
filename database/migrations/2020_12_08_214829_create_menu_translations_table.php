<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMenuTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('menu_translations', function (Blueprint $table) {
          $table->bigIncrements('id');
          $table->unsignedBigInteger('menu_id')->index();
          $table->foreign('menu_id')
            ->references('id')->on('menu')
            ->onDelete('cascade');
          $table->string('lang', 4)->index();
          $table->string('title')->nullable();
          $table->unique(['menu_id', 'lang']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('menu_translations');
    }
}