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
        Schema::create('faqs', function (Blueprint $table) {
            $table->id();
             // Content fields
             $table->string('title', 100)->nullable();
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
        Schema::dropIfExists('faqs');
    }
};
