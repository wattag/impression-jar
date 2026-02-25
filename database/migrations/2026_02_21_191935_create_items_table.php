<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('items', static function (Blueprint $table) {
            $table->id();
            $table->foreignId('content_type_id')
                ->constrained()
                ->cascadeOnDelete();
            $table->string('title');
            $table->text('description')
                ->nullable();
            $table->date('release_date')
                ->nullable();
            $table->timestamps();

            $table->index(['content_type_id', 'title']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('items');
    }
};
