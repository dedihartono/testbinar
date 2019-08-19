<?php
namespace App\Http\Controllers;

use Validator;
use App\User;
use Firebase\JWT\JWT;
use Illuminate\Http\Request;
use Firebase\JWT\ExpiredException;
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
            'exp' => time() + 60*60 // Expiration time
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
        $user = User::where('email', $this->request->input('email'))->first();
        if (!$user) {
            return response()->json([
                'status' => false,
                'errors' => 'Email does not exist.'
            ], 400);
        }
        if (Hash::check($this->request->input('password'), $user->password)) {
            return response()->json([
                'status' => 'OK',
                'access_token' => $this->jwt($user),
                'errors' => []
            ], 200);
        }
        return response()->json([
            'status' => false,
            'errors' => 'Email or password is wrong.'
        ], 400);
    }

    public function signup()
    {
        $this->validate($this->request, [
            'name' => 'required',
            'email' => 'required|email|unique:user,email',
            'password' => 'required'
        ]);

        $model = User::create([
            'name' => $this->request->input('name'),
            'email' => $this->request->input('email'),
            'password' => password_hash($this->request->input('password'), PASSWORD_BCRYPT)
        ]);

        $data['status'] = 'OK';
        $data['result'] = $model;
        $data['result']['password_digest'] = password_hash($this->request->input('password'), PASSWORD_BCRYPT);
        $data['errors'] = [];

        return response()->json($data);
    }
}
