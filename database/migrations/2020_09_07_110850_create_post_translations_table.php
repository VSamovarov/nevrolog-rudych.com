<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('post_translations', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('post_id')->index();
            $table->foreign('post_id')
                ->references('id')->on('posts')
                ->onDelete('cascade');
            $table->string('lang', 4)->index();
            $table->string('title')->nullable();
            $table->longText('content')->nullable();
            $table->text('excerpt')->nullable();
            $table->string('metatitle')->nullable();
            $table->text('metadescription')->nullable();
            $table->string('metakeys')->nullable();
            $table->string('slug')->nullable();
            $table->unique(['post_id', 'lang']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('post_translations');
    }
}