<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAppointmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('appointments', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('patient_id');
            $table->text('description')->nullable();
            $table->timestamp('time');
            $table->enum('status', ['pending', 'completed', 'rejected by doctor', 'cancelled by patient']);
            $table->unsignedBigInteger('employee_id');
            $table->unsignedBigInteger('procedure_id');
            $table->timestamps();

            // Foreign key constraints
            $table->foreign('patient_id')->references('id')->on('patients')->onDelete('cascade');
            $table->foreign('employee_id')->references('id')->on('employees')->onDelete('cascade');
            $table->foreign('procedure_id')->references('id')->on('procedures')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('appointments');
    }
}

