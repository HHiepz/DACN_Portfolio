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
        Schema::create('socials', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('social_category_id');
            $table->string('image_url')->nullable();
            $table->string('name');
            $table->string('type')->nullable();
            $table->string('short_description')->nullable();
            $table->text('description')->nullable();
            $table->tinyInteger('priority')->default(0);
            $table->string('status');
            $table->date('social_started_at')->nullable();
            $table->date('social_ended_at')->nullable();
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('social_category_id')->references('id')->on('social_categories')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('socials');
    }
};
