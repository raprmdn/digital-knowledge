<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateManageMenusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('manage_menus', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('position')->nullable();
            $table->foreignId('parent_id')->nullable();
            $table->string('name');
            $table->string('url')->nullable();
            $table->string('permission_name');
            $table->string('icon')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('manage_menus');
    }
}
