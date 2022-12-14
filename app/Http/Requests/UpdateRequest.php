<?php
namespace App\Http\Requests;
use Illuminate\Foundation\Http\FormRequest;
class UpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name'=>'string|max:20|min:3',
            'email'=>'email|unique:users,email',
            'password'=>'confirmed|min:8',
            'date_birth'=>'date',
            'phone_number'=>'unique:users,phone_number|numeric|digits:11'
        ];
    }
}
