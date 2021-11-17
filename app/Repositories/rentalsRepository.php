<?php

namespace App\Repositories;

use App\Models\rentals;
use App\Repositories\BaseRepository;

/**
 * Class rentalsRepository
 * @package App\Repositories
 * @version October 27, 2021, 8:04 am UTC
*/

class rentalsRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
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
     * Return searchable fields
     *
     * @return array
     */
    public function getFieldsSearchable()
    {
        return $this->fieldSearchable;
    }

    /**
     * Configure the Model
     **/
    public function model()
    {
        return rentals::class;
    }
}
