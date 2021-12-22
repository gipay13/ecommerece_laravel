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
            $table->string('email', 70)->unique();
            $table->string('roles', 20)->default('user');
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password', 50);
            $table->text('address1')->nullable();
            $table->text('address2')->nullable();
            $table->integer('province_id')->nullable();
            $table->integer('regency_id')->nullable();
            $table->integer('zip_code')->nullable();
            $table->string('country', 50)->nullable();
            $table->string('phone', 20)->nullable();
            $table->string('store_name', 50)->nullable();
            $table->integer('category_id')->nullable();
            $table->boolean('store_status')->default(false);
            $table->softDeletes();
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
