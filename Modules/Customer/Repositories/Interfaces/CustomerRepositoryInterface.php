<?php 
namespace Modules\Customer\Repositories\Interfaces;
use App\Repositories\Interfaces\RepositoryInterface;

/**
 * Interface CustomerRepositoryInterface
 * @package Modules\Customer\Repositories\Interfaces
 */
interface CustomerRepositoryInterface extends RepositoryInterface {
    /**
     * @return mixed
     */
    public function model();
}