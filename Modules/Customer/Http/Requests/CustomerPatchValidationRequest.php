<?php
namespace Modules\Customer\Http\Requests;
use App\Http\Requests\Request;
use Illuminate\Validation\Rule;
/**
 * class CustomerPatchValidationRequest
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
            'uuid'=>'bail|string|required|exists:customer',
            'company_id' => 'int|required',
            'name' => 'string|required',
            'email'=>['required','email',Rule::unique('customer')->ignore($this->uuid,'uuid')],
            'taxpayer_id'=>'string|required|between:12,13',
            'phone'=>'string|required',
            'rfc'=>['required','between:12,13',Rule::unique('customer')->ignore($this->uuid,'uuid')],
        ];
    }
}