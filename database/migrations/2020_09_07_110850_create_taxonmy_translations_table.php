<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTimetableContentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('taxonomy_translations', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('taxonomy_id')->index();
            $table->foreign('taxonomy_id')
                ->references('id')->on('taxonomies')
                ->onDelete('cascade');
            $table->string('lang', 4)->index();
            $table->string('title')->nullable();
            $table->longText('content')->nullable();
            $table->text('excerpt')->nullable();
            $table->string('metatitle')->nullable();
            $table->string('metadescription')->nullable();
            $table->string('metakeys')->nullable();
            $table->string('slug')->nullable();
            $table->unique(['taxonomy_id', 'lang']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('timetable_contents');
    }
}
