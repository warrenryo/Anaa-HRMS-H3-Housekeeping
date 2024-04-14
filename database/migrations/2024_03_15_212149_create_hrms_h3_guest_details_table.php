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
        Schema::create('hrms_h3_guest_details', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('guest_id');
            $table->string('room_no');
            $table->foreign('guest_id')->references('id')->on('hrms_users')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hrms_h3_guest_details');
    }
};
