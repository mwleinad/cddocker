<?php

namespace Modules\Customer\Http\Controllers;

use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Modules\Customer\Http\Requests\CustomerGetValidationRequest;
use Modules\Customer\Services\CustomerGetService;

/**
 * Class CustomerGetController
 * @package Modules\Customer\Http\Controllers
 */
class CustomerGetController extends Controller {
    private $customerGetService;

    /**
     * CustomerGetController constructor.
     * @param CustomerGetService $companyGetService
     */
    public function __construct(CustomerGetService $customerGetService) {
        $this->customerGetService = $customerGetService;
    }

    /**
     * @param CustomerGetValidationRequest $request
     * @return JsonResponse
     */
    public function __invoke(CustomerGetValidationRequest $request) : JsonResponse {
        $uuid =  $request->get("uuid");
        //TODO Get all list customers OR get info by uuid if atribute uuid is passed
        $response = $uuid ? $this->customerGetService->Info($uuid) : $this->customerGetService->GetCustomers(); 
        return $this->handleAjaxJsonResponse($response);
    }
}