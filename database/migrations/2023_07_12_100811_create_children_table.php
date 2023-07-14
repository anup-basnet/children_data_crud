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
        Schema::create('children', function (Blueprint $table) {
            $table->id();
            $table->string('childFirstName');
            $table->string('childMiddleName');
            $table->string('childLastName');
            $table->integer('childAge');
            $table->enum('gender', ['Male', 'Female']);
            $table->boolean('differentAddress')->default(false);
            $table->string('childAddress')->nullable();
            $table->string('childCity')->nullable();
            $table->string('childState')->nullable();
            $table->string('childCountry')->nullable();
            $table->string('childZipCode')->nullable();
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
        Schema::dropIfExists('children');
    }
};
