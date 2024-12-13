<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::create('aircrafts', function (Blueprint $table) {
        $table->id();
        $table->string('registration')->unique(); // Registration
        $table->string('program');               // Program
        $table->string('serial_number')->unique(); // Serial No.
        $table->string('manufacturer_model');    // Manuf Model
        $table->integer('total_hours');          // Total Hours
        $table->date('total_hours_date');        // Date for Total Hours
        $table->integer('total_cycles');         // Total Cycles
        $table->date('total_cycles_date');       // Date for Total Cycles
        $table->date('date_of_manufacture');     // Date Mfg
        $table->timestamps();
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('aircrafts');
    }
};
