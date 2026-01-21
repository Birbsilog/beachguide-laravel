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
        Schema::table('beaches', function (Blueprint $table) {
            $table->enum('status', ['pending', 'approved', 'denied'])
                  ->default('pending')
                  ->after('description'); // adjust column position if needed
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('beaches', function (Blueprint $table) {
            $table->dropColumn('status');
        });
    }
};
