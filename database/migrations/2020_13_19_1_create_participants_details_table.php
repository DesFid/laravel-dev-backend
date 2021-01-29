<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateParticipantsDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // detalle participantes
        Schema::connection('pgsql-cecy')->create('detail_participants', function (Blueprint $table) {
            $table->id();
            $table->foreignId('participant_id')->constrained('participants'); // Participante
            $table->string('institution_name', 50); //Nombre de institucion/trabajo
            $table->string('address_institution', 50); //Direccion de institucion/trabajo
            $table->string('institution_email', 20); //Correo de institucion/trabajo
            $table->string('institution_phone', 10); //Telefono de institucion/trabajo
            $table->string('institution_activity', 50); //Actividad de institucion/trabajo
            $table->boolean('sponsored'); //Patrocinado? por el instituto
            $table->string('contact_sponsored', 50); // Contacto del patrocinado
            $table->string('course_info', 50); // Informacion del curso
            $table->string('comments', 100); // Comentarios
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
        Schema::connection('pgsql-cecy')->dropIfExists('detail_participants');
    }
}
