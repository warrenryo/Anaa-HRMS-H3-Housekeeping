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
        Schema::create('hrms_h3_maintenance_work_order', function (Blueprint $table) {
            $table->id();
            $table->integer('h3_maintenance_task_id');
            $table->integer('h3_maintenance_staff_code');
            $table->string('h3_maintenance_staff_name');
            $table->string('h3_scheduled_time');
            $table->string('h3_room_no');
            $table->string('h3_maintenance_request');
            $table->string('h3_additional_request');
            $table->string('h3_status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('h3_maintenance_work_order');
    }
};
