<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGigsCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gigs_categories', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('lang')->nullable();
            $table->string('status')->nullable();
            $table->string('icon_type')->nullable();
            $table->string('icon')->nullable();
            $table->string('img_icon')->nullable();
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
        Schema::dropIfExists('gigs_categories');
    }
}
