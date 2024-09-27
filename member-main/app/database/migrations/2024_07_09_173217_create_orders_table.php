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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->foreignId('users_id')->constrained('users')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('truck_fleets_id')->constrained('fleets')->onDelete('cascade')->onUpdate('cascade');
            $table->string('order_type');
            $table->string('payload');
            $table->float('payload_weight');
            $table->foreignId('pickup_location')->constrained('destinations')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('delivery_destination')->constrained('destinations')->onDelete('cascade')->onUpdate('cascade');
            $table->double('price', 10, 2);
            $table->string('negotiation')->nullable();
            $table->string('status');
            $table->string('note')->nullable();
            $table->date('order_date');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
