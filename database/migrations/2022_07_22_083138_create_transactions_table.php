<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
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
            $table->uuid('transaction_id')->primary();
            $table->integer('plastic_bag')->nullable();
            $table->integer('plastic_cup')->nullable();
            $table->integer('newspaper')->nullable();
            $table->integer('steel')->nullable();
            $table->integer('glass')->nullable();
            $table->integer('copper')->nullable();
            $table->integer('aluminium')->nullable();
            $table->integer('cardboard')->nullable();
            $table->foreignUuid('user_id')->constraint();
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
