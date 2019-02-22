<?php

namespace App\Http\Controllers;

use Cartalyst\Sentinel\Checkpoints\NotActivatedException;
use Cartalyst\Sentinel\Checkpoints\ThrottlingException;
use App\Http\Requests\Auth\LoginRequest;
use App\Http\Requests\Auth\ForgotRequest;
use Illuminate\Http\Request;
use App\Classes\Email;
use App\Models\User;
use Validator;
use Sentinel;
use DB;

class AuthController extends Controller
{
    public function __construct() {
		$this->middleware('sentinel_guest', ['except' => ['getLogout']]);
	}

	public function getLogin() {
		$form = [
            'url' => route('post-login'),
            'autocomplete' => 'off',
        ];
		return view('auth.login', compact('form'));
	}

	public function postLogin(LoginRequest $request) {
		$backToLogin = redirect()->route('login')->withInput();
        $findUser = Sentinel::findByCredentials(['login' => $request->input('email')]);

        // If we can not find user based on email...
        if (! $findUser) {
            flash()->error(trans('label.invalid-email-password'));
            return $backToLogin;
        }

        try {
            $remember = (bool) $request->input('remember_me');
            // If password is incorrect...
            if (! Sentinel::authenticate($request->all(), $remember)) {
                flash()->error(trans('label.invalid-email-password'));
                return $backToLogin;
            }
            
            if (strtolower(Sentinel::check()->roles[0]->slug) != 'administrator' && !array_key_exists('administrator', Sentinel::check()->roles[0]->permissions)) {
                flash()->error(trans('label.no-access'));
                Sentinel::logout();
                return $backToLogin;
            }

            if ($findUser->is_active == 0) {
                flash()->error(trans('label.user-block'));
                Sentinel::logout();
                return $backToLogin;
            }
            flash()->success('Login success!');
            return redirect()->route('news');
        } catch (ThrottlingException $e) {
            flash()->error('Too many attempts!');
        } catch (NotActivatedException $e) {
            flash()->error('Please activate your account before trying to log in.');
        }
        return $backToLogin;
	}

	public function getLogout() {
		\Sentinel::logout();
		return redirect()->route('login');
	}

	public function getResetPassword()
    {
        $form = [
            'url' => route('reset-password'),
            'autocomplete' => 'off',
        ];
        return view('auth.forgot', compact('form'));
    }

    /**
     * Process reset password.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function postResetPassword(Request $request)
    {
        $param = $request->all();
        $rules = array(
                'email'   => 'required|email',
            );
        $validate = Validator::make($param,$rules);

        if($validate->fails()) {
            return redirect()->route('admin-reset-password')->withInput()->withErrors($validate->messages());
        } else {
            $findUser = Sentinel::findByCredentials(['login' => $request->input('email')]);
            if (! $findUser) {
                flash()->error(trans('label.failed-reset'));
                return redirect()->route('admin-reset-password')->withInput();
            }
            if (Reminder::exists($findUser)) {
                $reminder = Reminder::exists($findUser);
                $reminder->delete();

            }
            $reminder = Reminder::create($findUser);
            $data_email = array('id'=>$findUser->id,
                                'email'=> $findUser->email,
                                'username'=>$findUser->username,
                                'subject_email'=>trans('label.reset_password'),
                                'activation_code'=>$reminder->code,
                                'url'=>route('link-reset-password', [$findUser->id, $reminder->code])
                                );
            $template = 'email.reset_password';
            $email = New Email;
            $email->sendEmail($template, $data_email);
            flash()->success(trans('label.success-reset'));
            return redirect()->route('admin-login');
        }
    }

    /**
     * Process change password.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function postChangePassword(ForgotRequest $request)
    {
        $user = Sentinel::findById($request->input('id'));
        Reminder::complete($user, $request->input('code'), $request->input('password'));
        flash()->success(trans('label.success-change-password'));
        return redirect()->route('login');
    }
}