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
        Schema::create('hrms_h3_maintenance_work_order_item', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('h3_m_task_id');
            $table->integer('h3_m_inventory');
            $table->string('h3_items');
            $table->integer('h3_quantity');
            $table->foreign('h3_m_task_id')->references('id')->on('hrms_h3_maintenance_work_order')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('h3_maintenance_work_order_item');
    }
};
