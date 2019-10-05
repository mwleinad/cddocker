<?php
namespace Modules\Customer\Services;

use Modules\Customer\Repositories\Interfaces\CustomerRepositoryInterface;
use ThrowException;

class CustomerPatchService{
    private $customerRepo;

    public function __construct(CustomerRepositoryInterface $customerRepo){
        $this->customerRepo = $customerRepo;   
    }
    
    /**
     * @param $id
     * @return false|boolean
     * At this point everything is validated, we shouldn't check anything else
     */
    public function UpdateCustomer($data,$uuid):?bool{
        $customer = $this->customerRepo->update($data,$uuid,"uuid");
        if(!$customer) {
            ThrowException::notFound();
        }
        return $customer;
    }
}