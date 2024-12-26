<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;


return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('branches', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('branch_name');
            $table->string('branch_address');
            $table->string('branch_code');
            $table->string('branch_type');
            $table->unsignedBigInteger('company_id')->nullable();
            $table->string('branch_email');
            $table->string('branch_cell');
            $table->string('branch_status')->default('active');


        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('branches');
    }
};
