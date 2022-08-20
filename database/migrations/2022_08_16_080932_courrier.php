<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Courrier extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Courriers', function (Blueprint $table) {
            $table->id();
            $table->string('expediteur');
            $table->string('destinateur');
            $table->string('tracking_number');
            $table->string('ville_depart')->nullable();
            $table->string('ville_arrive');
            $table->integer('zone')->nullable();
            $table->string('adresse');
            $table->integer('agent');
            $table->integer('state')->default(1);

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
        //
    }
}
