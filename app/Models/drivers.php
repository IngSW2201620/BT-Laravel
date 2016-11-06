<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class drivers
 * @package App\Models
 * @version November 6, 2016, 4:26 pm UTC
 */
class drivers extends Model
{
    use SoftDeletes;

    public $table = 'drivers';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'first_name',
        'last_name',
        'document_type',
        'document_number',
        'driving_license',
        'rh',
        'photo'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'first_name' => 'string',
        'last_name' => 'string',
        'document_type' => 'string',
        'document_number' => 'integer',
        'driving_license' => 'string',
        'rh' => 'string',
        'photo' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    
}
