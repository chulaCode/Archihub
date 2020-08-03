<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profiles', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->string('address')->nullable();
            $table->string('job_field')->nullable();
            $table->string('phone')->nullable();
            $table->string('certificate')->nullable();
            $table->text('bio')->nullable();
            $table->string('state')->nullable();
            $table->string('experience')->nullable();
            $table->string('cover_letter')->nullable();
            $table->string('resume')->nullable();
            $table->string('avatar')->nullable();
            $table->timestamps();

            $table->index('user_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('profiles');
    }
}
