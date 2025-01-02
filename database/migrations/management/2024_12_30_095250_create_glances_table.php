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
        Schema::create('glances', function (Blueprint $table) {
            $table->id();
            $table->string('title',100)->nullable();
            $table->string('icon', 255)->nullable();
            $table->integer('amount')->nullable();

            $table->string('slug', 255)->unique()->nullable();

            // Meta fields
            $table->unsignedBigInteger('creator')->nullable();
            $table->integer('status')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('glances');
    }
};
