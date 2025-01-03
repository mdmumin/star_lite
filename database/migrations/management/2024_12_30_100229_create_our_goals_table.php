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
        Schema::create('our_goals', function (Blueprint $table) {
            $table->id();

            // Content fields
            $table->string('title', 100)->nullable();
            $table->string('icon', 255)->nullable();
            $table->string('sub_title', 100)->nullable();
            $table->text('short_description')->nullable();
            $table->text('description')->nullable();

            $table->string('slug', 255)->nullable()->unique();

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
        Schema::dropIfExists('our_goals');
    }
};
