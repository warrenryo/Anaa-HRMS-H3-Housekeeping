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
        Schema::create('h3_housekeeper_reports', function (Blueprint $table) {
            $table->id();
            $table->string('h3_housekeeper');
            $table->string('h3_report_type');
            $table->TEXT('h3_specify')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('h3_housekeeper_reports');
    }
};
