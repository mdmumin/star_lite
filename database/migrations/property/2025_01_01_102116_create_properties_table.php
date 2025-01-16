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
        Schema::create('properties', function (Blueprint $table) {
            $table->id();
            $table->string('title', 255)->nullable();
            $table->string('creator', 100)->nullable();
            $table->text('short_description')->nullable();
            $table->text('full_description')->nullable();
            $table->string('cover_image', 255)->nullable();
            $table->boolean('is_published')->default(false);
            $table->timestamp('publish_date')->nullable();
            $table->string('slug', 100)->nullable();
            $table->string('seo_title', 255)->nullable();
            $table->string('seo_keyword', 255)->nullable();
            $table->text('seo_description')->nullable();
            $table->boolean('is_closed')->default(false);
            $table->integer('total_plot')->nullable();
            $table->integer('total_flat')->nullable();
            $table->integer('total_plot_sold')->nullable();
            $table->integer('total_flat_sold')->nullable();
            $table->text('available_text')->nullable();
            $table->integer('status')->default(1);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('properties');
    }
};
