<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\File;
//use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\URL;
use App\Profile;
use Auth;


class ProfileController extends Controller
{
    public function profile()
    {
      return view('profiles.profile');
    }
    public function addProfile(Request $request)
    {
      $this->validate($request, [
        'name'=>'required',
        'designation'=>'required',
        'profile_pic'=>'required',
      ]);

      $profiles = new Profile;
      $profiles->name = $request->input('name');
      $profiles->user_id = Auth::user()->id;
      $profiles->designation = $request->input('designation');
      if(input::hasFile('profile_pic'))
      {
        $file = Input::file('profile_pic');
        $file->move(public_path().'/uploads', $file->getClientOriginalName());
        $url = URL::to("/").'/uploads/'.$file->getClientOriginalName();
      }
      $profiles->profile_pic = $url;
      $profiles->save();
      return redirect('/home')->with('response','Profile pic added');
    }
}
