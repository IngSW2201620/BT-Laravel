<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class road
 * @package App\Models
 * @version October 26, 2016, 6:03 am UTC
 */
class road extends Model
{
    use SoftDeletes;

    public $table = 'roads';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'name',
        'route'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'name' => 'string',
        'route' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'name' => 'required',
        'route' => 'required'
    ];

    
}
