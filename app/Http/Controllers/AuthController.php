<?php
namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        //dd("the register don");
     
        $validator = Validator::make($request->all(), [
            'first_name' => 'required|string|max:50',
            'last_name'  => 'required|string|max:70',
            'mobile' => 'required|string|max:11|unique:users,mobile',
            'national_code' => 'required|string|size:10|unique:users,national_code',
            'password' => 'required|string|min:8|confirmed',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        
        $user = User::create([
            'first_name' => $request->first_name,
            'last_name'  => $request->last_name,
            'mobile' => $request->mobile,
            'national_code' => $request->national_code,
            'password' => Hash::make($request->password),
        ]);

      
        $token = $user->createToken('ASA')->plainTextToken;

        return response()->json([
            'message' => 'User registered successfully!',
            'token' => $token,
            'user' => $user,
        ]);
    }

    public function login(Request $request)
    {
      
        $validator = Validator::make($request->all(), [
            'mobile' => 'required|string|size:11',
            'password' => 'required|string|min:8',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

      
        if (Auth::attempt([
            'mobile' => $request->mobile,
            'password' => $request->password,
        ])) {
          
            $user = Auth()->user();

         
            $token = $user->createToken('ASA')->plainTextToken;

            return response()->json([
                'message' => 'Login successful!',
                'token' => $token,
                'user' => $user,
            ]);
        }

        return response()->json([
            'message' => 'Invalid credentials.',
        ], 401);
    }
}
