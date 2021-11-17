<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class rentals
 * @package App\Models
 * @version October 27, 2021, 8:04 am UTC
 *
 * @property string $CustomerName
 * @property string $Address
 * @property integer $Contact
 * @property string $CarType
 * @property integer $RentDays
 * @property string $DateRented
 * @property string $DateReturned
 * @property number $RentAmount
 * @property number $RentPaid
 */
class rentals extends Model
{
    //use SoftDeletes;

    use HasFactory;

    public $table = 'rentals';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'CustomerName',
        'Address',
        'Contact',
        'CarType',
        'RentDays',
        'DateRented',
        'DateReturned',
        'RentAmount',
        'RentPaid'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'CustomerName' => 'string',
        'Address' => 'string',
        'Contact' => 'integer',
        'CarType' => 'string',
        'RentDays' => 'integer',
        'DateRented' => 'date',
        'DateReturned' => 'date',
        'RentAmount' => 'decimal:2',
        'RentPaid' => 'decimal:2'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'CustomerName' => 'nullable|string|max:255',
        'Address' => 'nullable|string|max:255',
        'Contact' => 'nullable|integer',
        'CarType' => 'nullable|string|max:255',
        'RentDays' => 'nullable|integer',
        'DateRented' => 'nullable',
        'DateReturned' => 'nullable',
        'RentAmount' => 'nullable|numeric',
        'RentPaid' => 'nullable|numeric',
        'created_at' => 'nullable',
        'updated_at' => 'nullable'
    ];

    
}
