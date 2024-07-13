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
        Schema::create('contributions', function (Blueprint $table) {
            $table->id();
            $table->string('contribution_type');
            $table->string('contribution_address');
            $table->string('name');
            $table->text('description')->nullable();
            $table->date('starts');
            $table->date('ends');
            $table->string('frequency')->nullable();
            $table->integer('duration')->nullable();
            $table->string('duration_type')->nullable();
            $table->string('amount_type')->nullable();
            $table->string('amount')->nullable();
            $table->integer('status')->default(0);
            $table->boolean('reminder')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contributions');
    }
};
