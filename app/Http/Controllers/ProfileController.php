<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use DB;
use App\Profile;
use Hash;


class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $controller = "profile";
        $userid = Auth::id();

        $userinfo = DB::table('users')
                    ->where('id',$userid)
                    ->get();




        return view('profile.index')
          ->with('controller',$controller)
          ->with('userinfo',$userinfo);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[
          'username' => 'required'
        ]);

        if ($request->file('profileimage') == "") {
            $path =  $request->oldpicture;
        }else {
            $path = $request->file('profileimage')->store('upload') ;
        }


        if ($request->password != '!password') {
                DB::table('users')
                  ->where('id', $id)
                  ->update([
                      'name' => $request->name,
                      'email' => $request->email,
                      'username' => $request->username,
                      'password' => Hash::make($request->password),
                      'address' => $request->address,
                      'contactnumber' => $request->contactnum,
                      'picture' => $path,
                      'about' => $request->aboutme
                  ]);
        }else {
            DB::table('users')
              ->where('id', $id)
              ->update([
                  'name' => $request->name,
                  'email' => $request->email,
                  'username' => $request->username,
                  'address' => $request->address,
                  'contactnumber' => $request->contactnum,
                  'picture' => $path,
                  'about' => $request->aboutme
              ]);
        }

        return redirect('profile')
          ->with('success','Profile has been updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
