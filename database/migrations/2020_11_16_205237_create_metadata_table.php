<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMetadataTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('metadata', function (Blueprint $table) {
      $table->bigIncrements('id');
      $table->unsignedBigInteger('post_id')->index();
      $table->foreign('post_id')
        ->references('id')->on('posts')
        ->onDelete('cascade');
      $table->string('_title');
      $table->string('_name')->index();
      $table->longText('_value')->nullable();
      $table->unsignedInteger('order')->default(10);
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
    Schema::dropIfExists('metadata');
  }
}