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
        Schema::create('hrms_h3_housekeeping_doorlogs', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('doorkey_id');
            $table->string('key_UID');
            $table->integer('room_no');
            $table->foreign('doorkey_id')->references('id')->on('hrms_h3_housekeeping_doorlock_key')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hrms_h3_housekeeping_doorlogs');
    }
};
