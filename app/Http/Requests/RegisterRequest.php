<?php
namespace App\Http\Requests;
use Illuminate\Foundation\Http\FormRequest;
class RegisterRequest extends FormRequest
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
    // email, user name, date of birth, phone number, password
    public function rules()
    {
        return [
            'name'=>'required|string|max:20|min:3',
            'email'=>'required|email|unique:users,email',
            'password'=>'required|confirmed|min:8',
            'date_birth'=>'required|date',
            'phone_number'=>'required|unique:users,phone_number|numeric|digits:11'
        ];
    }
}
