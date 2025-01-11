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
        Schema::create('property_floor_plan_categories', function (Blueprint $table) {
            $table->id(); 
            $table->unsignedBigInteger('property_id');
            $table->string('title',200);

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
        Schema::dropIfExists('property_floor_plan_categories');
    }
};
