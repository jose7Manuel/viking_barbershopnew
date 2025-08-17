<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::create('clientes', function (Blueprint $table) {
        $table->id();
        $table->string('nombre_completo');
        $table->string('email')->unique();
        $table->string('telefono', 20)->unique();
        $table->string('contraseña');
        $table->timestamps();
    });
}

};
