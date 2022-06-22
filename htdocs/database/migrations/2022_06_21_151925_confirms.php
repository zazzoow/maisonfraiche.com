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
      Schema::create('confirms', function (Blueprint $table) {

          $table->id();

          $table->string('name')->nullable();

          $table->string('userid')->nullable();

          $table->string('email')->nullable();

          $table->timestamps();

      });
    }

    public function down()
    {
      Schema::dropIfExists('confirms');
    }
};
