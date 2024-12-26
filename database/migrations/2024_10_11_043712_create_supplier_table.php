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
        Schema::create('suppliers', function (Blueprint $table) {
            $table->id();
            $table->string('supp_name');
            $table->string('postal_address');
            $table->string('contact_no_1');
            $table->string('supp_address');
            $table->string('contact_no_2')->nullable();
            $table->string('tax_payer_id');
            $table->string('contact_person');
            $table->string('input_tax')->nullable();
            $table->string('supplier_code');
            $table->string('email')->unique();
            $table->string('supp_status')->default('active');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('suppliers');
    }
};
