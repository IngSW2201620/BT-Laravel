<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class stops
 * @package App\Models
 * @version November 6, 2016, 4:28 pm UTC
 */
class stops extends Model
{
    use SoftDeletes;

    public $table = 'stops';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'address',
        'name',
        'latitude',
        'longitude'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'address' => 'string',
        'name' => 'string',
        'latitude' => 'string',
        'longitude' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'latitude' => 'longitude text text'
    ];

    
}
