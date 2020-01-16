<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;

use Tymon\JWTAuth\Facades\JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;
use App\Pengguna;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $credentials = $request->only('username', 'password');
        $credentials['password'] = md5($credentials['password']);
        $user = Pengguna::where($credentials)->first();
        $lvl = ['lvl' => $user['level']];
        try {
            // attempt to verify the credentials and create a token for the user
            if (! $user) {
                return response()->json(['error' => 'invalid_credentials'], 401);
            }
        } catch (JWTException $e) {
            // something went wrong whilst attempting to encode the token
            return response()->json(['error' => 'could_not_create_token'], 500);
        }

        // all good so return the token
        $token = JWTAuth::fromUser($user, $lvl);
        $token = compact('token');
        // $apy = JWTAuth::getPayload($token['token'])->toArray();
        return response()->json($token);
    }
}
