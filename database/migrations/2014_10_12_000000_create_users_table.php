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
            $table->string('f_name');
            $table->string('l_name');
            $table->string('username')->unique();
            $table->string('phone_number')->unique();
            $table->string('email')->unique();
            $table->string('password');

            $table->string('ip_address')->nullable();
            $table->string('avatar')->nullable();
            $table->string('street_address');
            $table->unsignedInteger('division_id');
            $table->unsignedInteger('district_id');

            $table->string('shipping_address')->nullable();
            $table->unsignedTinyInteger('status')->default(1)->comment('1=active,2=inactive');

            $table->integer('role_id')->default(2)->comment('1->admin,2->user');
            $table->timestamp('email_verified_at')->nullable();

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
