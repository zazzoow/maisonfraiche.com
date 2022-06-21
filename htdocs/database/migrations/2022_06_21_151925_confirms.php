<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('confirm', function (Blueprint $table) {

          $table->id();

          $table->string('fistname');

          $table->string('lastname');

          $table->string('email');

          $table->string('phone')->nullable();

          $table->text('message');

          $table->timestamps();

      });
    }

    public function down()
    {
      Schema::dropIfExists('confirm');
    }
};
