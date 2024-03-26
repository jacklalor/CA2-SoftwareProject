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
        Schema::create('item_listing', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('description');
            $table->char('price');
            $table->char('condition');
            $table->char('is_sold');
            $table->foreignId('seller_id');
            $table->foreign('seller_id')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');;
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('item_listing');
    }
};
