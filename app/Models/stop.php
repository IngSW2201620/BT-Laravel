<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class stop
 * @package App\Models
 * @version October 26, 2016, 6:17 am UTC
 */
class stop extends Model
{
    use SoftDeletes;

    public $table = 'stops';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'address',
        'name',
        'latitude',
        'longitude',
        'status',
        'road'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'address' => 'string',
        'name' => 'string',
        'latitude' => 'integer',
        'longitude' => 'integer',
        'status' => 'string',
        'road' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'address' => 'required',
        'name' => 'required',
        'latitude' => 'required',
        'longitude' => 'required',
        'status' => 'required'
    ];

    
}
