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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('title', 150);
            $table->string('seo', 150);
            $table->string('description', 255);
            $table->string('stock_code', 20);
            $table->string('barcode', 20);
            $table->string('associative', 20);
            $table->decimal('tax', 4, 2)->default(0);
            $table->boolean('confirm')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
