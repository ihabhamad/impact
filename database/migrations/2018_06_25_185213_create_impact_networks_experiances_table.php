<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateImpactNetworksExperiancesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('impact_networks_experiances', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->unsignedInteger('impact_network_id');
            $table->unsignedInteger('experiance_id');
            $table->timestamps();
            $table->foreign('experiance_id')->references('id')->on('experiances')->onDelete('cascade');
            $table->foreign('impact_network_id')->references('id')->on('impact_networks')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('impact_networks_experiances');
    }
}
