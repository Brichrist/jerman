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
        Schema::create('redemittels', function (Blueprint $table) {
            $table->id();

            $table->string('kapital')->nullable();
            $table->string('de');
            $table->string('idn')->nullable();
            $table->string('tag')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('redemittels');
    }
};
