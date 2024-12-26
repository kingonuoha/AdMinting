<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    //

    public function createUser(Request $request)
    {
        try {
            $validateUser = Validator::make($request->all(), [
                "name" => "required",
                "email" => "required|email|unique:users,email",
                "password" => "required|min:8|max:12"
            ]);

            if ($validateUser->fails()) {
                return response()->json([
                    'status' => false,
                    "message" => "validation error",
                    'errors' => $validateUser->errors()
                ], 403);
            }

            $user = User::create([
                "email" => $request->email,
                "name" => $request->name,
                "password" => Hash::make($request->password),
            ]);

            $otp =  rand(1111, 9999);
        $data = [
            "user" =>  $user,
            "title" => "Confirm Your OTP for " . env('APP_NAME'),
            "panel" => "Your OTP is: " . $otp,
            'message' => "Thank you for choosing " . env('APP_NAME') . ". To ensure the security of your account, we require you to confirm your OTP (One-Time Password) before you can start using our services.",

        ];
        mailNotify($data);
        $user->update([
            "otp" => $otp
        ]);

            return response()->json([
                "status" => true,
                "message" => "User Created Successfully, an OTP has been sent to your email, please verify!",
                // "token" => $user->createToken("API_TOKEN")->plainTextToken
            ], 200);
        } catch (\Throwable $th) {
            return response()->json([
                "status" => false,
                'message' => $th->getMessage()
            ], 500);
        }
    }


    public function loginUser(Request $request)
    {
        try {
            $validateUser = Validator::make($request->all(), [
                "email" => "required",
                "password" => "required"
            ]);

            if ($validateUser->fails()) {
                return response()->json([
                    'status' => false,
                    "message" => "validation error",
                    'errors' => $validateUser->errors()
                ], 403);
            }

            // check user email and password
            if (!Auth::attempt($request->only(['email', "password"]))) {
                return response()->json([
                    "status" => false,
                    "message" => "Email & password does not match with our record."
                ], 401);
            }

            $user = User::where("email", $request->email)->first();
            return  response()->json([
                "status" => true,
                "message" => "User logged in successfully",
                "token" => $user->createToken("API_TOKEN")->plainTextToken

            ], 200);
        } catch (\Throwable $th) {
            return response()->json([
                "status" => false,
                'message' => $th->getMessage()
            ], 500);
        }
    }

    public function generateOtp(Request $request)
    {
        $user = User::find($request->user()->id);
        $otp =  rand(1111, 9999);
        $data = [
            "user" =>  $user,
            "title" => "Confirm Your OTP for " . env('APP_NAME'),
            "panel" => "Your OTP is: " . $otp,
            'message' => "Thank you for choosing " . env('APP_NAME') . ". To ensure the security of your account, we require you to confirm your OTP (One-Time Password) before you can start using our services.",

        ];
        mailNotify($data);
        $user->update([
            "otp" => $otp
        ]);
        return response()->json([
            "status" => true,
            'message' => "OTP generated successfully",
            // 'otp' =>  
        ], 200);
    }


    public function verifyOtp(Request $request)
    {
        try {
            $validateUser = Validator::make($request->all(), [
                "otp" => "required|integer",
                "email" => "required|email"
            ]);


            if ($validateUser->fails()) {
                return response()->json([
                    'status' => false,
                    "message" => "validation error, couldnt validate User",
                    'errors' => $validateUser->errors()
                ], 403);
            }
            $user = User::where("email", $request->email)->first();
           if ($user) {
            if ($request->otp == $user->otp) {
                $user->update([
                    "email_verified_at" => now(),
                    "otp" => null
                ]); // User::where("email", $request->email)->first();
                $data = [
                    "user" =>  $user,
                    "title" => "Your Account Has Been Verified Successfully!",
                    "panel" => "it might take a minuite for changes to reflect on your account",
                    'message' => "Congratulations! Your account has been successfully verified. You can now start using our services without any restrictions.
                        Thank you for choosing our app, and we hope you enjoy using it.",
                        "button" => [
                            "text" => "Get Started", 
                            "url" => route("guest.home"), 
                            "color" => "success", 
                        ]

                ];
                mailNotify($data);
                return  response()->json([
                    "status" => true,
                    "message" => "User Verified Successfully",
                    "user"   => $request->user()
                ], 200);
            } else {

                return response()->json([
                    'status' => false,
                    "message" => "User was not validated, OTP mismatch, pls check and try again!",
                ], 403);
            }    
           }else{
            return response()->json([
                'status' => false,
                "message" => "Target User Not found!",
            ], 404);
           }
        } catch (\Throwable $th) {
            return response()->json([
                "status" => false,
                'message' => $th->getMessage()
            ], 500);
        }
    }
}
