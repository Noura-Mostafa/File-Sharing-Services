<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('files', function (Blueprint $table) {
            $table->id();
            $table->string('filepath')->nullable();
            $table->string('title', 255)->nullable();
            $table->string('message', 255)->nullable();
            $table->string('unique_link')->unique();
            $table->timestamp('expiration')->nullable();
            $table->integer('download_count')->default(0);
            $table->foreignId('user_id')
                ->nullable()
                ->constrained()
                ->nullOnDelete();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('files');
    }
};
