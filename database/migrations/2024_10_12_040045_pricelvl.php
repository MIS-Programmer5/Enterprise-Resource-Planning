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
        Schema::create('pricelevels', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('item_id')->nullable();
            $table->unsignedBigInteger('branch_id')->nullable();
            $table->string('type', 50);
            $table->string('description', 100);
            $table->bigInteger('markup');
            $table->date('start_date');
            $table->date('end_date')->nullable();
            $table->boolean('is_active');
            $table->integer('unit_id');
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pricelevels');
    }
};
