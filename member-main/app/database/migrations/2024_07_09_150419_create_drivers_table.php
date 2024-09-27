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
        Schema::create('drivers', function (Blueprint $table) {
            $table->id();
            $table->foreignId('users_id')->constrained('users')->onDelete('cascade')->onUpdate('cascade');
            $table->integer('memberbatch');
            $table->string('memberid');
            $table->string('idcard');
            $table->string('fullname');
            $table->string('gender');
            $table->string('birthloc');
            $table->date('birthdate');
            $table->string('phone');
            $table->text('address');
            $table->string('lisence');
            $table->string('insurance');
            $table->tinyInteger('status')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('drivers');
    }
};
