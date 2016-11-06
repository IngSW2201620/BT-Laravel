<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class buses
 * @package App\Models
 * @version November 6, 2016, 4:23 pm UTC
 */
class buses extends Model
{
    use SoftDeletes;

    public $table = 'buses';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'license_plate',
        'brand',
        'model',
        'capacity',
        'photo'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'license_plate' => 'string',
        'brand' => 'string',
        'model' => 'integer',
        'capacity' => 'integer',
        'photo' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    
}
