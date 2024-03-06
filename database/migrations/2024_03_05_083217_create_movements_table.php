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
        Schema::create('movements', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('product_id')->nullable();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->unsignedBigInteger('movement_id')->nullable();
            $table->boolean('type')->nullable();
            $table->string('process_type', 10);
            $table->decimal('price', 7, 2)->default(0);
            $table->decimal('discount_price', 7, 2)->default(0);
            $table->decimal('quantity', 7, 2)->default(0);
            $table->decimal('tax', 7, 2)->default(0);
            $table->decimal('total', 7, 2)->default(0);
            $table->string('description', 100);
            $table->boolean('confirm')->default(true);
            $table->timestamps();

            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('movement_id')->references('id')->on('movements')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('movements');
    }
};
