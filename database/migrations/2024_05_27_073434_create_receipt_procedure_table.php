<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('receipt_procedure', function (Blueprint $table) {
            $table->id();
            $table->foreignId('receipt_id')->constrained()->onDelete('cascade');
            $table->foreignId('procedure_id')->constrained()->onDelete('cascade');
            $table->decimal('cost', 10, 2);
            $table->timestamps();
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('receipt_procedure');
    }
    
};
