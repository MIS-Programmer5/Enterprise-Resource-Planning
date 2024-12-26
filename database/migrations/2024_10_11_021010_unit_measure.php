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
        //
        Schema::create('unit_measure', function (Blueprint $table) {
            $table->id();
            $table->string('um_name');
            $table->string('um_code');
            $table->integer('item_code');
            $table->integer('quantity');
            $table->integer('unit_type');
            $table->integer('parent');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
        Schema::dropIfExists('unit_measure');
    }
};
