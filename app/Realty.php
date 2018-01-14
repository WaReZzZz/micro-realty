<?php namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Realty extends Model
{
    use SoftDeletes;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'realties';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = [
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
        'description',
    ];

    protected $dates = ['deleted_at'];

}