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
        Schema::create('role_user1', function (Blueprint $table) {
            $table->unsignedBigInteger('user1_id');
            $table->unsignedBigInteger('role_id');
            $table->timestamps();
        
            // Tạo foreign key cho cột user_id
            $table->foreign('user1_id')->references('id')->on('user1s')->onDelete('cascade');
        
            // Tạo foreign key cho cột role_id
            $table->foreign('role_id')->references('id')->on('roles')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {     
        Schema::create('role_user1', function (Blueprint $table) {
            $table->unsignedBigInteger('user1_id');
            $table->unsignedBigInteger('role_id');
            $table->timestamps();

            $table->foreign('user1_id')->references('id')->on('user1')->onDelete('cascade');
            $table->foreign('role_id')->references('id')->on('roles')->onDelete('cascade');
        });
        
        Schema::dropIfExists('role_user1');
    }
};
