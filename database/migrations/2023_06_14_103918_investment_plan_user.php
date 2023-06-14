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
        Schema::create('investment_plan_user', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('investment_plan_id')->unsigned();
            $table->bigInteger('user_id')->unsigned();
            $table->integer('amount');
            $table->string('pay_day');
            $table->foreign('investment_plan_id')
                    ->references('id')
                    ->on('investment_plans')
                    ->onDelete('cascade');

            $table->foreign('user_id')
                    ->references('id')
                    ->on('users')
                    ->onDelete('cascade');
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrentOnUpdate()->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('investment_plan_user', function (Blueprint $table){
            $table->dropForeign(['investment_plan_id']);
            $table->dropForeign(['user_id']);

            $table->dropColumn('investment_plan_id');
            $table->dropColumn('user_id');
        });

        Schema::dropIfExists('investment_plan_user');
    }
};