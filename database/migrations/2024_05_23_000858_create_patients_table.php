<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePatientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('patients', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('middle_name')->nullable();
            $table->string('last_name');
            $table->timestamp('date');
            $table->string('contact');
            $table->enum('gender', ['male', 'female', 'others']);
            $table->integer('age');
            $table->text('address');
            $table->unsignedBigInteger('procedure_id');
            $table->text('description')->nullable();
            $table->decimal('balance', 8, 2);
            $table->timestamps();

            // Foreign key constraint
            $table->foreign('procedure_id')->references('id')->on('procedures');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('patients');
    }
}


