<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('beaches', function (Blueprint $table) {
            // Keep your existing `image` (filename) column for now.
            $table->string('image_mime')->nullable()->after('image');
        });

        // Schema builder doesn’t have longBlob()->change() reliably, so use raw SQL:
        DB::statement('ALTER TABLE beaches ADD COLUMN image_blob LONGBLOB NULL AFTER image_mime');
    }

    public function down(): void
    {
        DB::statement('ALTER TABLE beaches DROP COLUMN image_blob');

        Schema::table('beaches', function (Blueprint $table) {
            $table->dropColumn('image_mime');
        });
    }
};
