<?php

namespace App\Http\Controllers;
use App\User;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Job;

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
    function addToDatabase(Request $request)
    {
       
        $ig = new \InstagramAPI\Instagram('true', 'true');

        $username = $request->account;
        $password = $request->password;
        $captionText = '';
        $uname = "";
        $userz = User::all()->where('uname', $username)->first();
         $uname = $userz->id;
        
        try {
            $ig->login($username, $password);
        } catch (\Exception $e) {
            echo 'Something went wrong: '.$e->getMessage()."\n";
            exit(0);
        }
      
        $name = '';

        foreach ($request->file() as $file) {
            foreach ($file as $f) {
                $name = time().'_'.$f->getClientOriginalName();
                $f->move(storage_path('images'), $name);
                $files = storage_path('images\\').$name;
                $job = new Job;
                $job->user_id = $uname;
                $job->photo_path = $files;
                $job->uploaded = "not";
                $job->postat = time()+$request->seconds;

                $job->save();
                $photo = new \InstagramAPI\Media\Photo\InstagramPhoto($files);

                $metadata = ['caption' => 'My awesome caption'];
              $path =  Storage::disk('local')->url('F21CGueOEQtXpmLXFmCrNPJ02VvIgBwWTBy1ERI3.jpeg');
               echo '<br/>';
      echo  $photo->getFile();
      $metadata = [
          'caption' => 'My awesome caption',
          'location' => $path, // $location must be an instance of /Model/Location class
        ];
        $ig->timeline->uploadPhoto($photo->getFile(), ['caption' => $captionText]);
      
            }
        }
      //  dump($files); 


        return "Успех";    
    }
}
