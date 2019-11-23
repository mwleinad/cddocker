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
    /**
     * @var CustomerDeleteService
     */
    private $customerDeleteService;

    /**
     * CustomerDeleteController constructor
     * @param CustomerDeleteService $customerDeleteService
     */
    public function __construct(CustomerDeleteService $customerDeleteService) {
        $this->customerDeleteService = $customerDeleteService;
    }

    /**
     * @param CustomerDeleteValidationRequest $request
     * @return JsonResponse
     */
    public function __invoke(CustomerDeleteValidationRequest $request) : JsonResponse {
        $response = $this->customerDeleteService->deleteCustomer($request->get("uuid"));
         
        return $this->handleAjaxJsonResponse($response);
    }
}