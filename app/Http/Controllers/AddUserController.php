<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class AddUserController extends Controller
{
    //
    function index()
    {
        return view('addUser');
    }
function resp(Request $request)
{
    $ig = new \InstagramAPI\Instagram();
    $user = new User;
    $this->validate($request,
    [
        'uname'=>'required|max:100',
        'password'=>'required|max:100',
        'uname'=>'required|min:6',
        'password'=>'required|min:6',

    ]);   
    $input = (object) $request->all();
    $loginResponse = $ig->login($input->uname,$input->password); //login to instagram
    //if responce does not give an error it means that login and password are right
   $input->authorized=1;
        dump($loginResponse);
        $data =(array) $input;
        $user->fill($data);
        $usercheck = User::where('uname', '=', $input->uname)->first();
if ($usercheck === null) { 
   // user doesn't exist
   $user->save();

}


    echo 'user authentificated succesfully!';
    return redirect('/');


}
}
