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
        Schema::create('vinculos', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('beneficiarios')->unsigned()->default(1);
            $table->bigInteger('oferente')->unsigned()->default(2);
            $table->string('lugar');
            $table->string('forma_comunacion');
            $table->string('descripcion');
            $table->string('nombre_apellido_contacto');
            $table->string('fecha');
            $table->timestamps();
            
            $table->foreign('beneficiarios')->references('id')->on('beneficiarios')->onDelete("cascade");
            $table->foreign('oferente')->references('id')->on('beneficiarios')->onDelete("cascade");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('vinculos');
    }
};
