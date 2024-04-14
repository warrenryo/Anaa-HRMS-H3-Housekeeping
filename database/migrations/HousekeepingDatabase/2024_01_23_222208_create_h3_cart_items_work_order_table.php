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
        Schema::create('hrms_h3_cart_items_work_order', function (Blueprint $table) {
            $table->id();
            $table->integer('h3_h_request_code');
            $table->integer('h3_inventory_item_id');
            $table->integer('h3_quantity');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('h3_cart_items_work_order');
    }
};
