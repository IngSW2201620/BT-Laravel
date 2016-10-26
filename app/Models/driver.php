<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class driver
 * @package App\Models
 * @version October 26, 2016, 6:12 am UTC
 */
class driver extends Model
{
    use SoftDeletes;

    public $table = 'drivers';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'firstName',
        'lastName',
        'photo',
        'administrator'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'firstName' => 'string',
        'lastName' => 'string',
        'photo' => 'string',
        'administrator' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'firstName' => 'required',
        'lastName' => 'required'
    ];

    
}
