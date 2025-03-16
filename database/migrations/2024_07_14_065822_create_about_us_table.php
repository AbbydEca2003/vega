<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAboutUsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('about_us', function (Blueprint $table) {
            $table->string('Company_name');
            $table->id();
            $table->timestamps();
            $table->string('address');
            $table->string('phone');
            $table->string('email');
            $table->string('twitter');
            $table->string('facebook');
            $table->string('linkedin');
            $table->string('privacy_policy');
            $table->string('terms_of_use');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('about_us');
    }
}
