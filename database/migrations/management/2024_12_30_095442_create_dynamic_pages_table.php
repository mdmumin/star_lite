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
        Schema::create('dynamic_pages', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('parent_id')->default(0); 
            $table->string('title', 255)->nullable();
            $table->string('page_url', 255)->unique(); 
            $table->string('subtitle', 255)->nullable();
            $table->text('description')->nullable();
            $table->string('image', 255)->nullable();
            $table->string('meta_title', 255)->nullable();
            $table->text('meta_description')->nullable();
            $table->text('meta_keywords')->nullable();
            $table->string('meta_image', 255)->nullable();
            $table->text('page_css')->nullable(); 
            $table->text('page_script')->nullable();

            $table->unsignedBigInteger('creator')->nullable();
            $table->string('slug',100)->nullable();
            $table->integer('status')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dynamic_pages');
    }
};
