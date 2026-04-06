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
        Schema::create('comments', function (Blueprint $table) {
            $table->id();

            $table->foreignId('post_id')->constrained()->cascadeOnDelete();

            // User (optional)
            $table->foreignId('user_id')->nullable()->constrained()->nullOnDelete();

            // Guest comment support
            $table->string('name')->nullable();
            $table->string('email')->nullable();

            $table->text('comment');

            // Reply system
            $table->foreignId('parent_id')->nullable()->constrained('comments')->cascadeOnDelete();

            // Moderation
            $table->enum('status', ['pending','approved','spam'])->default('pending');

            // Extra features
            $table->ipAddress('ip_address')->nullable();
            $table->boolean('is_edited')->default(false);

            $table->timestamps();
});
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('comments');
    }
};
