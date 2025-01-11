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
        Schema::create('blogs', function (Blueprint $table) {
            $table->id();
            $table->string('title', 255);
            $table->string('creator', 100)->nullable();
            $table->string('short_description', 255)->nullable();
            $table->text('full_description')->nullable();
            $table->string('cover_image', 255)->nullable();
            $table->boolean('is_published')->default(false);
            $table->date('publish_date')->nullable();
            $table->string('slug', 100)->nullable();
            $table->string('seo_title', 255)->nullable();
            $table->string('seo_keyword', 255)->nullable();
            $table->text('seo_description')->nullable();
            $table->integer('status')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('blogs');
    }
};
