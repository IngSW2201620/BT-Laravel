<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class bus
 * @package App\Models
 * @version October 26, 2016, 6:05 am UTC
 */
class bus extends Model
{
    use SoftDeletes;

    public $table = 'buses';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'licensePlate',
        'capacity',
        'currentLatitude',
        'currenteLongitude',
        'soldSeats',
        'color',
        'photo'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'licensePlate' => 'string',
        'currentLatitude' => 'integer',
        'currenteLongitude' => 'integer',
        'soldSeats' => 'integer',
        'color' => 'string',
        'photo' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'licensePlate' => 'required',
        'capacity' => 'required',
        'currentLatitude' => 'required',
        'currenteLongitude' => 'required',
        'color' => 'required'
    ];

    
}
