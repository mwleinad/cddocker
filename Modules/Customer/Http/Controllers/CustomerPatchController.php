<?php

namespace Modules\Customer\Http\Controllers;

use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Modules\Customer\Http\Requests\CustomerPatchValidationRequest;
use Modules\Customer\Services\CustomerPatchService;
/**
 * Class CustomerPatchController
 * @package Modules\Customer\Http\Controllers
 */
class CustomerPatchController extends Controller {
    /**
     * @var CustomerPatchService
     */
    private $customerPatchService;

    /**
     * CustomerPatchController constructor.
     * @param CustomerPatchService $customerPatchService
     */
    public function __construct(CustomerPatchService $customerPatchService) {
        $this->customerPatchService = $customerPatchService;
    }

    /**
     * @param CustomerPatchValidationRequest $request
     * @return JsonResponse
     */
    public function __invoke(CustomerPatchValidationRequest $request) : JsonResponse {
        $response = $this->customerPatchService->updateCustomer($request->validated(),$request->get("uuid"));
        
        return $this->handleAjaxJsonResponse($response);
    }
}