<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller as BaseController;

class HelpController extends BaseController
{
    public function showHelp()
    {

        return View('help');
    }
}
