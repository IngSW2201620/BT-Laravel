<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class passenger
 * @package App\Models
 * @version October 26, 2016, 6:25 am UTC
 */
class passenger extends Model
{
    use SoftDeletes;

    public $table = 'passengers';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'balance',
        'user',
        'ticket'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'balance' => 'integer',
        'user' => 'integer',
        'ticket' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'balance' => 'required',
        'user' => 'required',
        'ticket' => 'required'
    ];

    
}
