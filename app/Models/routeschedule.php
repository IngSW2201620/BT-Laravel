<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class routeschedule
 * @package App\Models
 * @version October 26, 2016, 6:10 am UTC
 */
class routeschedule extends Model
{
    use SoftDeletes;

    public $table = 'routeschedules';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'destination',
        'source',
        'date',
        'status',
        'name',
        'startingDate',
        'endingDate',
        'driver'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'destination' => 'string',
        'source' => 'string',
        'date' => 'date',
        'status' => 'string',
        'name' => 'string',
        'startingDate' => 'date',
        'endingDate' => 'date',
        'driver' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'destination' => 'required',
        'source' => 'required',
        'date' => 'required',
        'status' => 'required',
        'name' => 'required',
        'driver' => 'required'
    ];

    
}
