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
        Schema::create('medical_care', function (Blueprint $table) {
            $table->id();
            $table->integer('patient_id');
            $table->boolean('served')->default(false);
            $table->string('description');
            $table->longText('observation')->nullable();
            $table->date('service_dt');
            $table->time('service_hr');
            $table->string('duration');
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('patient_id')->references('id')->on('patients');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('medical_care');
    }
};
