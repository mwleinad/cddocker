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
    /**
     * @var CustomerGetService
     */
    private $customerGetService;

    /**
     * CustomerGetController constructor.
     * @param CustomerGetService $customerGetService
     */
    public function __construct(CustomerGetService $customerGetService) {
        $this->customerGetService = $customerGetService;
    }

    /**
     * @param CustomerGetValidationRequest $request
     * @return JsonResponse whit customers|customer
     */
    public function __invoke(CustomerGetValidationRequest $request) : JsonResponse {
        $response = $uuid ? $this->customerGetService->info($request->get("uuid")) : $this->customerGetService->getCustomer(); 
        
        return $this->handleAjaxJsonResponse($response);
    }
}