<?php

namespace Modules\Customer\Services;

use Illuminate\Database\Eloquent\Collection;
use Modules\Customer\Models\Customer;
use Modules\Customer\Repositories\Interfaces\CustomerRepositoryInterface;
use ThrowException;

/**
 * Class CustomerGetService
 * @package Modules\Customer\Services
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
     * @return Collection Customer | null
     */
    public function getCustomer(): ? Collection {
        $customer = $this->customerRepo->all();

        if($customer->isEmpty()) {
            ThrowException::notFound();
        }

        return $customer;
    }

    /**
     * @param $id
     * @return Customer|null
     */
    public function info($id): ? Customer {
        $customer = $this->customerRepo->findBy("uuid",$id);

        if(!$customer) {
            ThrowException::notFound();
        }

        return $customer;
    }
}