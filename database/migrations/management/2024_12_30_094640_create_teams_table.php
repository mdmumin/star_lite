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
        Schema::create('teams', function (Blueprint $table) {
            $table->id();
            $table->string('name', 100);
            $table->string('designation', 100);
            $table->string('image', 100)->nullable();
            $table->string('contact_number', 100)->nullable();
            $table->string('email', 100)->unique();
            $table->text('short_description')->nullable();
            $table->text('description')->nullable();
            $table->string('facebook', 100)->nullable()->default('#');
            $table->string('linkedin', 100)->nullable()->default('#');
            $table->string('instagram', 100)->nullable()->default('#');
            $table->string('whatsapp', 100)->nullable()->default('#');
            $table->string('telegram', 100)->nullable()->default('#');

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
        Schema::dropIfExists('teams');
    }
};
