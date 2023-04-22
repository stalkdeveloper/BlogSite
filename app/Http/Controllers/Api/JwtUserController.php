<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\FAcades\Validator;
use Auth;
use Illuminate\Support\Facades\Hash;
use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;
use Symfony\Component\HttpKernel\Exception\BadRequestHttpException;
use Tymon\JWTAuth\Exceptions\TokenInvalidException;
use Tymon\JWTAuth\Facades\JWTAuth;

class JwtUserController extends Controller
{
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'firstname' => 'required|string|min:2|max:50',
            'middlename' => 'required|string|min:2|max:50',
            'lastname' => 'required|string|min:2|max:50',
            'phone' => 'required|string|max:12',
            'email' =>'required|string|email|max:100|unique:users',
            'password' => 'required|string|min:6|confirmed'
        ]);

        if($validator->fails()){
            return response()->json($validator->errors(),400);
        }

        $user = User::create([
            'firstname'=>$request->firstname,
            'middlename'=>$request->middlename,
            'lastname'=>$request->lastname,
            'phone'=>$request->phone,
            'email'=>$request->email,
            'password'=>Hash::make($request->password)
        ]);

        // $token = $user->createToken('mytoken')->plainTextToken;

        // return response([
        //     'user' => $user,
        //     'token' => $token
        // ], 201);
    }

    public function login(Request $request)
    {
        // $validator = Validator::make($request->all(),[
        //     'email' => 'required|string|email',
        //     'password' => 'required|string|min:6'
        // ]);

        // if($validator->fails()){
        //     return response()->json($validator->errors(),400);
        // }

        if (! $token = JWTAuth::attempt(request(['email', 'password']) )) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        return $this->tokenresponse($token);
    }

    protected function tokenresponse($token){
        return response()->json([
            'access_token'=>$token,
            'token_type'=>'bearer',
            'expires_in'=>JWTAuth::factory()->getTTL()*60,
        ]);
    }

    public function logout(){
        auth()->logout();
        return response()->json(['message' => 'Successfully Logged Out..!!']);
    }

}