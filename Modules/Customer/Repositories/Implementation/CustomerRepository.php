<?php

namespace Modules\Customer\Repositories\Implementation;
use App\Repositories\Implementation\BaseRepository;
use Modules\Customer\Models\Customer;
use Modules\Customer\Repositories\Interfaces\CustomerRepositoryInterface;


/**
 * Class CompanyRepository
 * @package Modules\Company\Repositories\Implementation
 */
class CustomerRepository extends BaseRepository implements CustomerRepositoryInterface {
    /**
     * @return string
     */
    public function model() : string {
        return Customer::class;
    }
}