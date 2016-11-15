<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Response;
use App\Facades\Mailer;
use App\Models\User;
use App\Models\Verification;

class RegisterController extends BaseController
{
    private $registerMailContent = "嗨，<br>歡迎加入Clear Note!<br><br>請點擊下列按鈕開始你的筆記之旅：<br><br><table cellspacing=\"0\" cellpadding=\"0\"><tr><td align=\"center\" width=\"300\" height=\"40\" bgcolor=\"cornflowerblue\" style=\"-webkit-border-radius: 5px; -moz-border-radius: 5px; border-radius: 5px; color: #ffffff; display: block;\"><a href=\"http://localhost:8000/user_active/{{id}}/{{VerificationToken}}\" style=\"font-size:16px; font-weight: bold; font-family: Helvetica, Arial, sans-serif; text-decoration: none; line-height:40px; width:100%; display:inline-block\"><span style=\"color: #FFFFFF\">馬上前往Clear Note</span></a></td></tr></table><br>若你最近沒有註冊Clear Note服務，請無須理會此封郵件。<br><br>Clear Note<br>快速、簡單、清晰的筆記服務";

    public function register()
    {
        $request = Request::all();
        $email = $request['email'];

        $hasNotRegistered = is_null(User::where('email', $email)->first());

        if ($hasNotRegistered) {
            $user = User::create([
                'email' => $email,
            ]);

            $mailContent = str_replace("{{id}}", $user->id, $this->registerMailContent);
            $token = Mailer::sendVerificationMail($email, "Welcome to Clear Note!", $mailContent);

            Verification::create([
                'user_id' => $user->id,
                'token' => $token
            ]);

            return Response::json(['msg' => "OK"]);
        } else {
            return Response::json(['msg' => "已註冊的電子郵件，請嘗試登入"], 409);
        }
    }

    public function activateUser($id, $token)
    {
        $user = User::find($id);

        if (is_null($user)) {
            abort(404);
        }

        $checkToken = $this->checkToken($user, $token);

        if (!$checkToken) {
            abort(404);
        }

        return view('finish_registration')->with('user', $user);
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

        return false;
    }
}
