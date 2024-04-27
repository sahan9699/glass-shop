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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('number')->nullable();
            $table->string('user_type')->nullable();
            $table->string('id_number')->nullable();
            $table->string('center_name')->nullable();
            $table->string('center_manager_name')->nullable();
            $table->string('centera_address')->nullable();
            $table->string('shop_name')->nullable();
            $table->string('shop_address')->nullable();
            $table->string('points')->default(0);
            $table->integer('postal_code')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
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
};
