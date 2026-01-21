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
    Schema::create('inquiries', function (Blueprint $table) {
        $table->id();
        $table->foreignId('beach_id')->constrained()->onDelete('cascade'); // Link to beach
        $table->foreignId('user_id')->constrained()->onDelete('cascade');  // Who sent the inquiry
        $table->foreignId('owner_id')->constrained('users')->onDelete('cascade'); // The beach owner
        $table->string('subject');
        $table->text('message');
        $table->enum('status', ['pending', 'answered'])->default('pending');
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('inquiries');
    }
};
