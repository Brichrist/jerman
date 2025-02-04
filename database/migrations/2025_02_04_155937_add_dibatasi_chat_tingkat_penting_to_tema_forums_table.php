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
        Schema::table('tema_forums', function (Blueprint $table) {
            $table->enum('important', [1,0])->default(0);
            $table->enum('locked', ['yes', 'no'])->default('no');
            //
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('tema_forums', function (Blueprint $table) {
            $table->dropColumn('important');
            $table->dropColumn('locked');
            //
        });
    }
};
