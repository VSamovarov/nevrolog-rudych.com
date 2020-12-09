<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMenuTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('menu', function (Blueprint $table) {
        $table->bigIncrements('id');
        $table->unsignedInteger('order')->default(10);
        $table->string('url');
        $table->string('slug');
        $table->nestedSet();
      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
      Schema::dropIfExists('menu');
    }
}