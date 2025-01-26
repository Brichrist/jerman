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
        Schema::create('vocabs', function (Blueprint $table) {
            $table->id();

            $table->string('kapital')->nullable();
            $table->string('german_word');
            $table->string('word_type')->nullable();
            // $table->string('artikel')->nullable();
            $table->string('meaning');
            // $table->string('plural_form')->nullable();
            // $table->string('present_form')->nullable()->comment('ich/du/er forms');
            // $table->string('partizip_2')->nullable();
            // $table->enum('hilfsverb', ['sein', 'haben'])->nullable();
            // $table->string('case')->nullable()->comment('Akkusativ/Dativ/Genitiv');
            // $table->string('preposition')->nullable();
            // $table->boolean('is_reflexive')->nullable();
            // $table->boolean('is_separable')->nullable()->comment('trennbar');
            // $table->boolean('is_countable')->nullable()->comment('zählbar');
            // $table->text('example')->comment('contoh penggunaan');
            $table->text('additional_notes')->nullable();

            // // Indexes
            $table->index('kapital');
            $table->index('german_word');
            $table->index('meaning');
            $table->index('word_type');


            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vocabs');
    }
};
