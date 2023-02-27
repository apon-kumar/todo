<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class userController extends Controller
{

    public function uploadAvatar(Request $request)
    {
        if ($request->hasFile('image')) {     
            User::uploadAvatar($request->image);
            //$request->session()->flash('message', 'Image uploaded.');
            return redirect()->back()->with('message', 'Image uploaded.');
        }
        //$request->session()->flash('error', 'image not uploaded.');

        return redirect()->back()->with('error', 'Image not uploaded.');

    }
}
