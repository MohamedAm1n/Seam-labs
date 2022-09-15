<?php
namespace App\Http\Controllers\Api\auth;
use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterRequest;
use App\Models\User;
class RegisterController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest');
    }
    public function register(RegisterRequest $request)
    {
        $user=$request->validated();
        $user = User::create([
            'name'=>$user['name'],
            'email'=>$user['email'],
            'date_birth'=>$user['date_birth'],
            'phone_number'=>$user['phone_number'],
            'password'=>bcrypt($user['password'])
        ]);
        // Create Token
        $token = $user->createToken('RegisterToken')->plainTextToken;
        $data = [
            'message'=>'user created successfully',
            'user'=>$user,
            'token'=>$token,
        ];
        return response($data, 201);
    }
}
