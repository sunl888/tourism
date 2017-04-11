<?php
/**
 * Created by PhpStorm.
 * User: Sunlong
 * Date: 2017/3/28
 * Time: 19:18
 */
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Foundation\Auth\RedirectsUsers;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;
use League\Flysystem\Exception;

class AuthenticateController extends Controller
{
    use RedirectsUsers, ThrottlesLogins;

    protected $redirectTo = '/';
    protected $redirectAfterLogout = 'login';

    public function login()
    {
        return view('admin.login');
    }

    public function doLogin(Request $request)
    {
        $this->validateLogin($request);

        // If the class is using the ThrottlesLogins trait, we can automatically throttle
        // the login attempts for this application. We'll key this by the username and
        // the IP address of the client making these requests into this application.
        if ($this->hasTooManyLoginAttempts($request)) {
            $this->fireLockoutEvent($request);

            return $this->sendLockoutResponse($request);
        }
        if ($this->attemptLogin($request)) {
            return $this->sendLoginResponse($request);
        }

        // If the login attempt was unsuccessful we will increment the number of attempts
        // to login and redirect the user back to the login form. Of course, when this
        // user surpasses their maximum number of attempts they will get locked out.
        $this->incrementLoginAttempts($request);

        return $this->sendFailedLoginResponse($request);
    }

    /**
     * Validate the user login request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return void
     */
    protected function validateLogin(Request $request)
    {
        $this->validate($request, [
            $this->username() => 'required',
            'password' => 'required',
        ],[
            'username.required' =>'用户名必须填写.',
            'password.required' =>'密码必须填写.',
        ]);
    }

    /**
     * Attempt to log the user into the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return bool
     */
    protected function attemptLogin(Request $request)
    {
        return $this->guard()->attempt(
            $this->credentials($request), $request->has('remember')
        );
    }

    /**
     * Get the needed authorization credentials from the request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    protected function credentials(Request $request)
    {
        return $request->only($this->username(), 'password');
    }

    /**
     * Send the response after the user was authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    protected function sendLoginResponse(Request $request)
    {
        $request->session()->regenerate();

        $this->clearLoginAttempts($request);

        return $this->authenticated($request, $this->guard()->user())
            ?: redirect()->intended($this->redirectPath());
    }

    /**
     * The user has been authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  mixed  $user
     * @return mixed
     */
    protected function authenticated(Request $request, $user)
    {
        //登录成功在这里写入日志
        return User::loginLog($request, $user->id);
    }

    /**
     * Get the failed login response instance.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    protected function sendFailedLoginResponse(Request $request)
    {
        //auth.failed
        $errors = [$this->username() => trans('用户名或密码错误。')];

        if ($request->expectsJson()) {
            return response()->json($errors, 422);
        }

        return redirect()->back()
            ->withInput($request->only($this->username(), 'remember'))
            ->withErrors($errors);
    }

    /**
     * Get the login username to be used by the controller.
     *
     * @return string
     */
    public function username()
    {
        return 'username';
    }

    /**
     * Log the user out of the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function logout(Request $request)
    {
        $this->guard()->logout();

        $request->session()->flush();

        $request->session()->regenerate();

        return redirect($this->redirectAfterLogout);
    }

    /**
     * Get the guard to be used during authentication.
     *
     * @return \Illuminate\Contracts\Auth\StatefulGuard
     */
    protected function guard()
    {
        return Auth::guard();
    }

    protected function verifyOldPassword(Request $request)
    {
        return $this->guard()->attempt(
            $request->only('username','password','email'), 'on'
        );
    }
    public function update(Request $request)
    {
        try{
            $validator = Validator::make($request->only('username','email','new_password','password'),[
                'username'=>'required|max:20|min:4',
                'email'=>['required','email'],
                'new_password'=>'required|max:32|min:4'
            ],[
                'username.required'=>'请填写用户名。',
                'email.required'=>'请填写email。',
                'new_password.required'=>'请填写密码。',
                'username.max'=>'用户名不得超过20位',
                'new_password.max'=>'密码不得超过32位',
                'new_password.min'=>'密码最短为4位',
                'username.min'=>'用户名最短为4位',
                'email.email'=>'email不合法.'
            ]);
            if($validator->fails()){
                throw new \Exception($validator->errors()->first());
            }
            if(!$this->verifyOldPassword($request)){
                throw new \Exception('原始信息有误，请重新填写。');
            }
            $user = User::find(Auth::user()->id);
            $user->forceFill([
                'password' => bcrypt($request['new_password']),
                'remember_token' => Str::random(60),
            ])->update();
            $this->guard()->login($user);
            return redirect('mine');

        }catch(\Exception $exception){
            throw new \Exception($exception->getMessage());
        }
    }
}