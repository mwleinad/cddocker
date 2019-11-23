<?php

namespace Modules\Customer\Http\Controllers;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Modules\Customer\Http\Requests\CustomerPostValidationRequest;
use Modules\Customer\Services\CustomerCreateService;

/**
 * Class CustomerPostController
 * @package Modules\Customer\Http\Controllers
 */
class CustomerPostController extends Controller
{
    /**
     * @var CustomerCreateService
     */
    private $customerCreateService;
    
    /**
     * CustomerPostController constructor
     * @param CustomerCreateService $customerCreateService
     */
    public function __construct(CustomerCreateService $customerCreateService){
        $this->customerCreateService = $customerCreateService;
    }

    /**
     * @param CustomerPostValidationRequest $request
     * @return JsonResponse
     */
    public function __invoke(CustomerPostValidationRequest $request) : JsonResponse {
        $response = $this->customerCreateService->create($request->validated());
        
        return $this->handleAjaxJsonResponse($response);
    }
}
