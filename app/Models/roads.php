<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class roads
 * @package App\Models
 * @version November 6, 2016, 4:30 pm UTC
 */
class roads extends Model
{
    use SoftDeletes;

    public $table = 'roads';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'name',
        'id_source_stop',
        'id_destination_stop'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'name' => 'string',
        'id_source_stop' => 'integer',
        'id_destination_stop' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    
}
