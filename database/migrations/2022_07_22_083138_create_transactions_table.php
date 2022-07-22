<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->id('transaction_id');
            $table->integer('plastic')->nullable();
            $table->integer('paper')->nullable();
            $table->integer('metals')->nullable();
            $table->integer('glass')->nullable();
            $table->foreignId('user_id')->constraint();
            $table->foreignId('pickup_id')->constraint();
            $table->integer('bpoints');
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
}
