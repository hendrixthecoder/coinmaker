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
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('email');
            $table->string('type');
            $table->integer('amount');
            $table->string('source')->nullable();
            $table->string('receive_details')->nullable();
            $table->string('receive_method')->nullable();
            $table->string('status');
            $table->string('pay_day');
            $table->timestamp('end_day');
            $table->string('whereToCredit')->nullable();
            $table->string('whereToDebit')->nullable();
            
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')
                    ->references('id')
                    ->on('users')
                    ->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transactions');
    }
};