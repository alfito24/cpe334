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
        Schema::create('users', function (Blueprint $table) { // users is table name
            $table->uuid('user_id')->primary();
            $table->string('name')->nullable();
            $table->string('username')->unique()->nullable();
            $table->string('company')->nullable();
            $table->text('company_description')->nullable();
            $table->string('company_website')->nullable();
            $table->string('company_size')->nullable();
            $table->string('company_workdays')->nullable();
            $table->text('picture')->nullable();
            $table->text('about_me')->nullable();
            $table->string('job_dream')->nullable();
            $table->string('email')->unique();
            $table->string('gender')->nullable();
            $table->string('education')->nullable();
            $table->string('skills')->nullable();
            $table->string('business_area')->nullable();
            $table->enum('company_review', ['not_company', 'under_review', 'accepted', 'rejected'])->default('not_company');
            $table->date('birth_date')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->foreignId('role_id')->constraint();  // 0 -> applicant, 1 -> company, 2-> admin
            $table->text('address');
            $table->string('phone_number');
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
