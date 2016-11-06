<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class sellers
 * @package App\Models
 * @version November 6, 2016, 4:27 pm UTC
 */
class sellers extends Model
{
    use SoftDeletes;

    public $table = 'sellers';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'first_name',
        'last_name'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'first_name' => 'string',
        'last_name' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    
}
