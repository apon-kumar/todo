<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class userController extends Controller
{

    public function uploadAvatar(Request $request)
    {
        if ($request->hasFile('image')) {
            
            $filename = $request->image->getClientOriginalName();
            $request->image->storeAs('images', $filename);
            User::find(1)->update(['avatar' => $filename]);
        }
       
        return redirect()->back();
    }
}
