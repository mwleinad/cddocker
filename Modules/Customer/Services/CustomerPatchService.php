<?php
namespace Modules\Customer\Services;

use Modules\Customer\Repositories\Interfaces\CustomerRepositoryInterface;
use ThrowException;

/**
 * class CustomerPatchService
 * @package Modules\Customer\Services
 */
class CustomerPatchService{
    /**
     * @var CustomerRepositoryInterface
     */
    private $customerRepo;

    /**
     * CustomerPatchService constructor
     * @param CustomerRepositoryInterface $customerRepo
     */
    public function __construct(CustomerRepositoryInterface $customerRepo){
        $this->customerRepo = $customerRepo;   
    }
    
    /**
     * @param $data information to update
     * @param $uuid register identifier that will be updated
     * @return false|true
     */
    public function updateCustomer($data,$uuid): ? bool{
        $customer = $this->customerRepo->update($data,$uuid,"uuid");
        
        if(!$customer) {
            ThrowException::notFound();
        }

        return $customer;
    }
}