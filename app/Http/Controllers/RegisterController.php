<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;
use app\facades\Mailer;
use App\Models\User;
use App\Models\Verification;

class RegisterController extends BaseController
{
    public function register(Request $request)
    {
        $email = $request->input('email');
        $user = User::create([
            'email' => $email,
        ]);

        $token = Mailer::sendVerificationMail($email, "Test Clear Note", "{{VerificationToken}}");

        if ($token) {
            Verification::create([
                'user_id' => $user->id,
                'token' => $token
            ]);
            return true;
        } else {
            return false;
        }
    }

    public function activateUser($id, $token) {

    }

    /*
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
    }*/
}
