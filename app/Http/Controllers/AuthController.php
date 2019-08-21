<?php

namespace App\Http\Controllers;

use App\User;
use App\UserDetail;
use Firebase\JWT\JWT;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Laravel\Lumen\Routing\Controller as BaseController;

class AuthController extends BaseController
{
    /**
     * The request instance.
     *
     * @var \Illuminate\Http\Request
     */
    private $request;
    /**
     * Create a new controller instance.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return void
     */
    public function __construct(Request $request)
    {
        $this->request = $request;
    }
    /**
     * Create a new token.
     * 
     * @param  \App\User   $user
     * @return string
     */
    protected function jwt(User $user)
    {
        $payload = [
            'iss' => "lumen-jwt", // Issuer of the token
            'sub' => $user->id, // Subject of the token
            'iat' => time(), // Time when JWT was issued. 
            'exp' => time() + 60 * 60 // Expiration time
        ];

        // As you can see we are passing `JWT_SECRET` as the second parameter that will 
        // be used to decode the token in the future.
        return JWT::encode($payload, env('JWT_SECRET'));
    }
    /**
     * Authenticate a user and return the token if the provided credentials are correct.
     * 
     * @param  \App\User   $user 
     * @return mixed
     */
    public function authenticate(User $user)
    {
        $this->validate($this->request, [
            'email'     => 'required|email',
            'password'  => 'required'
        ]);
        // Find the user by email
        $user = User::where('email', $this->request->input('email'))->first();
        if (!$user) {
            // You wil probably have some sort of helpers or whatever
            // to make sure that you have the same response format for
            // differents kind of responses. But let's return the 
            // below respose for now.
            return response()->json([
                'message' => 'Login Failed',
                'error' => 'Email does not exist.'
            ], 401);
        }
        // Verify the password and generate the token
        if (Hash::check($this->request->input('password'), $user->password)) {
            return response()->json([
                'message' => 'Login Success',
                'token' => $this->jwt($user)
            ], 200);
        }
        // Bad Request response
        return response()->json([
            'error' => 'Email or password is wrong.'
        ], 401);
    }

    public function register(){

        $this->validate($this->request, [
            'name' => 'required|min:5',
            'email'     => 'required|email|unique:users',
            'password'  => 'required|min:5',
        ]);

        $user = new User();
        $user->name = $this->request->input('name');
        $user->email = $this->request->input('email');
        $user->password = Hash::make($this->request->input('password'));
        $user->save(); 

        $user_detail = new UserDetail();
        $user_detail->user_id = $user->id;
        $user_detail->total_generated = 0;
        $user_detail->level_id = 1;
        $user_detail->badge_id = 1;
        
        $user->detail()->save($user_detail);

        return response()->json([
            'status' => 201,
            'message' => 'User has been created',
            'created_user' => [
                'user' => $user,
                'user_detail' => $user->detail
            ]
        ]);
        
    }
}
