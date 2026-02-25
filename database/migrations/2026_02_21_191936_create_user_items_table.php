<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('user_items', static function (Blueprint $table) {
            $table->foreignId('user_id')
                ->constrained()
                ->cascadeOnDelete();
            $table->foreignId('item_id')
                ->constrained()
                ->cascadeOnDelete();
            $table->unsignedInteger('rating')
                ->nullable();
            $table->date('started_at')
                ->nullable();
            $table->date('completed_at')
                ->nullable();
            $table->text('notes')
                ->nullable();

            $table->unique(['user_id', 'item_id']);
            $table->index(['user_id', 'rating']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('user_items');
    }
};
