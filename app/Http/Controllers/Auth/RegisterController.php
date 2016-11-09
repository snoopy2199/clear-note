<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Facades\Mailer;
use App\Models\User;
use App\Models\Verification;
use Request;

class RegisterController extends Controller
{
    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return array
     */
    protected function create(array $data)
    {
        //建立新使用者
        $user = User::create([
            'email' => $data['email'],
        ]);

        //產生驗證碼
        $token = $this->generateRegisterToken();
        Verification::create([
            'user_id' => $user->id,
            'token' => $token
        ]);

        $data = [
            'id' => $user->id,
            'token' => $token
        ];

        return $data;
    }

    public function register()
    {
        $request = Request::all();
        $user = $this->create($request);
        Mailer::mail($request['email'], "Test Clear Note", $this->registerMailContent($user));
    }

    public function activeUser($id, $token)
    {
        //先看有沒有這個id
        $user = User::find($id);

        if (is_null($user)) {
            var_dump("no user");
            return;
        }

        $checkToken = $this->checkToken($user, $token);

        //token 沒過
        if (!$checkToken) {
            var_dump("something wrong");
            return;
        }

        return View('finish_registration')
            ->with('user', $user);
    }

    private function checkToken($user, $token)
    {
        $verification = $user->verification;

        if (is_null($verification)) {
            return false;
        }

        if ($verification->token === $token) {
            return true;
        }

        // token不對或是認證過了
        return false;
    }

    private function generateRegisterToken()
    {
        return hash_hmac('sha256', str_random(40), env('app_key'));
    }

    private function registerMailContent($user)
    {
        $url = "http://localhost:8000/activeUser/{$user['id']}/{$user['token']}";
        return "<a href='{$url}'>click</a>";
    }

    public function registerProfile()
    {
        //要傳入id, password, name
        $request = Request::all();
        $password_hash = password_hash($request['password'], PASSWORD_DEFAULT);
        $name = $request['name'];

        $user = User::find($request['id']);
        $user->password = $password_hash;
        $user->name = $name;
        $user->save();

        $user->verification->delete();

        return View('index');
    }
}
