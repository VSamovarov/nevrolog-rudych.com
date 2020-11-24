<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSettingDescriptionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('setting_descriptions', function (Blueprint $table) {
        $table->bigIncrements('id');
        $table->unsignedBigInteger('setting_id')->index();
        $table->foreign('setting_id')
          ->references('id')->on('settings')
          ->onDelete('cascade');
        $table->string('title')->nullable();
        $table->text('description')->nullable();
      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('setting_descriptions');
    }
}