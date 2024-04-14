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
        Schema::create('hrms_h3_housekeeping_staff', function (Blueprint $table) {
            $table->id();
            $table->string('h3_staff_code');
            $table->string('h3_staffName');
            $table->string('h3_email');
            $table->string('h3_position');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('h3_housekeeping_staff');
    }
};
