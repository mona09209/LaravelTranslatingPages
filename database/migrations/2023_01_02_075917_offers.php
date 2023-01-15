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
       
        Schema::create('offers', function (Blueprint $table) {
            $table->id();
            $table->string('name_ar');
            $table->string('name_en');
            $table->string('photo');
            $table->string('price');
            $table->text('details_ar');
            $table->text('details_en');
         
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
        Schema::dropIfExists('offers');
    }
};
