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
            $table->text('sub_description');

            // Define foreign key constraint for category_id
            $table->foreignId('category_id')->default(1)->constrained()->onDelete('cascade');

            $table->char('price');
            $table->char('condition');

            // Define foreign key constraint for seller_id
            $table->foreignId('seller_id')->default(1)->constrained('users')->onDelete('cascade');

            $table->string('item_url')->nullable(); // Add this line to create the item_url column

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
