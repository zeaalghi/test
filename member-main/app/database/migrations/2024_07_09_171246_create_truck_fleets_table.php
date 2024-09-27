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
        Schema::create('truck_fleets', function (Blueprint $table) {
            $table->id();
            $table->foreignId('drivers_id')->constrained('drivers')->onDelete('cascade')->onUpdate('cascade');
            $table->integer('capacity');
            $table->integer('loaded_capacity')->default(0);
            $table->string('order_type');
            $table->integer('loaded_capacity');
            $table->foreignId('destinations_id')->constrained('destinations');
            $table->date('departure_date')->nullable();
            $table->date('arrival_date')->nullable();
            $table->string('status')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('fleets');
    }
};
