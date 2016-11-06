<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class buses
 * @package App\Models
 * @version November 6, 2016, 4:46 am UTC
 */
class buses extends Model
{
    use SoftDeletes;

    public $table = 'buses';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'name',
        'created_at',
        'update_at'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'name' => 'string',
        'update_at' => 'date'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    
}
