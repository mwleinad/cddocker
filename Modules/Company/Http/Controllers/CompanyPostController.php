<?php

namespace Modules\Company\Http\Controllers;

use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Modules\Company\Http\Requests\CompanyGetValidationRequest;
use Modules\Company\Services\CompanyGetService;

/**
 * Class CompanyPostController
 * @package Modules\Company\Http\Controllers
 */
class CompanyPostController extends Controller {
    private $companyCreateService;

    /**
     * CompanyGetController constructor.
     * @param CompanyCreateService $companyCreateService
     */
    public function __construct(CompanyCreateService $companyCreateService) {
        $this->companyCreateService = $companyCreateService;
    }

    /**
     * @param CompanyGetValidationRequest $request
     * @return JsonResponse
     */
    public function __invoke(CompanyGetValidationRequest $request) : JsonResponse {
        $data = $request->validated();
        $response = $this->companyCreateService->create($data);
        return $this->handleAjaxJsonResponse($response);
    }
}
