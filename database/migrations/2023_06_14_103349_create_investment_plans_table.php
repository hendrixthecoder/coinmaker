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
        Schema::create('investment_plans', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('plan_name');
            $table->integer('plan_user_id')->nullable();
            $table->integer('min_deposit');
            $table->integer('max_deposit');
            $table->integer('duration');
            $table->float('daily_earnings');
            $table->integer('minimum_withdrawal');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('investment_plans');
    }
};