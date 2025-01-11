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
        Schema::create('contact_messages', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('property_id')->nullable();
            $table->string('name',100);
            $table->string('email',100);
            $table->string('profession',200)->nullable();
            $table->string('subject',100);
            $table->string('contact_number',100);
            $table->text('message');
            $table->boolean('is_seen')->default(false);
            $table->boolean('is_replied')->default(false);
            $table->ipAddress('ip')->nullable();
            $table->string('location',250)->nullable();

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
        Schema::dropIfExists('contact_messages');
    }
};
