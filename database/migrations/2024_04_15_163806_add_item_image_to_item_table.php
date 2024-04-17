<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddItemImageToItemTable extends Migration
{
    public function up()
    {
        Schema::table('item_listing', function (Blueprint $table) {
            $table->string('image_url')->nullable();
        });
    }

    public function down()
    {
        Schema::table('item_listing', function (Blueprint $table) {
            $table->dropColumn('image_url');
        });
    }
}
