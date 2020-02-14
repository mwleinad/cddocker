<?php
namespace Modules\Customer\Http\Requests;
use App\Http\Requests\Request;
/**
 * class CustomerPostValidationRequest
 * @package Modules\Customer\Http\Requests
 */
class CustomerPostValidationRequest extends Request{
    /**
     * Determine if the user is authorized to make this requests
     * @return bool;
    */
    public function authorize() {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules() {
        return [
            'company_id' => 'int|required',
            'name' => 'string|required',
            'email'=>'required|email|unique:customer',
            'taxpayer_id'=>'string|required',
            'phone'=>'string|required',
            'rfc'=>'required|between:12,13|unique:customer',
        ];
    }
}