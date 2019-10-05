<?php

namespace Modules\Customer\Http\Controllers;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Modules\Customer\Http\Requests\CustomerPostValidationRequest;
use Modules\Customer\Services\CustomerCreateService;


class CustomerPostController extends Controller
{
    private $customerCreateService;
    /**
     * Class CustomerPostController
     * @package Modules\Customer\http\Controller
     */
    public function __construct(CustomerCreateService $customerCreateService){
        $this->customerCreateService = $customerCreateService;
    }
    /**
     * @param CustomerPostValidationRequest $request
     * @return JsonResponse
     */
    public function __invoke(CustomerPostValidationRequest $request):JsonResponse{
        $data = $request->validated();
        $response = $this->customerCreateService->create($data);
        return $this->handleAjaxJsonResponse($response);
    }
}
