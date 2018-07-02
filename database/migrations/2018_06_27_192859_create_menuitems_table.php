<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMenuitemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('menuitems', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->enum('link_type', ['post', 'external','application'])->default('external');
            $table->integer('parentid')->nullable();
            $table->string('css')->nullable();
            $table->integer('extramenu_id');
            $table->string('link')->nullable();
            $table->integer('relative_id')->nullable();
            $table->timestamps();
             $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('menuitems');
    }
}
