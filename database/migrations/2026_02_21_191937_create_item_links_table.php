<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('item_links', static function (Blueprint $table) {
            $table->id();
            $table->foreignId('item_id')
                ->constrained()
                ->cascadeOnDelete();
            $table->unsignedTinyInteger('type');
            $table->string('title')
                ->nullable();
            $table->string('url');
            $table->timestamps();


            $table->index(['item_id', 'type']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('item_links');
    }
};
