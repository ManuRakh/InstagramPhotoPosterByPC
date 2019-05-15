<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//require __DIR__.'/../vendor/autoload.php';


class IndexController extends Controller
{
function index()
{
   return view('index');
}

function resp($ig)
{
    $ig = new \InstagramAPI\Instagram();
    $trufos = IndexController::resp($ig);
    if (!is_null($trufos) && $trufos->isTwoFactorRequired()) {
        $twoFactorIdentifier = $trufos->getTwoFactorInfo()->getTwoFactorIdentifier();

         // The "STDIN" lets you paste the code via terminal for testing.
         // You should replace this line with the logic you want.
         // The verification code will be sent by Instagram via SMS.
        $verificationCode = trim(fgets(STDIN));
        $ig->finishTwoFactorLogin($verificationCode, $twoFactorIdentifier);
    }
  return  $loginResponse = $ig->login('OTDY.HAEM@mail.ru','Otdyhaem123');

}
}
