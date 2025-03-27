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
        Schema::disableForeignKeyConstraints();

        Schema::create('chapters', function (Blueprint $table) {
            $table->id();
            $table->foreignId('chapterId');
            $table->string('chapterTitle');
            $table->text('content');
            $table->integer('chapterNumber');
            $table->timestamp('create_at')->nullable();
            $table->timestamp('update_at')->nullable();
            $table->integer('status')->default(0);
            $table->foreignId('story_id')->constrained();
            $table->timestamps();
        });

        Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('chapters');
    }
};
