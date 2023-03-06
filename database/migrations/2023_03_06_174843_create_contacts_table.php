<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContactsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contacts', function (Blueprint $table) {
            $table->id();
            $table->integer('team_id')->nullable();
            $table->string('full_name')->nullable();
            $table->text('address')->nullable();
            $table->text('phone')->nullable()->comment('save many phone ,');
            $table->text('word_phone')->nullable();
            $table->text('fax')->nullable();
            $table->string('email')->nullable();
            $table->string('avatar')->nullable();
            $table->dateTime('birthday')->nullable();
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
        Schema::dropIfExists('contacts');
    }
}
