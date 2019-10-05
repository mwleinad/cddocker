<?php

namespace Modules\Customer\Http\Controllers;

use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Modules\Customer\Http\Requests\CustomerPatchValidationRequest;
use Modules\Customer\Services\CustomerPatchService;
/**
 * Class CustomerGetController
 * @package Modules\Customer\Http\Controllers
 */
class CustomerPatchController extends Controller {
    private $customerPatchService;

    /**
     * CustomerGetController constructor.
     * @param CustomerGetService $companyGetService
     */
    public function __construct(CustomerPatchService $customerPatchService) {
        $this->customerPatchService = $customerPatchService;
    }

    /**
     * @param CustomerGetValidationRequest $request
     * @return JsonResponse
     */
    public function __invoke(CustomerPatchValidationRequest $request) : JsonResponse {
        $uuid = $request->get("uuid"); 
        $data = $request->validated();
        //TODO Get all list customers OR get info by uuid if atribute uuid is passed
        $response = $this->customerPatchService->UpdateCustomer($data,$uuid);
        return $this->handleAjaxJsonResponse($response);
    }
}