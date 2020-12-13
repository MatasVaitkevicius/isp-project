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
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->enum('user_role', ['buyer', 'seller', 'admin', 'worker']);
            $table->string('first_name')->nullable();
            $table->string('surname')->nullable();
            $table->datetime('birthday')->nullable();
            $table->enum('gender', ['other', 'female', 'male']);
            $table->string('phone')->nullable();
            $table->string('work_position')->nullable();;
            $table->double('salary')->nullable();
            $table->enum('workload', ['full_time', 'part_time', 'quarter_time']);
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
