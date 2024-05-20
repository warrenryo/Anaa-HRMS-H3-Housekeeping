<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('hrms_h3_work_order_task', function (Blueprint $table) {
            $table->id();
            $table->integer('h3_housekeeping_task_id');
            $table->integer('h3_housekeeper_code');
            $table->string('h3_housekeeper_name');
            $table->string('h3_room_no');
            $table->string('h3_scheduled_time');
            $table->string('h3_housekeeping_request');
            $table->string('h3_items_services');
            $table->string('h3_by_admin')->nullable();
            $table->string('h3_additional_request')->nullable();
            $table->string('h3_proof_image')->nullable();
            $table->string('h3_status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::statement('SET FOREIGN_KEY_CHECKS = 0');
        Schema::dropIfExists('h3_work_order_task');
        DB::statement('SET FOREIGN_KEY_CHECKS = 1');
    }
};
