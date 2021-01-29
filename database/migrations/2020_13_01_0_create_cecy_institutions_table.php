<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCecyInstitutionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //periodo_lectivo
        Schema::connection('pgsql-cecy')->create('institutions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('state_id')->constrained("ignug.states")->nullable(); //id_estados
            $table->foreignId('logo')->constrained("ignug.images"); //id_estatus
            $table->string('name',200); //nombre
            $table->string('slogan', 500)->nullable();
            $table->string('code', 200)->nullable();
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
        Schema::connection('pgsql-cecy')->dropIfExists('cecy_institutions');
    }
}
