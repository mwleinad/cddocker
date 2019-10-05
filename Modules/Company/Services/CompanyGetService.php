<?php

namespace Modules\Company\Services;

use Modules\Company\Models\Company;
use Modules\Company\Repositories\Interfaces\CompanyRepositoryInterface;
use ThrowException;

/**
 * Class CompanyGetService
 * @package Modules\Company\Services
 */
class CompanyGetService {
    /**
     * @var CompanyRepositoryInterface
     */
    private $companyRepo;

    /**
     * CompanyGetService constructor.
     * @param CompanyRepositoryInterface $companyRepo
     */
    public function __construct(CompanyRepositoryInterface $companyRepo) {
        $this->companyRepo = $companyRepo;
    }

    /**
     * @param $id
     * @return Company|null
    * At this point everything is validated, we shouldn't check anything else
     */
    public function info($id) : ?Company {
        $company = $this->companyRepo->findBy('uuid', $id);

        if(!$company) {
            ThrowException::notFound();
        }

        return $company;
    }
}
