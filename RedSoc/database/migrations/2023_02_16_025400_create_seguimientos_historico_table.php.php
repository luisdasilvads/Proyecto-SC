<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('seguimientos_hs', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('id_vinculo')->unsigned()->default(1);
            $table->bigInteger('id_segumiento')->unsigned()->default(2);
            $table->string('estatus');
            $table->string('avance');
            $table->string('fecha');
            $table->timestamps();
            $table->foreign('id_vinculo')->references('id')->on('vinculos')->onDelete("cascade");
            $table->foreign('id_segumiento')->references('id')->on('seguimientos')->onDelete("cascade");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('seguimientos_hs');
    }
};
