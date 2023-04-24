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
        Schema::create('profiles', function (Blueprint $table) {
            $table->id();

            $table->string('title', 45);
            $table->text('biografia');
            $table->string('website', 45);
            /*
            resticcion de llave foranea ->  1 se le aplica la restriccion al campo user_id
            con respecto al campo id de la user(solo podemos ingresar valores de la table user)
            */
            $table->unsignedBigInteger('user_id')->unique();//->nillable(); set
            $table->foreign('user_id')
            ->references('id')
            ->on('users')
            ->onDelete('cascade')
            ->onUpdate('cascade'); // permite el cambio el id si se presenta un cambio
            /* El método onDelete('cascade') se utiliza para especificar la acción a tomar cuando se elimina una 
            fila en la tabla referenciada por la clave externa. En este caso, la acción especificada es cascade,
             lo que significa que si se elimina un registro en la tabla users, todos los registros relacionados en la 
             tabla actual también se eliminarán automáticamente. Es decir, esta línea de código asegura que cuando se elimine 
             un registro en la tabla de usuarios, se eliminen todos los registros relacionados en la tabla actual para mantener 
             la integridad referencial de la base de datos.
             onDelete('set null) cuando quieres que los registros relacionados con el campo no se eliminen,mantengan como un dato nulo pero para que funcione 
             se debe agregar a la migracion del campo que acepte campos nulos por igual
            */


            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('profiles');
    }
};
