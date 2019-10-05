<?php
namespace Modules\Customer\Services;

use Modules\Customer\Repositories\Interfaces\CustomerRepositoryInterface;
use ThrowException;

class CustomerDeleteService{
    private $customerRepo;

    public function __construct(CustomerRepositoryInterface $customerRepo){
        $this->customerRepo = $customerRepo;   
    }
    
    /**
     * @param $id
     * @return false|boolean
     * At this point everything is validated, we shouldn't check anything else
     */
    public function DeleteCustomer($id):?bool{
        $customer = $this->customerRepo->deleteWhere("uuid","=",$id);
        if(!$customer) {
            ThrowException::notFound();
        }
        return $customer;
    }
}