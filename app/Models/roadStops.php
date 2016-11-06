<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class roadStops
 * @package App\Models
 * @version November 6, 2016, 4:39 pm UTC
 */
class roadStops extends Model
{
    use SoftDeletes;

    public $table = 'road_stops';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'id_road',
        'id_stop'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id_road' => 'integer',
        'id_stop' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    
}
