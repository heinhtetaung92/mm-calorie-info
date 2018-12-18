<?php

namespace App\Repositories;

use App\Models\NutiritionFact;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class NutiritionFactRepository
 * @package App\Repositories
 * @version December 18, 2018, 7:33 am UTC
 *
 * @method NutiritionFact findWithoutFail($id, $columns = ['*'])
 * @method NutiritionFact find($id, $columns = ['*'])
 * @method NutiritionFact first($columns = ['*'])
*/
class NutiritionFactRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'title',
        'name',
        'calorie',
        'source'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return NutiritionFact::class;
    }
}
