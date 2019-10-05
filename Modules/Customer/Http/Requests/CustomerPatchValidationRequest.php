<?php
namespace Modules\Customer\Http\Requests;
use App\Http\Requests\Request;
/**
 * class CustomerPostValidationRequest
 * @package Modules\Customer\Http\Requests
 */
class CustomerPatchValidationRequest extends Request{
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
            'uuid'=>'string|required',
            'company_id' => 'int|required',
            'name' => 'string|required',
            'email'=>'string:required|unique:customer,uuid',
            'taxpayer_id'=>'string|required',
            'phone'=>'string|required',
        ];
    }
}