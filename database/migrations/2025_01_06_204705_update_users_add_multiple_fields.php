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
        Schema::table('users', function (Blueprint $table) {
            $table->string('image_url')->nullable();
            $table->string('first_name')->nullable();
            $table->string('last_name')->nullable();
            $table->text('description')->nullable();
            $table->string('phone_number')->nullable();
            $table->string('country')->nullable();
            $table->string('address')->nullable();
            $table->string('major')->nullable();
            $table->text('iframe_google_map')->nullable();
            $table->date('birthday')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn(['image_url', 'first_name', 'last_name', 'description', 'birthday', 'address', 'phone_number', 'country', 'major', 'iframe_google_map']);
        });
    }
};
