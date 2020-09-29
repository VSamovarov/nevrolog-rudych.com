<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableMetadata extends Migration
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
            $table->morphs('model');
            $table->string('group')->default('main')->index();
            $table->string('key')->index();
            $table->json('value')->nullable();
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
