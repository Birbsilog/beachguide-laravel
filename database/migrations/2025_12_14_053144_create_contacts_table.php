<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('contacts', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('owner_id');
            $table->string('type');   // phone, email, facebook, etc.
            $table->string('value');  // actual contact detail

            $table->timestamps();

            // Foreign key constraint
            $table->foreign('owner_id')
                  ->references('id')
                  ->on('users')
                  ->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('contacts');
    }
};
