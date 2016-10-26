<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Seller
 * @package App\Models
 * @version October 26, 2016, 5:58 am UTC
 */
class Seller extends Model
{
    use SoftDeletes;

    public $table = 'sellers';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'firstName',
        'lastName',
        'idTicket'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'firstName' => 'string',
        'lastName' => 'string',
        'idTicket' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'firstName' => 'required',
        'lastName' => 'required',
        'idTicket' => 'required'
    ];

    
}
