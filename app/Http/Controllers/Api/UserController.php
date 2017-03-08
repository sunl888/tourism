<?php
/**
 * Created by PhpStorm.
 * User: wqer
 * Date: 2017/3/3
 * Time: 20:25
 */

namespace app\Http\Controllers\Api;


use App\Http\Controllers\Controller;
use App\Models\User;
use Dingo\Api\Contract\Http\Validator;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Exceptions\JWTException;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    protected $guard = 'api';

    /**
     * 获取token
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function token(Request $request)
    {
        $credentials=[
            'email' => $request->email,
            'password'  => $request->password,
            /*'status' => 0,*/
        ];

        try {
            if (! $token = Auth::guard($this->guard)->attempt($credentials)) {
                return response()->json(['error' => 'invalid_credentials'], 401);
            }
        } catch (JWTException $e) {
            return response()->json(['error' => 'could_not_create_token'], 500);
        }

        return response()->json(compact('token'));
    }

    /**
     * @return mixed
     */
    public function refershToken()
    {
        $token = Auth::guard($this->guard)->refresh();

        return $this->response->array(compact('token'));
    }

    /**
     * 个人信息
     *
     * @return User|null
     */
    public function me()
    {
        return Auth::guard('api')->user();
    }

    /**
     * 退出
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function logout()
    {
        Auth::guard($this->guard)->logout();
        return response()->json(['status' => 'ok']);
    }

    public function register(Request $request)
    {
        $validator = Validator::make($request->accepts(['email','password']));
    }
}