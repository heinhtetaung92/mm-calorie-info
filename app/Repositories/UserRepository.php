<?php

namespace App\Repositories;

use Prettus\Repository\Contracts\RepositoryInterface;
use InfyOm\Generator\Common\BaseRepository;
use App\User;

/**
 * Interface UserRepository.
 *
 * @package namespace App\Repositories;
 */
class UserRepository extends BaseRepository
{
    
     /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return User::class;
    }

}
