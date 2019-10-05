<?php

namespace Modules\Customer\Http\Controllers;

use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Modules\Customer\Http\Requests\CustomerDeleteValidationRequest;
use Modules\Customer\Services\CustomerDeleteService;

/**
 * Class CustomerGetController
 * @package Modules\Customer\Http\Controllers
 */
class CustomerDeleteController extends Controller {
    private $customerDeleteService;
    /**
     * CustomerGetController constructor.
     * @param CustomerGetService $companyGetService
     */
    public function __construct(CustomerDeleteService $customerDeleteService) {
        $this->customerDeleteService = $customerDeleteService;
    }
    /**
     * @param CustomerGetValidationRequest $request
     * @return JsonResponse
     */
    public function __invoke(CustomerDeleteValidationRequest $request) : JsonResponse {
        $uuid =  $request->get("uuid");
        //delete by uuid
        $response = $this->customerDeleteService->DeleteCustomer($uuid); 
        return $this->handleAjaxJsonResponse($response);
    }
}