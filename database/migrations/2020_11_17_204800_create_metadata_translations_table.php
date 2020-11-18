<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMetadataTranslationsTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('metadata_translations', function (Blueprint $table) {
      $table->bigIncrements('id');
      $table->unsignedBigInteger('metadata_id')->index();
      $table->foreign('metadata_id')
        ->references('id')->on('metadata')
        ->onDelete('cascade');
      $table->string('lang', 4)->index();
      $table->string('title')->nullable();
      $table->json('localized_value')->nullable();
      $table->unique(['metadata_id', 'lang']);
    });
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down()
  {
    Schema::dropIfExists('metadata_translations');
  }
}