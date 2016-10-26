<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Ticket
 * @package App\Models
 * @version October 26, 2016, 5:43 am UTC
 */
class Ticket extends Model
{
    use SoftDeletes;

    public $table = 'tickets';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'purchaseDate',
        'expirationDate',
        'usteDate',
        'dateReservation'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'purchaseDate' => 'string',
        'expirationDate' => 'string',
        'usteDate' => 'string',
        'dateReservation' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'purchaseDate' => 'required',
        'expirationDate' => 'required'
    ];

    
}
