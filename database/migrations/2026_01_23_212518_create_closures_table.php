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
        Schema::create('closures', function (Blueprint $table) {
            $table->id();
            $table->foreignId('town_id')->constrained()->onDelete('cascade');
            $table->string('source_text');
            $table->timestamp('detected_at');
            $table->timestamp('last_seen_at');
            $table->boolean('is_active')->default(true);
            $table->timestamps();

            $table->index(['is_active', 'town_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('closures');
    }
};
