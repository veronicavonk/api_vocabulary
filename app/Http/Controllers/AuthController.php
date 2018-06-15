<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Config, Hash, DB;
use App\Http\Controllers\Controller;
use App\Usuario;


use JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;
// use Validator, DB, Hash, Mail;
use Illuminate\Support\Facades\Password;
use Illuminate\Mail\Message;


class AuthController extends Controller
{
    //
   //  public function login(Request $request)
   //  {
   //      $credentials = $request->only('email', 'password');
        
   //      $rules = [
   //          'email' => 'required|email',
   //          'password' => 'required',
   //      ];
   //      $validator = Validator::make($credentials, $rules);
   //      if($validator->fails()) {
   //          return response()->json(['success'=> false, 'error'=> $validator->messages()]);
   //      }
        
   //      // $credentials['is_verified'] = 1;
        
   //      try {
   //          // attempt to verify the credentials and create a token for the user
           
			// // var_dump(Auth::once($credentials));
			// // var_dump(Auth::user());
			// // var_dump(Usuario::first());
   //          if (! $token = JWTAuth::attempt($credentials)) {
   //              return response()->json(['success' => false, 'error' => 'We cant find an account with this credentials. Please make sure you entered the right information and you have verified your email address.','credenciales'=>JWTAuth::attempt($credentials)], 401);
   //          }
   //      } catch (JWTException $e) {
   //          // something went wrong whilst attempting to encode the token
   //          return response()->json(['success' => false, 'error' => 'Failed to login, please try again.'], 500);
   //      }
   //      // all good so return the token
   //      return response()->json(['success' => true, 'data'=> [ 'token' => $token ]]);
   //  }


    
    //------

    // importante, indica que solo el usuario puede acceder a la ruta del login

    // public function __construct()
    // {
    //     $this->middleware('auth:api', ['except' => ['login']]);
    // }

/**
     * API Register
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */

     public function registro(Request $request)
     {
        $name = $request->nombre;
        $email = $request->email;
        $password = $request->password;
        $pais = $request->pais;
        $genero = $request->genero;
        $fecha_nacimiento = $request->fecha_nacimiento;
        $usuario = $request->usuario;
        $telefono = $request->telefono;
        
        $user = Usuario::create(['nombre' => $name, 'email' => $email, 'password' => Hash::make($password),'telefono'=>$telefono,'usuario'=>$usuario,'pais'=>$pais,'genero'=>$genero,'fecha_nacimiento'=>$fecha_nacimiento]);
        return response()->json(['success'=> true, 'message'=> 'Thanks for signing up! Please check your email to complete your registration.']);
        // $verification_code = str_random(30); //Generate verification code
        // DB::table('user_verifications')->insert(['user_id'=>$user->id,'token'=>$verification_code]);
    }
   

    /**
     * Get a JWT token via given credentials.
     *
     * @param  \Illuminate\Http\Request  $request
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function login(Request $request)
    {
        
        // $request->password=Hash::make($request->password);

        $credentials = $request->only('email', 'password');

        
        // try {
        //     // attempt to verify the credentials and create a token for the user
        //     if (! $token = JWTAuth::attempt($credentials)) {
        //         return response()->json(['success' => false, 'error' => 'We cant find an account with this credentials. Please make sure you entered the right information and you have verified your email address.'], 401);
        //     }
        // } catch (JWTException $e) {
        //     // something went wrong whilst attempting to encode the token
        //     return response()->json(['success' => false, 'error' => 'Failed to login, please try again.'], 500);
        // }

        //    // all good so return the token
        // return response()->json(['success' => true, 'data'=> [ 'token' => $token ]]);


        if ($token = $this->guard()->attempt($credentials)) {
            return $this->respondWithToken($token);
        }

        return response()->json(['error' => 'Unauthorized','a'=>$credentials], 401);

    }



    /**
     * Get the authenticated User
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function me()
    {
        return response()->json($this->guard()->user());
        
    }

    /**
     * Log the user out (Invalidate the token)
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function logout()
    {
        $this->guard()->logout();

        return response()->json(['message' => 'Successfully logged out']);
    }

    /**
     * Refresh a token.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function refresh()
    {
        return $this->respondWithToken($this->guard()->refresh());
    }

    /**
     * Get the token array structure.
     *
     * @param  string $token
     *
     * @return \Illuminate\Http\JsonResponse
     */
    protected function respondWithToken($token)
    {
        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => $this->guard()->factory()->getTTL() * 60
        ]);
    }

    /**
     * Get the guard to be used during authentication.
     *
     * @return \Illuminate\Contracts\Auth\Guard
     */
    public function guard()
    {
        return Auth::guard();
    }



}
