<?php

namespace App\Http\Controllers;

use App\Profile;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    //
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $profiles = Profile::all();
        return view('home', compact('profiles'));
    }
}
