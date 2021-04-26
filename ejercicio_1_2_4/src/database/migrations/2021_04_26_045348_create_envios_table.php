<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEnviosTable extends Migration
{
    public function up()
    {
        Schema::create('envios', function (Blueprint $table) {
            $table->id();
            $table->integer('tracking_number');
            $table->integer('imported_id');
            $table->json('customer');
            $table->json('shipping_address');
            $table->string('country');
            $table->string('carrier');
            $table->string('service');
            $table->string('deadline_at');
            $table->timestamps();
        });
    }
    public function down()
    {
        Schema::dropIfExists('envios');
    }
}
