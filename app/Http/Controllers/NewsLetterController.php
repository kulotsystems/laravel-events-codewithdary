<?php

namespace App\Http\Controllers;

use App\Events\UserSubscribeEvent;
use Illuminate\Http\Request;

class NewsLetterController extends Controller
{
    public function index()
    {
        return view('index');
    }

    public function subscribe(Request $request)
    {
        $request->validate([
            'email' => 'required|unique:newsletters|email'
        ]);

        event(new UserSubscribeEvent($request->input('email')));

        return back();
    }
}
