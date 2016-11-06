<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class routes
 * @package App\Models
 * @version November 6, 2016, 5:21 am UTC
 */
class routes extends Model
{
    use SoftDeletes;

    public $table = 'routes';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'id_assigned_driver',
        'id_assigned_bus',
        'id_road',
        'schedule_time',
        'id_route_status',
        'startDate',
        'endDate'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id_assigned_driver' => 'integer',
        'id_assigned_bus' => 'integer',
        'id_road' => 'integer',
        'schedule_time' => 'date',
        'id_route_status' => 'integer',
        'startDate' => 'date',
        'endDate' => 'date'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    
}
