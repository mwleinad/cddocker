<?php

namespace Modules\Customer\Services;

use Illuminate\Database\Eloquent\Collection;
use Modules\Customer\Models\Customer;
use Modules\Customer\Repositories\Interfaces\CustomerRepositoryInterface;
use ThrowException;

/**
 * Class CompanyGetService
 * @package Modules\Company\Services
 */
class CustomerGetService {
    /**
     * @var CustomerRepositoryInterface
     */
    private $customerRepo;

    /**
     * CustomerGetService constructor.
     * @param CustomerRepositoryInterface $customerRepo
     */
    public function __construct(CustomerRepositoryInterface $customerRepo) {
        $this->customerRepo = $customerRepo;
    }

    /**
     * @param $id
     * @return Customer|null
    * At this point everything is validated, we shouldn't check anything else
     */
    public function GetCustomers():?Collection{
        $customer = $this->customerRepo->all();
        //\Log::info($customer->all());
        //exit;
        if($customer->isEmpty()) {
            ThrowException::notFound();
        }
        return $customer;
    }
    public function Info($id):?Customer{
        $customer = $this->customerRepo->findBy("uuid",$id);
        if(!$customer) {
            ThrowException::notFound();
        }
        return $customer;
    }
}