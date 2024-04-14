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
        Schema::create('hrms_h3_h_inventory_items', function (Blueprint $table) {
            $table->id();
            $table->string('h3_category_name');
            $table->string('h3_item_name');
            $table->string('h3_quantity');
            $table->string('h3_status')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('h3_h_inventory_items');
    }
};
