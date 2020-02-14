<?php
namespace Modules\Customer\Services;

use Modules\Customer\Repositories\Interfaces\CustomerRepositoryInterface;
use ThrowException;

/**
 * class CustomerDeleteService
 * @package Modules\Customer\Services
 */
class CustomerDeleteService{
    /**
     * @var CustomerRepositoryInterface
     */
    private $customerRepo;
    
    /**
     * CustomerDeleteService constructor
     * @param CustomerRepositoryInterface $customerRepo
     */
    public function __construct(CustomerRepositoryInterface $customerRepo){
        $this->customerRepo = $customerRepo;   
    }
    
    /**
     * @param $uuid
     * @return false|true
     */
    public function deleteCustomer($uuid): ? bool {
        return $this->customerRepo->deleteWhere("uuid","=",$uuid);    
    }
}