<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('contacts', function (Blueprint $table) {
            // Only add the column if it doesn't exist
            if (!Schema::hasColumn('contacts', 'beach_id')) {
                $table->unsignedBigInteger('beach_id')
                      ->nullable()
                      ->after('id');

                $table->foreign('beach_id')
                      ->references('id')
                      ->on('beaches')
                      ->onDelete('cascade');
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::table('contacts', function (Blueprint $table) {
            if (Schema::hasColumn('contacts', 'beach_id')) {
                $table->dropForeign(['beach_id']);
                $table->dropColumn('beach_id');
            }
        });
    }
};
