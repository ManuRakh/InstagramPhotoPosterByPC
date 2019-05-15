<?php

namespace App\Http\Controllers;
use App\User;
use Illuminate\Http\Request;
//require __DIR__.'/../vendor/autoload.php';


class IndexController extends Controller
{
function index()
{
   return view('index');
}

}
