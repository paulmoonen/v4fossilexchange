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
            $table->string('name', 20);
            $table->string('firstname')->nullable();
            $table->string('lastname')->nullable();
            $table->string('title')->nullable()->default(NULL);
            $table->string('email')->unique();
            $table->tinyInteger('role')->nullable();  // 1 = admin, 2 = customer
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('street')->nullable();
            $table->string('housenumber')->nullable(); //housenumber may contain characters
            $table->string('postal_code')->nullable();
            $table->string('city')->nullable();
            $table->string('country')->nullable(); 
            $table->integer('created_by');
            $table->rememberToken();
            $table->timestamps();
            $table->softDeletes(); 
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
