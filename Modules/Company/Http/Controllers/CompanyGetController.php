<?php

namespace Modules\Company\Http\Controllers;

use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Modules\Company\Http\Requests\CompanyGetValidationRequest;
use Modules\Company\Services\CompanyGetService;

/**
 * Class CompanyGetController
 * @package Modules\Company\Http\Controllers
 */
class CompanyGetController extends Controller {
    private $companyGetService;

    /**
     * CompanyGetController constructor.
     * @param CompanyGetService $companyGetService
     */
    public function __construct(CompanyGetService $companyGetService) {
        $this->companyGetService = $companyGetService;
    }

    /**
     * @param CompanyGetValidationRequest $request
     * @return JsonResponse
     */
    public function __invoke(CompanyGetValidationRequest $request) : JsonResponse {
        $uuid = $request->get('uuid');
        $response = $this->companyGetService->info($uuid); //TODO pass real id
        return $this->handleAjaxJsonResponse($response);
    }
}
