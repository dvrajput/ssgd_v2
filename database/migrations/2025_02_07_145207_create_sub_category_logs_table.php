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
        Schema::create('sub_category_logs', function (Blueprint $table) {
            $table->id();
            $table->string('sub_category_code')->nullable();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->string('action');
            $table->json('changes')->nullable();
            $table->string('ip_address')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sub_category_logs');
    }
};
