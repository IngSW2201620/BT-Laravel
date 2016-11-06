<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class route_statuses
 * @package App\Models
 * @version November 6, 2016, 4:47 am UTC
 */
class route_statuses extends Model
{
    use SoftDeletes;

    public $table = 'route_statuses';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'name',
        'created_at',
        'updated_at'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'name' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    
}
