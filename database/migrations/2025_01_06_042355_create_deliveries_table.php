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
        Schema::create('deliveries', function (Blueprint $table) {
            $table->id();
            $table->string('deliveryId');
            $table->string('pAddress');
            $table->string('pName');
            $table->string('pPhone');
            $table->string('pEmail')->nullable();
            $table->string('dName');
            $table->string('dPhone');
            $table->string('dAddress');
            $table->string('dEmail')->nullable();
            $table->string('tOfGood');
            $table->string('dProvider');
            $table->string('priority');
            $table->string('sPickDate');
            $table->string('sPickTime');
            $table->bigInteger('isActive');
            $table->bigInteger('status');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('deliveries');
    }
};
