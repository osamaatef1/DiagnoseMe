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
        Schema::create('condition_symptoms', function (Blueprint $table) {
            $table->id();
            $table->foreignId('condition_id')->constrained('condition')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('symptom_id')->constrained('symptoms')->cascadeOnDelete()->cascadeOnUpdate();
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
        Schema::dropIfExists('condition_symptoms');
    }
};
