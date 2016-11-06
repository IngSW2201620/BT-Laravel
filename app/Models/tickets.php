<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class tickets
 * @package App\Models
 * @version November 6, 2016, 4:44 pm UTC
 */
class tickets extends Model
{
    use SoftDeletes;

    public $table = 'tickets';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'id_owner',
        'id_reserved_route',
        'id_used_route',
        'id_used_stop',
        'used_date',
        'expiration_date',
        'id_seller'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id_owner' => 'integer',
        'id_reserved_route' => 'integer',
        'id_used_route' => 'integer',
        'id_used_stop' => 'integer',
        'used_date' => 'date',
        'expiration_date' => 'date',
        'id_seller' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    
}
