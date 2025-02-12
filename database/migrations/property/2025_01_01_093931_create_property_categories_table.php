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
        Schema::create('property_categories', function (Blueprint $table) {
            $table->id();
            $table->string('title', 255)->nullable();
            $table->string('image', 255)->nullable();

            $table->unsignedBigInteger('creator')->nullable();
            $table->string('slug',100)->nullable();
            $table->integer('status')->default(1);
            
            $table->timestamps();
        });

        Schema::create('properties_property_categories', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('properties_id');
            $table->unsignedBigInteger('property_categories_id');

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
        Schema::dropIfExists('property_categories');
        Schema::dropIfExists('property_category_properties');
    }
};
