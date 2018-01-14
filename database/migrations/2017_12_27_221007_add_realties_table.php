<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddRealtiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('realties', function (Blueprint $table) {
            $table->string('street_number', 10);
            $table->string('route', 150);
            $table->string('locality', 150);
            $table->string('administrative_area_level_1', 150);
            $table->string('country', 100);
            $table->string('postal_code', 20);
            $table->integer('floor');
            $table->string('lot', 10);
            $table->enum('type', ["APPARTEMENT", "MAISON_INDIVIDUELLE", "APPARTEMENT_MEUBLE", "LOCAL_PROFESSIONNEL",
                "COMMERCE", "BUREAUX", "CHAMBRE_MEUBLEE", "ENTREPOT", "GARAGE_BOX", "PARKING", "TERRAIN", "CARAVANNE", "MOBIL_HOME",
                "CHALET", "ATELIER", "INDETERMINE", "APPARTEMENT_RC_PLUS_PNO", "MAISON_COPROPRIETE", "MAISON_INDIVIDUELLE_RC_SEULE",
                "MAISON_INDIVIDUELLE_RC_PLUS_PNO", "BUREAUX_SURFACE_INFERIEURE_A_200_METRE_CARRE", "BUREAUX_SURFACE_ENTRE_200_METRE_CARRE_ET_600_METRE_CARRE"]);
            $table->integer('number_of_rooms');
            $table->float('surface');
            $table->integer('door_number');
            $table->string('building', 100);
            $table->boolean('garage');
            $table->boolean('fireplace');
            $table->boolean('cellar');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('realties', function (Blueprint $table) {
            $table->dropColumn([
                'street_number',
                'route',
                'locality',
                'administrative_area_level_1',
                'country',
                'postal_code',
                'floor',
                'lot',
                'type',
                'number_of_rooms',
                'surface',
                'door_number',
                'building',
                'garage',
                'fireplace',//cheminée
                'cellar',//cave
            ]);
        });
    }
}
