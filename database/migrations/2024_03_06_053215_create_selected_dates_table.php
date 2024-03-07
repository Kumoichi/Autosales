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
        Schema::create('selected_dates', function (Blueprint $table) {
            $table->id();
            $table->string('selected_date_with_day')->default('');
            $table->string('selected_time')->default('');
            $table->string('selected_frequency')->default('');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('selected_dates');
    }
};