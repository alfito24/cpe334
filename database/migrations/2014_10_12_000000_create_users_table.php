<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->uuid('user_id')->primary();
            $table->string('name')->nullable();
            $table->string('username')->unique()->nullable();
            $table->string('company')->nullable();
            $table->string('company_description')->nullable();
            $table->string('company_established')->nullable();
            $table->text('picture')->nullable();
            // $table->text('company_picture')->nullable();
            $table->string('email')->unique();
            $table->string('gender')->nullable();
            $table->string('education')->nullable();
            $table->string('area_of_interest')->nullable();
            $table->date('birth_date')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->foreignId('role_id')->constraint();  // 0 -> applicant, 1 -> company
            $table->text('address');
            $table->string('phone_number');
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
