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
        Schema::create('user_item_listing', function (Blueprint $table) {
            $table->id();
            $table->char('transaction_amount');
            $table->string('shipping address');
            $table->foreignId('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');;

            $table->foreignId('item_id');
            $table->foreign('item_id')->references('id')->on('item_listing')->onUpdate('cascade')->onDelete('cascade');;


            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_item_listing');
    }
};
