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
        Schema::create('patients', function (Blueprint $table) {
            $table->id();
            $table->string('patient');
            $table->date('birth_date');
            $table->char('gender', 1);
            $table->string('email', 250)->nullable();
            $table->longText('observation')->nullable();
            $table->string('address');
            $table->string('district');
            $table->integer('city_id');
            $table->integer('state_id');
            $table->string('personal_phone', 17); // formato: +55 00 98765-4321
            $table->string('business_phone', 17)->nullable();
            $table->string('cep', 9); // formato: 12345-678
            $table->softDeletes();

            $table->foreign('city_id')->references('id')->on('cities');
            $table->foreign('state_id')->references('id')->on('states');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('patients');
    }
};
