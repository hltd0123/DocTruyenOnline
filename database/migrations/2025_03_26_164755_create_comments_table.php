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

        Schema::create('comments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('commentId');
            $table->text('content');
            $table->timestamp('create_at')->nullable();
            $table->timestamp('update_at')->nullable();
            $table->integer('status')->default(0);
            $table->foreignId('account_id')->constrained();
            $table->foreignId('story_id')->nullable()->constrained();
            $table->foreignId('chapter_id')->nullable()->constrained();
            $table->timestamps();
        });

        Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('comments');
    }
};
