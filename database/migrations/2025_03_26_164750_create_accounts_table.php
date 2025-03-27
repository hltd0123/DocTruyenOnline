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
        Schema::create('accounts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('acId');
            $table->string('userName');
            $table->string('email');
            $table->string('password');
            $table->integer('role');
            $table->timestamp('create_at')->nullable();
            $table->timestamp('update_at')->nullable();
            $table->integer('status')->default(0);
            $table->string('comments')->comment();
            $table->string('favorites');
            $table->string('views');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('accounts');
    }
};
