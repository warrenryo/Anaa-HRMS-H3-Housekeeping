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
        Schema::create('hrms_h3_work_order_task_item', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('h3_task_id');
            $table->integer('h3_h_inventory_id');
            $table->string('h3_items');
            $table->integer('h3_quantity');
            $table->foreign('h3_task_id')->references('id')->on('hrms_h3_work_order_task')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::statement('SET FOREIGN_KEY_CHECKS = 0');
        Schema::dropIfExists('h3_work_order_task_item');
        DB::statement('SET FOREIGN_KEY_CHECKS = 1');
    }
};
