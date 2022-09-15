<?php
namespace App\Http\Controllers\Api\auth;
use App\Models\User;
use App\Http\Requests\LoginRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
class LoginController extends Controller
{
    public function login(LoginRequest $request)
    {
        $fields = $request->validated();
        if(!Auth::attempt($fields))
            return response(['message'=>'please inter correct name or password'],401);
        $user = User::where('name', $fields['name'])->first();
        // Create Token
        $token = $user->createToken('LoginToken')->plainTextToken;
        $data = [
                'message'=>'login successfully ',
                'user'=>$user,
                'token'=>$token,
            ];
            return response($data, 201);
    }
}
