<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReceiptsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('receipts', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('patient_id');
            $table->unsignedBigInteger('issued_by');
            $table->unsignedBigInteger('doctor_id');
            $table->text('prescription')->nullable();
            $table->decimal('balance', 8, 2)->default(0);
            $table->decimal('discount', 8, 2)->default(0);
            $table->timestamps();

            // Foreign key constraints
            $table->foreign('patient_id')->references('id')->on('patients')->onDelete('cascade');
            $table->foreign('issued_by')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('doctor_id')->references('id')->on('employees')->onDelete('cascade');
        });

        // Create a pivot table for receipt procedures
        Schema::create('receipt_procedure', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('receipt_id');
            $table->unsignedBigInteger('procedure_id');
            $table->decimal('procedure_cost', 8, 2);
            $table->timestamps();

            // Foreign key constraints
            $table->foreign('receipt_id')->references('id')->on('receipts')->onDelete('cascade');
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
        Schema::dropIfExists('receipt_procedure');
        Schema::dropIfExists('receipts');
    }
}

