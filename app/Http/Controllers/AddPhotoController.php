<?php

namespace App\Http\Controllers;
use App\User;

use Illuminate\Http\Request;

class AddPhotoController extends Controller
{
    //
    function add()
    {
        $user = User::all();

    return view('addPhoto')->with(
        [
            'users'=>$user,
        ]
        );
    }
}
