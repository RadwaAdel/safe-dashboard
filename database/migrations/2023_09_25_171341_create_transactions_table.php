<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->date('receipt_date');
            $table->integer('company_id')->unsigned();
            $table->integer('revenue_type')->default(1);
            $table->decimal('value', 10, 2)->nullable();
            $table->integer('check_num')->nullable();
            $table->date('due_date')->nullable();
            $table->integer('bank_id')->unsigned()->nullable();
            $table->unsignedBigInteger('revenue_id')->nullable();
            $table->unsignedBigInteger('expense_id')->nullable();
            $table->integer('transaction')->default(1)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transactions');
    }
};
