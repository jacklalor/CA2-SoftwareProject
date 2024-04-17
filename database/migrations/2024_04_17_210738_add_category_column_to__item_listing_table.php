<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddCategoryColumnToItemListingTable extends Migration
{
    public function up()
    {
        Schema::table('item_listing', function (Blueprint $table) {
            $table->string('category')->nullable();
        });
    }

    public function down()
    {
        Schema::table('item_listing', function (Blueprint $table) {
            $table->dropColumn('category');
        });
    }
}
