<?php

namespace App\Http\Controllers;

use App\Profile;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $profiles = Profile::all();

        return view('profiles.index', compact('profiles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('profiles.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'description' => 'required',
            'image' => 'required'
        ]);
        $image = $request->files->get("image");

        if (isset($image)) {
            $file_content = file_get_contents($image);
            $uri = 'uploads/profiles/' . uniqid('', true) . $image->getClientOriginalName();
            $myfile = fopen($uri, "w") or die("Unable to open file!");
            fwrite($myfile, $file_content);
            fclose($myfile);
        }else{
            $uri = $request->get('image');
        }
        $profile = new Profile([
            'first_name' => $request->get('first_name'),
            'last_name' => $request->get('last_name'),
            'description' => $request->get('description'),
            'image' => $uri
        ]);

        $profile->save();
        return redirect('/profile')->with('success', 'Profile has been added');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $profile = Profile::find($id);

        return view('profiles.edit', compact('profile'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'description' => 'required',
            'image' => 'required'
        ]);


        $image = $request->files->get("image");

        if (isset($image)) {
            $file_content = file_get_contents($image);
            $uri = 'uploads/profiles/' . uniqid('', true) . $image->getClientOriginalName();
            $myfile = fopen($uri, "w") or die("Unable to open file!");
            fwrite($myfile, $file_content);
            fclose($myfile);
        }else{
            $uri = $request->get('image');
        }
        $profile = Profile::find($id);

        $profile->first_name =  $request->get('first_name');
        $profile->last_name = $request->get('last_name');
        $profile->description = $request->get('description');
        $profile->image = $uri;

        $profile->save();
        return redirect('/profile')->with('success', 'Profile has been Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $profile = Profile::find($id);
        $profile->delete();

        return redirect('/profile')->with('success', 'Profile has been deleted Successfully');
    }
}
