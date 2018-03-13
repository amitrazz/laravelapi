<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

use App\user;

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
            $table->increments('id');
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password');
            $table->string('verified')->default(User::UNVERIFIED_USER);
            $table->string('verification_token')->nullable();
            $table->string('admin');
            $table->rememberToken()->default(User::REGULAR_USER);
            $table->timestamps();
            $table->softDeletes();   // add deleted_at column in database tabele for soft delete functionality
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
