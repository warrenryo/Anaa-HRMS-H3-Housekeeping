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
        Schema::create('hrms_h3_maintenance_request', function (Blueprint $table) {
            $table->id();
            $table->string('h3_request_code');
            $table->string('h3_room_no');
            $table->string('h3_maintenance_request');
            $table->longText('h3_additional_request')->nullable();
            $table->string('h3_time_issue');
            $table->string('h3_status')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('h3_maintenance_request');
    }
};
