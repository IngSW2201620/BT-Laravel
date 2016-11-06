<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class busPositions
 * @package App\Models
 * @version November 6, 2016, 4:29 pm UTC
 */
class busPositions extends Model
{
    use SoftDeletes;

    public $table = 'bus_positions';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'id_bus',
        'latitude',
        'longitude'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id_bus' => 'integer',
        'latitude' => 'string',
        'longitude' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    
}
