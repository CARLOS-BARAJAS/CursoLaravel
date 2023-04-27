<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('images', function (Blueprint $table) {
           
            $table->string('url');

            $table->unsignedBigInteger('imageable_id'); // combecion se pone nombredela tabla y agregas able en la relaciones poliformicas
            $table->string('imageable_type');

            $table->primary(['imageable_id', 'imageable_type']); // para indicar que se va acrear una llave primaria compuesta
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('images');
    }
};
