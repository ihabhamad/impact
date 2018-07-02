<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateImpactNetworksGuidancesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('impact_networks_guidances', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->unsignedInteger('impact_network_id');
            $table->unsignedInteger('guidance_id');
            $table->timestamps();
            $table->foreign('guidance_id')->references('id')->on('guidances')->onDelete('cascade');
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
        Schema::dropIfExists('impact_networks_guidances');
    }
}
