<?php
namespace Modules\Customer\Services;
use Modules\Customer\Models\Customer;
use Modules\Customer\Repositories\Interfaces\CustomerRepositoryInterface;

/**
 * class CustomerCreateService
 * @package Modules\Customer\Services
 */
class CustomerCreateService{
    /**
     * @var CustomerRepositoryInterface
     */
    private $customerRepo;

    /**
     * CustomerCreateService constructor
     * @param CustomerRepositoryInterface $customerRepo
     */
    public function __construct(CustomerRepositoryInterface $customerRepo) {
        $this->customerRepo = $customerRepo;
    }

    /**
     * @param array $data
     * @return Customer|null
     */
    public function create(array $data): ? Customer{
        return $this->customerRepo->create($data);
    }
}