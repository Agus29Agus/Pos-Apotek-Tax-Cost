<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('sell', function (Blueprint $table) {
            $table->increments('id_sell');
            $table->integer('id_member')->nullable();
            $table->integer('total_item')->default(0);
            $table->integer('total_price')->default(0);
            $table->tinyInteger('discount')->default(0);
            $table->tinyInteger('tax')->default(0);
            $table->integer('pay')->default(0);
            $table->integer('receive')->default(0);
            $table->integer('id_user');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sell');
    }
};
