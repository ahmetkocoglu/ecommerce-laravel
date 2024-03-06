<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Carbon\Carbon;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('coupons', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->string('code', 150);
            $table->string('title', 150);
            $table->string('description', 255);
            $table->string('type', 20);
            $table->decimal('price', 7, 2)->default(0);
            $table->dateTimeTz('start_date', 3)->default(Carbon::now());
            $table->dateTimeTz('end_date', 3)->default(Carbon::now()->addMonth());
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('coupons');
    }
};
